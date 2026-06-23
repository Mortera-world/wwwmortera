local config = {
	enabled = true,

	-- Chances use a 100000 scale. 50 = 0.05% (about 1 in 2000 eligible kills).
	echoItemId = 16092,
	echoDropChance = 50,
	itemLifetime = 5 * 60 * 1000,
	raidDuration = 10 * 60 * 1000,

	-- Raid pacing and hard limits.
	spawnInterval = 12 * 1000,
	monstersPerWave = 8,
	maxAlivePerRaid = 16,
	maxConcurrentRaids = 30,
	maxPendingItems = 30,
	spawnRadius = 6,
	maxSpawnAttempts = 16,
	requireNearbyPlayer = true,
	nearbyPlayerRange = 18,
	minimumRaidDistance = 20,

	-- 100 = 0.1% per wave, roughly a 5% chance over a full active raid.
	guardianChancePerWave = 100,

	echo = {
		healthMultiplier = 10,
		damageMultiplier = 25,
		experienceMultiplier = 25,
	},
	guardian = {
		healthMultiplier = 20,
		damageMultiplier = 50,
		experienceMultiplier = 50,
	},

	-- Monsters in this table never generate Echo Raid items.
	-- Use the internal monster type name, for example: ["Demon"] = true.
	excludedMonsters = {},
	allowRewardBosses = false,
	minimumMonsterHealth = 1,
	minimumMonsterExperience = 1,

	-- Original creature events are removed from spawned echoes so quest and boss
	-- death scripts are not triggered by raid copies.
	stripOriginalCreatureEvents = true,
	damageConditionSubId = 16092,

	-- Extra loot is added in addition to the original monster loot.
	-- Chance also uses a 100000 scale.
	-- Example entry:
	-- { id = 3031, chance = 10000, minCount = 1, maxCount = 10 }
	extraLoot = {
		echo = {
			default = {},
			byMonster = {
				-- ["Demon"] = {},
			},
		},
		guardian = {
			default = {},
			byMonster = {
				-- ["Demon"] = {},
			},
		},
	},
}

local CHANCE_MAX = 100000
local MAX_HEALTH = 2000000000
local MAX_EXPERIENCE = 9000000000000000
local ATTR_SOURCE_TYPE = "echoRaidSourceType"
local ATTR_SOURCE_NAME = "echoRaidSourceName"
local ATTR_TOKEN = "echoRaidToken"

local pendingItems = {}
local echoUnits = {}
local activeRaids = {}
local activeRaidCount = 0
local nextRaidId = 0
local nextItemToken = 0

local function now()
	return os.time() * 1000
end

local function roll(chance)
	return chance and chance > 0 and math.random(CHANCE_MAX) <= math.min(chance, CHANCE_MAX)
end

local function copyPosition(position)
	return { x = position.x, y = position.y, z = position.z }
end

local function toPosition(position)
	return Position(position.x, position.y, position.z)
end

local function isNear(first, second, distance)
	return first.z == second.z
		and math.abs(first.x - second.x) <= distance
		and math.abs(first.y - second.y) <= distance
end

local function prunePendingItems()
	local currentTime = now()
	for token, data in pairs(pendingItems) do
		if data.expiresAt <= currentTime then
			pendingItems[token] = nil
		end
	end
end

local function tableSize(values)
	local count = 0
	for _ in pairs(values) do
		count = count + 1
	end
	return count
end

local function hasNearbyEcho(position)
	for _, pending in pairs(pendingItems) do
		if isNear(position, pending.position, config.minimumRaidDistance) then
			return true
		end
	end

	for _, raid in pairs(activeRaids) do
		if isNear(position, raid.position, config.minimumRaidDistance) then
			return true
		end
	end
	return false
end

local function hasNearbyPlayer(position)
	if not config.requireNearbyPlayer then
		return true
	end

	local center = toPosition(position)
	local spectators = Game.getSpectators(
		center,
		false,
		true,
		config.nearbyPlayerRange,
		config.nearbyPlayerRange,
		config.nearbyPlayerRange,
		config.nearbyPlayerRange
	)
	return #spectators > 0
end

local function findSpawnPosition(centerData)
	local center = toPosition(centerData)
	for _ = 1, config.maxSpawnAttempts do
		local position = Position(
			center.x + math.random(-config.spawnRadius, config.spawnRadius),
			center.y + math.random(-config.spawnRadius, config.spawnRadius),
			center.z
		)
		local tile = Tile(position)
		if tile
			and not tile:hasFlag(TILESTATE_PROTECTIONZONE)
			and not tile:hasFlag(TILESTATE_HOUSE)
			and center:isSightClear(position, true)
			and tile:isWalkable(true, true, true, true, true)
		then
			return position
		end
	end
	return nil
end

local function removeOriginalCreatureEvents(monster, monsterType)
	if not config.stripOriginalCreatureEvents then
		return
	end

	for _, eventName in ipairs(monsterType:getCreatureEvents()) do
		monster:unregisterEvent(eventName)
	end
end

local function applyDamageMultiplier(monster, multiplier)
	local condition = Condition(CONDITION_ATTRIBUTES)
	condition:setParameter(CONDITION_PARAM_SUBID, config.damageConditionSubId)
	condition:setParameter(CONDITION_PARAM_TICKS, -1)
	condition:setParameter(CONDITION_PARAM_BUFF_DAMAGEDEALT, multiplier * 100)
	monster:addCondition(condition)
end

local function configureEchoMonster(monster, raid, guardian)
	local stats = guardian and config.guardian or config.echo
	local sourceName = raid.sourceName
	local displayName
	local description

	if guardian then
		displayName = "Echo Guardian of " .. sourceName
		description = "an echo guardian of " .. sourceName:lower()
	else
		displayName = "Echo of " .. sourceName
		description = "an echo of " .. sourceName:lower()
	end

	removeOriginalCreatureEvents(monster, monster:getType())

	local maxHealth = math.min(math.floor(monster:getMaxHealth() * stats.healthMultiplier), MAX_HEALTH)
	monster:setMaxHealth(maxHealth)
	monster:setHealth(maxHealth)
	monster:setName(displayName, description)
	monster:setDropLoot(true)
	applyDamageMultiplier(monster, stats.damageMultiplier)

	local monsterId = monster:getId()
	echoUnits[monsterId] = {
		raidId = raid.id,
		sourceType = raid.sourceType,
		sourceName = sourceName,
		guardian = guardian,
		experienceMultiplier = stats.experienceMultiplier,
	}
	raid.spawned[monsterId] = true
	monster:registerEvent("EchoRaidUnitDeath")

	monster:getPosition():sendMagicEffect(guardian and CONST_ME_MORTAREA or CONST_ME_TELEPORT)
	return monster
end

local function spawnEcho(raid, guardian)
	local spawnPosition = findSpawnPosition(raid.position)
	if not spawnPosition then
		return nil
	end

	local monster = Game.createMonster(raid.sourceType, spawnPosition, false, false)
	if not monster then
		return nil
	end
	return configureEchoMonster(monster, raid, guardian)
end

local function countAliveRaidMonsters(raid)
	local count = 0
	for monsterId in pairs(raid.spawned) do
		local monster = Monster(monsterId)
		if monster and not monster:isDead() then
			count = count + 1
		else
			raid.spawned[monsterId] = nil
			echoUnits[monsterId] = nil
		end
	end
	return count
end

local function notifyNearbyPlayers(position, message)
	local center = toPosition(position)
	local spectators = Game.getSpectators(
		center,
		false,
		true,
		config.nearbyPlayerRange,
		config.nearbyPlayerRange,
		config.nearbyPlayerRange,
		config.nearbyPlayerRange
	)
	for _, player in ipairs(spectators) do
		player:sendTextMessage(MESSAGE_EVENT_ADVANCE, message)
	end
end

local function endRaid(raidId)
	local raid = activeRaids[raidId]
	if not raid then
		return
	end

	activeRaids[raidId] = nil
	activeRaidCount = math.max(0, activeRaidCount - 1)

	for monsterId in pairs(raid.spawned) do
		echoUnits[monsterId] = nil
		local monster = Monster(monsterId)
		if monster then
			monster:remove()
		end
	end

	toPosition(raid.position):sendMagicEffect(CONST_ME_POFF)
	notifyNearbyPlayers(raid.position, string.format("The Echo Raid of %s has ended.", raid.sourceName))
	logger.info("[Echo Raid] Raid {} of '{}' ended.", raid.id, raid.sourceType)
end

local function raidTick(raidId)
	local raid = activeRaids[raidId]
	if not raid then
		return
	end

	if now() >= raid.endsAt then
		endRaid(raidId)
		return
	end

	if not hasNearbyPlayer(raid.position) then
		logger.info("[Echo Raid] Raid {} of '{}' cancelled because no nearby players were found.", raid.id, raid.sourceType)
		endRaid(raidId)
		return
	end

	local alive = countAliveRaidMonsters(raid)
	local availableSlots = math.max(0, config.maxAlivePerRaid - alive)
	local echoCount = math.min(config.monstersPerWave, availableSlots)

	for _ = 1, echoCount do
		if spawnEcho(raid, false) then
			availableSlots = availableSlots - 1
		end
	end

	if not raid.guardianSpawned and availableSlots > 0 and roll(config.guardianChancePerWave) then
		if spawnEcho(raid, true) then
			raid.guardianSpawned = true
			notifyNearbyPlayers(
				raid.position,
				string.format("An Echo Guardian of %s has appeared!", raid.sourceName)
			)
		end
	end

	addEvent(raidTick, config.spawnInterval, raidId)
end

local function startRaid(player, item, sourceType, sourceName, token)
	if activeRaidCount >= config.maxConcurrentRaids then
		player:sendTextMessage(MESSAGE_EVENT_ADVANCE, "Too many Echo Raids are active. Try this Echo Raid again shortly.")
		return false
	end

	local monsterType = MonsterType(sourceType)
	if not monsterType then
		player:sendTextMessage(MESSAGE_EVENT_ADVANCE, "This Echo Raid has lost its connection to the original creature.")
		item:remove()
		pendingItems[token] = nil
		return false
	end

	local position = item:getPosition()
	local tile = Tile(position)
	if not tile or tile:hasFlag(TILESTATE_PROTECTIONZONE) or tile:hasFlag(TILESTATE_HOUSE) then
		player:sendTextMessage(MESSAGE_EVENT_ADVANCE, "An Echo Raid cannot be activated in this area.")
		return false
	end

	for _, raid in pairs(activeRaids) do
		if isNear(copyPosition(position), raid.position, config.minimumRaidDistance) then
			player:sendTextMessage(MESSAGE_EVENT_ADVANCE, "Another Echo Raid is already active nearby.")
			return false
		end
	end

	nextRaidId = nextRaidId + 1
	local raid = {
		id = nextRaidId,
		sourceType = sourceType,
		sourceName = sourceName,
		position = copyPosition(position),
		endsAt = now() + config.raidDuration,
		guardianSpawned = false,
		spawned = {},
	}

	item:remove()
	pendingItems[token] = nil
	activeRaids[raid.id] = raid
	activeRaidCount = activeRaidCount + 1

	position:sendMagicEffect(CONST_ME_PURPLEENERGY)
	notifyNearbyPlayers(
		raid.position,
		string.format("An Echo Raid of %s has begun! It will remain active for 10 minutes.", sourceName)
	)
	logger.info("[Echo Raid] Player '{}' activated raid {} of '{}'.", player:getName(), raid.id, sourceType)

	raidTick(raid.id)
	addEvent(endRaid, config.raidDuration, raid.id)
	return true
end

local function addLootList(corpse, lootList)
	for _, loot in ipairs(lootList or {}) do
		if loot.id and roll(loot.chance) then
			local minimum = math.max(1, loot.minCount or 1)
			local maximum = math.max(minimum, loot.maxCount or minimum)
			local count = math.random(minimum, maximum)
			corpse:addLoot({
				[loot.id] = {
					count = count,
					subType = loot.subType or -1,
					actionId = loot.actionId or -1,
					text = loot.text or "",
					childLoot = loot.childLoot,
				},
			})
		end
	end
end

local function addExtraLoot(corpse, unit)
	local section = unit.guardian and config.extraLoot.guardian or config.extraLoot.echo
	addLootList(corpse, section.default)
	addLootList(corpse, section.byMonster[unit.sourceType] or section.byMonster[unit.sourceName])
end

local function isEligibleMonster(monster, monsterType)
	if monster:getMaster() then
		return false
	end
	if not monsterType:isHostile() then
		return false
	end
	if not config.allowRewardBosses and monsterType:isRewardBoss() then
		return false
	end
	if monsterType:maxHealth() < config.minimumMonsterHealth then
		return false
	end
	if monsterType:experience() < config.minimumMonsterExperience then
		return false
	end
	return not config.excludedMonsters[monsterType:getTypeName()]
end

local dropCallback = EventCallback("EchoRaidMonsterDrop")

function dropCallback.monsterOnDropLoot(monster, corpse)
	if not config.enabled or not monster or not corpse then
		return
	end

	local unit = echoUnits[monster:getId()]
	if unit then
		addExtraLoot(corpse, unit)
		return
	end

	local owner = Player(corpse:getCorpseOwner())
	if not owner or not owner:canReceiveLoot() then
		return
	end

	local monsterType = monster:getType()
	if not monsterType or not isEligibleMonster(monster, monsterType) then
		return
	end

	if not roll(config.echoDropChance) then
		return
	end

	prunePendingItems()
	if tableSize(pendingItems) >= config.maxPendingItems then
		return
	end

	local position = copyPosition(monster:getPosition())
	if hasNearbyEcho(position) then
		return
	end

	local item = Game.createItem(config.echoItemId, 1, monster:getPosition())
	if not item then
		logger.error("[Echo Raid] Could not create item id {}.", config.echoItemId)
		return
	end

	nextItemToken = nextItemToken + 1
	local sourceType = monsterType:getTypeName()
	local sourceName = monsterType:name()
	item:setName("Echo Raid")
	item:setDescription(string.format("Step on it to awaken echoes of %s. It will disappear in about 5 minutes.", sourceName))
	item:setCustomAttribute(ATTR_SOURCE_TYPE, sourceType)
	item:setCustomAttribute(ATTR_SOURCE_NAME, sourceName)
	item:setCustomAttribute(ATTR_TOKEN, nextItemToken)
	item:setDurationAttr(config.itemLifetime)
	item:decay()

	pendingItems[nextItemToken] = {
		position = position,
		expiresAt = now() + config.itemLifetime,
	}
	monster:getPosition():sendMagicEffect(CONST_ME_MAGIC_BLUE)
end

dropCallback:register()

local experienceCallback = EventCallback("EchoRaidExperience")

function experienceCallback.playerOnGainExperience(player, target, experience, rawExperience)
	if not target or not target:isMonster() then
		return experience
	end

	local unit = echoUnits[target:getId()]
	if not unit then
		return experience
	end
	return math.min(math.floor(experience * unit.experienceMultiplier), MAX_EXPERIENCE)
end

experienceCallback:register()

local unitDeath = CreatureEvent("EchoRaidUnitDeath")

function unitDeath.onDeath(creature, corpse, killer, mostDamageKiller, lastHitUnjustified, mostDamageUnjustified)
	local monsterId = creature:getId()
	local unit = echoUnits[monsterId]
	if not unit then
		return true
	end

	local raid = activeRaids[unit.raidId]
	if raid then
		raid.spawned[monsterId] = nil
	end
	echoUnits[monsterId] = nil
	return true
end

unitDeath:register()

local stepIn = MoveEvent()

function stepIn.onStepIn(creature, item, position, fromPosition)
	local player = creature:getPlayer()
	if not player or player:isInGhostMode() then
		return true
	end

	local sourceType = item:getCustomAttribute(ATTR_SOURCE_TYPE)
	local sourceName = item:getCustomAttribute(ATTR_SOURCE_NAME)
	local token = item:getCustomAttribute(ATTR_TOKEN)
	if not sourceType or not sourceName or not token then
		return true
	end

	local pending = pendingItems[token]
	if not pending or pending.expiresAt <= now() then
		pendingItems[token] = nil
		item:remove()
		return true
	end

	startRaid(player, item, sourceType, sourceName, token)
	return true
end

stepIn:id(config.echoItemId)
stepIn:type("stepin")
stepIn:register()

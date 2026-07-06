<?php
/** Logica de dominio y persistencia de Loteria Mexicana Online. */
defined('MYAAC') or die('Direct access not allowed!');

class LoteriaDomainException extends RuntimeException
{
    private int $httpStatus;

    public function __construct(string $message, int $httpStatus = 400)
    {
        parent::__construct($message);
        $this->httpStatus = $httpStatus;
    }

    public function getHttpStatus(): int
    {
        return $this->httpStatus;
    }
}

final class LoteriaService
{
    private PDO $db;
    private array $config;
    private array $catalog;

    public function __construct(PDO $db, array $config, array $catalog)
    {
        $this->db = $db;
        $this->config = $config;
        $this->catalog = $catalog;
        $this->validateConfiguration();
    }

    public function listRooms(int $accountId): array
    {
        $statement = $this->db->prepare(
            "SELECT r.`id`, r.`creator_account_id`, r.`creator_name`, r.`name`, r.`card_price`,
                    r.`speed_seconds`, r.`max_players`, r.`victory_mode`, r.`status`, r.`prize_pool`,
                    r.`created_at`, r.`started_at`, r.`ended_at`,
                    (SELECT COUNT(*) FROM `loteria_room_players` rpc
                     WHERE rpc.`room_id` = r.`id` AND rpc.`cards_bought` > 0) AS `player_count`,
                    (SELECT COALESCE(SUM(rpm.`cards_bought`), 0) FROM `loteria_room_players` rpm
                     WHERE rpm.`room_id` = r.`id` AND rpm.`account_id` = :account_id) AS `my_cards`
             FROM `loteria_rooms` r
             WHERE r.`status` <> 'finished'
             ORDER BY FIELD(r.`status`, 'playing', 'waiting', 'finished'), r.`id` DESC
             LIMIT 100"
        );
        $statement->execute([':account_id' => $accountId]);

        return array_map([$this, 'normalizeRoomSummary'], $statement->fetchAll(PDO::FETCH_ASSOC));
    }

    public function accountBalance(int $accountId): int
    {
        $statement = $this->db->prepare(
            'SELECT `coins_transferable` FROM `accounts` WHERE `id` = :account_id LIMIT 1'
        );
        $statement->execute([':account_id' => $accountId]);
        $balance = $statement->fetchColumn();
        if ($balance === false) {
            throw new LoteriaDomainException('La cuenta ya no existe.', 404);
        }
        return (int)$balance;
    }

    public function createRoom(int $accountId, string $displayName, array $input): int
    {
        $name = trim((string)($input['name'] ?? ''));
        $price = filter_var($input['card_price'] ?? null, FILTER_VALIDATE_INT);
        $speed = filter_var($input['speed_seconds'] ?? null, FILTER_VALIDATE_INT);
        $maxPlayers = filter_var($input['max_players'] ?? null, FILTER_VALIDATE_INT);
        $victoryMode = (string)($input['victory_mode'] ?? $this->config['win_condition']);

        if ($name === '' || $this->textLength($name) > (int)$this->config['room_name_max_length']) {
            throw new LoteriaDomainException(
                'El nombre de la sala es obligatorio y debe tener como maximo '
                . (int)$this->config['room_name_max_length'] . ' caracteres.'
            );
        }
        if ($price === false || $price < $this->config['price']['min'] || $price > $this->config['price']['max']) {
            throw new LoteriaDomainException('El precio por carta esta fuera del rango permitido.');
        }
        if ($speed === false || $speed < $this->config['speed']['min_seconds'] || $speed > $this->config['speed']['max_seconds']) {
            throw new LoteriaDomainException('La velocidad seleccionada no esta permitida.');
        }
        if ($maxPlayers === false || $maxPlayers < $this->config['players']['min_to_start'] || $maxPlayers > $this->config['players']['max_allowed']) {
            throw new LoteriaDomainException('La cantidad maxima de jugadores no esta permitida.');
        }
        if (!array_key_exists($victoryMode, $this->config['victory_modes'])) {
            throw new LoteriaDomainException('El modo de victoria no es valido.');
        }

        $rules = [
            'cards_per_player' => (int)$this->config['cards']['per_player'],
            'cells_per_card' => (int)$this->config['cards']['cells'],
            'min_players' => (int)$this->config['players']['min_to_start'],
            'prizes' => $this->config['prizes'],
            'one_prize_per_account' => (bool)$this->config['one_prize_per_account'],
            'win_condition' => $victoryMode,
        ];

        try {
            $this->db->beginTransaction();
            // Bloquear la cuenta serializa dos creaciones simultaneas del mismo usuario.
            $accountLock = $this->db->prepare('SELECT `id` FROM `accounts` WHERE `id` = :account_id FOR UPDATE');
            $accountLock->execute([':account_id' => $accountId]);
            if (!$accountLock->fetchColumn()) {
                throw new LoteriaDomainException('La cuenta ya no existe.', 404);
            }

            $statement = $this->db->prepare(
                "SELECT COUNT(*) FROM `loteria_rooms`
                 WHERE `creator_account_id` = :account_id AND `status` = 'waiting'"
            );
            $statement->execute([':account_id' => $accountId]);
            if ((int)$statement->fetchColumn() >= (int)$this->config['max_waiting_rooms_per_creator']) {
                throw new LoteriaDomainException('Ya tienes el maximo de salas en espera permitido.');
            }

            $statement = $this->db->prepare(
                "INSERT INTO `loteria_rooms`
                    (`creator_account_id`, `creator_name`, `name`, `card_price`, `speed_seconds`, `max_players`, `victory_mode`, `rules_json`)
                 VALUES (:creator_account_id, :creator_name, :name, :card_price, :speed_seconds, :max_players, :victory_mode, :rules_json)"
            );
            $statement->execute([
                ':creator_account_id' => $accountId,
                ':creator_name' => $this->cleanDisplayName($displayName, $accountId),
                ':name' => $name,
                ':card_price' => $price,
                ':speed_seconds' => $speed,
                ':max_players' => $maxPlayers,
                ':victory_mode' => $victoryMode,
                ':rules_json' => $this->encodeJson($rules),
            ]);
            $roomId = (int)$this->db->lastInsertId();
            $this->db->commit();
            return $roomId;
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('No fue posible crear la sala.', 409);
        }
    }

    public function editRoom(int $roomId, int $accountId, array $input): void
    {
        $name = trim((string)($input['name'] ?? ''));
        $price = filter_var($input['card_price'] ?? null, FILTER_VALIDATE_INT);
        $speed = filter_var($input['speed_seconds'] ?? null, FILTER_VALIDATE_INT);
        $maxPlayers = filter_var($input['max_players'] ?? null, FILTER_VALIDATE_INT);
        $victoryMode = (string)($input['victory_mode'] ?? '');

        if ($name === '' || $this->textLength($name) > (int)$this->config['room_name_max_length']) {
            throw new LoteriaDomainException('El nombre de la sala no es valido.');
        }
        if ($price === false || $price < $this->config['price']['min'] || $price > $this->config['price']['max']) {
            throw new LoteriaDomainException('El precio por carta esta fuera del rango permitido.');
        }
        if ($speed === false || $speed < $this->config['speed']['min_seconds'] || $speed > $this->config['speed']['max_seconds']) {
            throw new LoteriaDomainException('La velocidad seleccionada no esta permitida.');
        }
        if ($maxPlayers === false || $maxPlayers < $this->config['players']['min_to_start'] || $maxPlayers > $this->config['players']['max_allowed']) {
            throw new LoteriaDomainException('La cantidad maxima de jugadores no esta permitida.');
        }
        if (!array_key_exists($victoryMode, $this->config['victory_modes'])) {
            throw new LoteriaDomainException('El modo de victoria no es valido.');
        }

        try {
            $this->db->beginTransaction();
            $room = $this->lockRoom($roomId);
            if ((int)$room['creator_account_id'] !== $accountId) {
                throw new LoteriaDomainException('Solo el creador puede editar la sala.', 403);
            }
            if ($room['status'] !== 'waiting') {
                throw new LoteriaDomainException('La sala no puede editarse despues de iniciar.');
            }
            $playerCount = $this->db->prepare(
                'SELECT COUNT(*) FROM `loteria_room_players` WHERE `room_id` = :room_id AND `cards_bought` > 0'
            );
            $playerCount->execute([':room_id' => $roomId]);
            if ((int)$playerCount->fetchColumn() > $maxPlayers) {
                throw new LoteriaDomainException('El maximo no puede ser menor que los jugadores que ya compraron.');
            }

            $rules = $this->decodeObject($room['rules_json']);
            $rules['win_condition'] = $victoryMode;
            $statement = $this->db->prepare(
                'UPDATE `loteria_rooms` SET `name` = :name, `card_price` = :card_price, '
                . '`speed_seconds` = :speed_seconds, `max_players` = :max_players, '
                . '`victory_mode` = :victory_mode, `rules_json` = :rules_json '
                . "WHERE `id` = :room_id AND `status` = 'waiting'"
            );
            $statement->execute([
                ':name' => $name, ':card_price' => $price, ':speed_seconds' => $speed,
                ':max_players' => $maxPlayers, ':victory_mode' => $victoryMode,
                ':rules_json' => $this->encodeJson($rules), ':room_id' => $roomId,
            ]);
            $this->db->commit();
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('No fue posible editar la sala.', 409);
        }
    }

    public function roomState(int $roomId, int $accountId): array
    {
        if (!$this->roomExists($roomId)) {
            return $this->archivedRoomState($roomId, $accountId);
        }
        $this->touchPresence($roomId, $accountId);
        $this->advanceDraw($roomId);

        $statement = $this->db->prepare(
            "SELECT r.*,
                    (SELECT COUNT(*) FROM `loteria_room_players` rp
                     WHERE rp.`room_id` = r.`id` AND rp.`cards_bought` > 0) AS `player_count`
             FROM `loteria_rooms` r WHERE r.`id` = :room_id LIMIT 1"
        );
        $statement->execute([':room_id' => $roomId]);
        $room = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$room) {
            throw new LoteriaDomainException('La sala no existe.', 404);
        }

        $playersStatement = $this->db->prepare(
            "SELECT `display_name`, `cards_bought`, `total_paid`, `joined_at`
             FROM `loteria_room_players`
             WHERE `room_id` = :room_id AND `cards_bought` > 0
             ORDER BY `joined_at`, `id`"
        );
        $playersStatement->execute([':room_id' => $roomId]);
        $players = $playersStatement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($players as &$player) {
            $player['cards_bought'] = (int)$player['cards_bought'];
            $player['total_paid'] = (int)$player['total_paid'];
        }
        unset($player);

        $cardsStatement = $this->db->prepare(
            "SELECT `id`, `card_data`, `marked_data`, `is_completed`, `created_at`, `completed_at`
             FROM `loteria_player_cards`
             WHERE `room_id` = :room_id AND `account_id` = :account_id
             ORDER BY `id`"
        );
        $cardsStatement->execute([':room_id' => $roomId, ':account_id' => $accountId]);
        $myCards = [];
        foreach ($cardsStatement->fetchAll(PDO::FETCH_ASSOC) as $card) {
            $myCards[] = [
                'id' => (int)$card['id'],
                'cells' => $this->expandCard($this->decodeIdArray($card['card_data'])),
                'marked' => $this->decodeIdArray($card['marked_data']),
                'is_completed' => (bool)$card['is_completed'],
                'created_at' => $card['created_at'],
                'completed_at' => $card['completed_at'],
            ];
        }

        $drawnStatement = $this->db->prepare(
            "SELECT `card_id`, `card_name`, `drawn_order`, `drawn_at`
             FROM `loteria_drawn_cards` WHERE `room_id` = :room_id ORDER BY `drawn_order`"
        );
        $drawnStatement->execute([':room_id' => $roomId]);
        $drawn = [];
        foreach ($drawnStatement->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $cardInfo = $this->publicCatalogCard((int)$item['card_id']);
            $cardInfo['order'] = (int)$item['drawn_order'];
            $cardInfo['drawn_at'] = $item['drawn_at'];
            $drawn[] = $cardInfo;
        }

        $winnersStatement = $this->db->prepare(
            "SELECT `player_name`, `place`, `prize_amount`, `paid_at`, `created_at`
             FROM `loteria_winners` WHERE `room_id` = :room_id ORDER BY `place`"
        );
        $winnersStatement->execute([':room_id' => $roomId]);
        $winners = $winnersStatement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($winners as &$winner) {
            $winner['place'] = (int)$winner['place'];
            $winner['prize_amount'] = (int)$winner['prize_amount'];
        }
        unset($winner);

        $balanceStatement = $this->db->prepare(
            'SELECT `coins_transferable` FROM `accounts` WHERE `id` = :account_id LIMIT 1'
        );
        $balanceStatement->execute([':account_id' => $accountId]);
        $balance = (int)$balanceStatement->fetchColumn();

        $rules = $this->decodeObject($room['rules_json']);
        $myBought = count($myCards);
        $offers = [];
        if ($room['status'] === 'waiting' && $myBought < (int)$rules['cards_per_player']) {
            $offers = $this->getOrCreateOffers($roomId, $accountId);
        }

        $normalizedRoom = $this->normalizeRoomSummary($room);
        $normalizedRoom['rules'] = $rules;
        $normalizedRoom['draw_count'] = (int)$room['draw_position'];
        $normalizedRoom['next_draw_at'] = $room['next_draw_at'];
        $normalizedRoom['intro_pending'] = $room['status'] === 'playing'
            && (int)$room['draw_position'] === 0
            && empty($room['current_card_id']);
        $normalizedRoom['can_start'] = $room['status'] === 'waiting'
            && (int)$room['creator_account_id'] === $accountId
            && (int)$room['player_count'] >= (int)$rules['min_players'];
        $normalizedRoom['is_creator'] = (int)$room['creator_account_id'] === $accountId;
        $normalizedRoom['victory_mode_label'] = $this->config['victory_modes'][$room['victory_mode']] ?? $room['victory_mode'];

        return [
            'room' => $normalizedRoom,
            'balance' => $balance,
            'players' => $players,
            'offers' => $offers,
            'my_cards' => $myCards,
            'drawn' => $drawn,
            'current' => $drawn ? $drawn[count($drawn) - 1] : null,
            'winners' => $winners,
            'archived' => false,
        ];
    }

    public function deleteRoom(int $roomId, int $accountId): void
    {
        try {
            $this->db->beginTransaction();
            $room = $this->lockRoom($roomId);
            if ((int)$room['creator_account_id'] !== $accountId) {
                throw new LoteriaDomainException('Solo el creador puede eliminar la sala.', 403);
            }
            if ((bool)$room['winners_paid']) {
                $this->archiveAndDeleteFinishedRoomLocked($room, $this->decodeObject($room['rules_json']));
            } else {
                $this->refundAndDeleteLocked($room, 'creator_deleted');
            }
            $this->db->commit();
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('No fue posible eliminar la sala de forma segura.', 409);
        }
    }

    public function leaveRoom(int $roomId, int $accountId): void
    {
        $statement = $this->db->prepare(
            'DELETE FROM `loteria_room_presence` WHERE `room_id` = :room_id AND `account_id` = :account_id'
        );
        $statement->execute([':room_id' => $roomId, ':account_id' => $accountId]);
        $empty = $this->db->prepare(
            'UPDATE `loteria_rooms` r SET r.`empty_since` = COALESCE(r.`empty_since`, CURRENT_TIMESTAMP(6)) '
            . 'WHERE r.`id` = :room_id AND NOT EXISTS ('
            . 'SELECT 1 FROM `loteria_room_presence` p WHERE p.`room_id` = r.`id` '
            . 'AND p.`last_seen_at` >= DATE_SUB(CURRENT_TIMESTAMP(6), INTERVAL '
            . max(5, (int)$this->config['presence_ttl_seconds']) . ' SECOND))'
        );
        $empty->execute([':room_id' => $roomId]);
    }

    public function cleanupInactiveRooms(): int
    {
        $presenceTtl = max(5, (int)$this->config['presence_ttl_seconds']);
        $emptyLifetime = max(30, (int)$this->config['empty_room_lifetime_seconds']);

        $reset = $this->db->prepare(
            'UPDATE `loteria_rooms` r SET r.`empty_since` = NULL WHERE EXISTS ('
            . 'SELECT 1 FROM `loteria_room_presence` p WHERE p.`room_id` = r.`id` '
            . 'AND p.`last_seen_at` >= DATE_SUB(CURRENT_TIMESTAMP(6), INTERVAL ' . $presenceTtl . ' SECOND))'
        );
        $reset->execute();

        $initialize = $this->db->prepare(
            'UPDATE `loteria_rooms` r LEFT JOIN ('
            . 'SELECT `room_id`, MAX(`last_seen_at`) AS `last_seen_at` FROM `loteria_room_presence` GROUP BY `room_id`'
            . ') pmax ON pmax.`room_id` = r.`id` '
            . 'SET r.`empty_since` = COALESCE(pmax.`last_seen_at`, r.`created_at`) '
            . 'WHERE r.`empty_since` IS NULL AND NOT EXISTS ('
            . 'SELECT 1 FROM `loteria_room_presence` p WHERE p.`room_id` = r.`id` '
            . 'AND p.`last_seen_at` >= DATE_SUB(CURRENT_TIMESTAMP(6), INTERVAL ' . $presenceTtl . ' SECOND))'
        );
        $initialize->execute();

        $candidates = $this->db->query(
            'SELECT `id` FROM `loteria_rooms` WHERE `empty_since` IS NOT NULL '
            . 'AND `empty_since` <= DATE_SUB(CURRENT_TIMESTAMP(6), INTERVAL ' . $emptyLifetime . ' SECOND) '
            . 'ORDER BY `empty_since` LIMIT 20'
        )->fetchAll(PDO::FETCH_COLUMN);

        $deleted = 0;
        foreach ($candidates as $candidateId) {
            try {
                $this->db->beginTransaction();
                $room = $this->lockRoom((int)$candidateId);
                $active = $this->db->prepare(
                    'SELECT 1 FROM `loteria_room_presence` WHERE `room_id` = :room_id '
                    . 'AND `last_seen_at` >= DATE_SUB(CURRENT_TIMESTAMP(6), INTERVAL ' . $presenceTtl . ' SECOND) LIMIT 1'
                );
                $active->execute([':room_id' => (int)$candidateId]);
                if ($active->fetchColumn()) {
                    $this->db->prepare('UPDATE `loteria_rooms` SET `empty_since` = NULL WHERE `id` = :room_id')
                        ->execute([':room_id' => (int)$candidateId]);
                    $this->db->commit();
                    continue;
                }
                $due = $this->db->prepare(
                    'SELECT (`empty_since` <= DATE_SUB(CURRENT_TIMESTAMP(6), INTERVAL ' . $emptyLifetime . ' SECOND)) '
                    . 'FROM `loteria_rooms` WHERE `id` = :room_id'
                );
                $due->execute([':room_id' => (int)$candidateId]);
                if (!(bool)$due->fetchColumn()) {
                    $this->db->commit();
                    continue;
                }
                if ((bool)$room['winners_paid']) {
                    $this->archiveAndDeleteFinishedRoomLocked($room, $this->decodeObject($room['rules_json']));
                } else {
                    $this->refundAndDeleteLocked($room, 'inactive');
                }
                $this->db->commit();
                $deleted++;
            } catch (LoteriaDomainException $exception) {
                $this->rollbackIfNeeded();
                if ($exception->getHttpStatus() !== 404) {
                    throw $exception;
                }
            } catch (Throwable $exception) {
                $this->rollbackIfNeeded();
                error_log('[loteria cleanup] ' . $exception->getMessage());
            }
        }
        return $deleted;
    }

    public function buyCards(int $roomId, int $accountId, string $displayName, array $tokens): array
    {
        $tokens = array_values(array_unique(array_filter($tokens, static function ($value): bool {
            return is_string($value) && preg_match('/^[a-f0-9]{64}$/', $value) === 1;
        })));
        if (!$tokens) {
            throw new LoteriaDomainException('Selecciona al menos una carta valida.');
        }

        try {
            $this->db->beginTransaction();
            $room = $this->lockRoom($roomId);
            if ($room['status'] !== 'waiting') {
                throw new LoteriaDomainException('La sala ya inicio; no se pueden comprar mas cartas.');
            }
            $rules = $this->decodeObject($room['rules_json']);

            $playerStatement = $this->db->prepare(
                'SELECT * FROM `loteria_room_players` WHERE `room_id` = :room_id AND `account_id` = :account_id FOR UPDATE'
            );
            $playerStatement->execute([':room_id' => $roomId, ':account_id' => $accountId]);
            $player = $playerStatement->fetch(PDO::FETCH_ASSOC);
            $alreadyBought = $player ? (int)$player['cards_bought'] : 0;
            $remaining = (int)$rules['cards_per_player'] - $alreadyBought;
            if (count($tokens) > $remaining) {
                throw new LoteriaDomainException('No puedes comprar mas de ' . (int)$rules['cards_per_player'] . ' cartas en esta sala.');
            }

            if (!$player) {
                $countStatement = $this->db->prepare(
                    'SELECT COUNT(*) FROM `loteria_room_players` WHERE `room_id` = :room_id AND `cards_bought` > 0'
                );
                $countStatement->execute([':room_id' => $roomId]);
                if ((int)$countStatement->fetchColumn() >= (int)$room['max_players']) {
                    throw new LoteriaDomainException('La sala ya alcanzo su limite de jugadores.');
                }
            }

            $placeholders = [];
            $parameters = [':room_id' => $roomId, ':account_id' => $accountId];
            foreach ($tokens as $index => $token) {
                $key = ':token_' . $index;
                $placeholders[] = $key;
                $parameters[$key] = $token;
            }
            $offersStatement = $this->db->prepare(
                'SELECT `id`, `offer_token`, `card_data` FROM `loteria_card_offers` '
                . 'WHERE `room_id` = :room_id AND `account_id` = :account_id '
                . 'AND `offer_token` IN (' . implode(',', $placeholders) . ') '
                . 'AND `purchased_at` IS NULL AND `expires_at` > CURRENT_TIMESTAMP FOR UPDATE'
            );
            $offersStatement->execute($parameters);
            $offers = $offersStatement->fetchAll(PDO::FETCH_ASSOC);
            if (count($offers) !== count($tokens)) {
                throw new LoteriaDomainException('Una de las cartas ofrecidas vencio o ya fue comprada. Actualiza la sala.');
            }

            $totalCost = (int)$room['card_price'] * count($offers);
            $accountStatement = $this->db->prepare(
                'SELECT `coins_transferable` FROM `accounts` WHERE `id` = :account_id FOR UPDATE'
            );
            $accountStatement->execute([':account_id' => $accountId]);
            $balance = $accountStatement->fetchColumn();
            if ($balance === false) {
                throw new LoteriaDomainException('La cuenta ya no existe.', 404);
            }
            if ((int)$balance < $totalCost) {
                throw new LoteriaDomainException('No tienes suficientes Tibia Coins transferibles.');
            }

            $debitStatement = $this->db->prepare(
                'UPDATE `accounts` SET `coins_transferable` = `coins_transferable` - :cost '
                . 'WHERE `id` = :account_id AND `coins_transferable` >= :minimum_cost'
            );
            $debitStatement->execute([
                ':cost' => $totalCost,
                ':account_id' => $accountId,
                ':minimum_cost' => $totalCost,
            ]);
            if ($debitStatement->rowCount() !== 1) {
                throw new LoteriaDomainException('No fue posible reservar los Tibia Coins. Intenta nuevamente.');
            }

            $insertCard = $this->db->prepare(
                'INSERT INTO `loteria_player_cards` (`room_id`, `account_id`, `card_data`, `marked_data`) '
                . "VALUES (:room_id, :account_id, :card_data, '[]')"
            );
            $markOffer = $this->db->prepare(
                'UPDATE `loteria_card_offers` SET `purchased_at` = CURRENT_TIMESTAMP '
                . 'WHERE `id` = :offer_id AND `purchased_at` IS NULL'
            );
            foreach ($offers as $offer) {
                $cardData = $this->decodeIdArray($offer['card_data']);
                $this->assertValidGameCard($cardData);
                $insertCard->execute([
                    ':room_id' => $roomId,
                    ':account_id' => $accountId,
                    ':card_data' => $this->encodeJson($cardData),
                ]);
                $markOffer->execute([':offer_id' => (int)$offer['id']]);
                if ($markOffer->rowCount() !== 1) {
                    throw new RuntimeException('La oferta fue consumida por otra solicitud.');
                }
            }

            if ($player) {
                $updatePlayer = $this->db->prepare(
                    'UPDATE `loteria_room_players` SET `cards_bought` = `cards_bought` + :quantity, '
                    . '`total_paid` = `total_paid` + :paid, `display_name` = :display_name WHERE `id` = :player_id'
                );
                $updatePlayer->execute([
                    ':quantity' => count($offers), ':paid' => $totalCost,
                    ':display_name' => $this->cleanDisplayName($displayName, $accountId),
                    ':player_id' => (int)$player['id'],
                ]);
            } else {
                $insertPlayer = $this->db->prepare(
                    'INSERT INTO `loteria_room_players` '
                    . '(`room_id`, `account_id`, `display_name`, `cards_bought`, `total_paid`) '
                    . 'VALUES (:room_id, :account_id, :display_name, :quantity, :paid)'
                );
                $insertPlayer->execute([
                    ':room_id' => $roomId, ':account_id' => $accountId,
                    ':display_name' => $this->cleanDisplayName($displayName, $accountId),
                    ':quantity' => count($offers), ':paid' => $totalCost,
                ]);
            }

            $poolStatement = $this->db->prepare(
                'UPDATE `loteria_rooms` SET `prize_pool` = `prize_pool` + :paid WHERE `id` = :room_id'
            );
            $poolStatement->execute([':paid' => $totalCost, ':room_id' => $roomId]);

            sort($tokens, SORT_STRING);
            $newBalance = (int)$balance - $totalCost;
            $ledgerStatement = $this->db->prepare(
                "INSERT INTO `loteria_coin_ledger`
                 (`room_id`, `account_id`, `movement_type`, `amount`, `reference_key`, `balance_after`)
                 VALUES (:room_id, :account_id, 'purchase', :amount, :reference_key, :balance_after)"
            );
            $ledgerStatement->execute([
                ':room_id' => $roomId, ':account_id' => $accountId, ':amount' => -$totalCost,
                ':reference_key' => 'purchase:' . $roomId . ':' . $accountId . ':' . hash('sha256', implode('|', $tokens)),
                ':balance_after' => $newBalance,
            ]);

            $this->db->commit();
            return ['cards_bought' => count($offers), 'total_cost' => $totalCost, 'balance' => $newBalance];
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('La compra no pudo completarse de forma segura. Intenta nuevamente.', 409);
        }
    }

    public function startRoom(int $roomId, int $accountId): void
    {
        try {
            $this->db->beginTransaction();
            $room = $this->lockRoom($roomId);
            if ((int)$room['creator_account_id'] !== $accountId) {
                throw new LoteriaDomainException('Solo el creador puede iniciar la partida.', 403);
            }
            if ($room['status'] !== 'waiting') {
                throw new LoteriaDomainException('La sala ya no esta esperando jugadores.');
            }
            $rules = $this->decodeObject($room['rules_json']);
            $countStatement = $this->db->prepare(
                'SELECT COUNT(*) FROM `loteria_room_players` WHERE `room_id` = :room_id AND `cards_bought` > 0'
            );
            $countStatement->execute([':room_id' => $roomId]);
            if ((int)$countStatement->fetchColumn() < (int)$rules['min_players']) {
                throw new LoteriaDomainException('Se necesitan al menos ' . (int)$rules['min_players'] . ' jugadores con carta.');
            }

            $deck = $this->secureShuffle(array_keys($this->catalog));
            $introFallback = max(10, min(300, (int)($this->config['intro']['fallback_seconds'] ?? 60)));
            $statement = $this->db->prepare(
                "UPDATE `loteria_rooms`
                 SET `status` = 'playing', `draw_order` = :draw_order, `draw_position` = 0,
                     `current_card_id` = NULL, `started_at` = CURRENT_TIMESTAMP,
                     `next_draw_at` = DATE_ADD(CURRENT_TIMESTAMP(6), INTERVAL {$introFallback} SECOND)
                 WHERE `id` = :room_id AND `status` = 'waiting'"
            );
            $statement->execute([':draw_order' => $this->encodeJson($deck), ':room_id' => $roomId]);
            if ($statement->rowCount() !== 1) {
                throw new RuntimeException('No se pudo cambiar el estado de la sala.');
            }
            $this->db->commit();
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('No fue posible iniciar la partida.', 409);
        }
    }

    /** Habilita la primera baraja cuando termina la introduccion del creador. */
    public function finishIntroduction(int $roomId, int $accountId): void
    {
        $releaseFirstDraw = false;
        try {
            $this->db->beginTransaction();
            $room = $this->lockRoom($roomId);
            if ((int)$room['creator_account_id'] !== $accountId) {
                throw new LoteriaDomainException('Solo el creador puede finalizar la introduccion.', 403);
            }

            // Es idempotente: reintentos tardios no alteran el ritmo de las barajas.
            if ($room['status'] === 'playing'
                && (int)$room['draw_position'] === 0
                && empty($room['current_card_id'])) {
                $statement = $this->db->prepare(
                    'UPDATE `loteria_rooms` SET `next_draw_at` = CURRENT_TIMESTAMP(6) '
                    . 'WHERE `id` = :room_id AND `status` = \'playing\' AND `draw_position` = 0'
                );
                $statement->execute([':room_id' => $roomId]);
                $releaseFirstDraw = $statement->rowCount() === 1;
            }
            $this->db->commit();
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('No fue posible finalizar la introduccion.', 409);
        }

        if ($releaseFirstDraw) {
            $this->advanceDraw($roomId);
        }
    }

    public function markCell(int $roomId, int $accountId, int $playerCardId, int $cellIndex): array
    {
        try {
            $this->db->beginTransaction();
            $room = $this->lockRoom($roomId);
            if ($room['status'] !== 'playing') {
                throw new LoteriaDomainException('La partida no esta en juego.');
            }

            $cardStatement = $this->db->prepare(
                'SELECT * FROM `loteria_player_cards` '
                . 'WHERE `id` = :card_id AND `room_id` = :room_id AND `account_id` = :account_id FOR UPDATE'
            );
            $cardStatement->execute([
                ':card_id' => $playerCardId, ':room_id' => $roomId, ':account_id' => $accountId,
            ]);
            $card = $cardStatement->fetch(PDO::FETCH_ASSOC);
            if (!$card) {
                throw new LoteriaDomainException('La carta no pertenece a tu cuenta.', 403);
            }

            $cardData = $this->decodeIdArray($card['card_data']);
            $this->assertValidGameCard($cardData);
            if (!array_key_exists($cellIndex, $cardData)) {
                throw new LoteriaDomainException('La casilla seleccionada no existe.');
            }
            $catalogId = (int)$cardData[$cellIndex];

            $drawnStatement = $this->db->prepare(
                'SELECT 1 FROM `loteria_drawn_cards` WHERE `room_id` = :room_id AND `card_id` = :card_id LIMIT 1'
            );
            $drawnStatement->execute([':room_id' => $roomId, ':card_id' => $catalogId]);
            if (!$drawnStatement->fetchColumn()) {
                throw new LoteriaDomainException('Esa baraja todavia no ha sido cantada.');
            }

            $marked = $this->decodeIdArray($card['marked_data']);
            if (in_array($catalogId, $marked, true)) {
                throw new LoteriaDomainException('Esa baraja ya estaba marcada.', 409);
            }
            $marked[] = $catalogId;
            $marked = array_values(array_unique(array_map('intval', $marked)));
            $rules = $this->decodeObject($room['rules_json']);
            $completed = $this->isWinningCard($cardData, $marked, (string)$rules['win_condition']);

            $updateCard = $this->db->prepare(
                'UPDATE `loteria_player_cards` SET `marked_data` = :marked_data, '
                . '`is_completed` = :is_completed, '
                . '`completed_at` = CASE WHEN :completed_flag = 1 THEN COALESCE(`completed_at`, CURRENT_TIMESTAMP(6)) ELSE NULL END '
                . 'WHERE `id` = :card_id'
            );
            $completedValue = $completed ? 1 : 0;
            $updateCard->execute([
                ':marked_data' => $this->encodeJson($marked),
                ':is_completed' => $completedValue,
                ':completed_flag' => $completedValue,
                ':card_id' => $playerCardId,
            ]);

            $place = null;
            $historyId = null;
            $alreadyWinner = false;
            if ($completed) {
                if ((bool)$rules['one_prize_per_account']) {
                    $winnerCheck = $this->db->prepare(
                        'SELECT `place` FROM `loteria_winners` '
                        . 'WHERE `room_id` = :room_id AND `account_id` = :account_id LIMIT 1'
                    );
                    $winnerCheck->execute([':room_id' => $roomId, ':account_id' => $accountId]);
                } else {
                    $winnerCheck = $this->db->prepare(
                        'SELECT `place` FROM `loteria_winners` WHERE `player_card_id` = :player_card_id LIMIT 1'
                    );
                    $winnerCheck->execute([':player_card_id' => $playerCardId]);
                }
                $existingPlace = $winnerCheck->fetchColumn();
                if ($existingPlace !== false) {
                    $alreadyWinner = true;
                } else {
                    $winnerCount = $this->db->prepare(
                        'SELECT COUNT(*) FROM `loteria_winners` WHERE `room_id` = :room_id'
                    );
                    $winnerCount->execute([':room_id' => $roomId]);
                    $place = (int)$winnerCount->fetchColumn() + 1;
                    $winnerTarget = count($rules['prizes']);
                    if ($place <= $winnerTarget) {
                        $nameStatement = $this->db->prepare(
                            'SELECT `display_name` FROM `loteria_room_players` '
                            . 'WHERE `room_id` = :room_id AND `account_id` = :account_id LIMIT 1'
                        );
                        $nameStatement->execute([':room_id' => $roomId, ':account_id' => $accountId]);
                        $playerName = (string)$nameStatement->fetchColumn();

                        $insertWinner = $this->db->prepare(
                            'INSERT INTO `loteria_winners` '
                            . '(`room_id`, `account_id`, `player_card_id`, `player_name`, `place`) '
                            . 'VALUES (:room_id, :account_id, :player_card_id, :player_name, :place)'
                        );
                        $insertWinner->execute([
                            ':room_id' => $roomId, ':account_id' => $accountId,
                            ':player_card_id' => $playerCardId, ':player_name' => $playerName,
                            ':place' => $place,
                        ]);
                        if ($place === $winnerTarget) {
                            $historyId = $this->payPrizesLocked($room, $rules);
                        }
                    }
                }
            }

            $this->db->commit();
            return [
                'marked' => $marked,
                'marked_card_id' => $catalogId,
                'completed' => $completed,
                'place' => $place,
                'already_winner' => $alreadyWinner,
                'finished' => $historyId !== null,
                'history_id' => $historyId,
            ];
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('No fue posible marcar la casilla de forma segura.', 409);
        }
    }

    private function advanceDraw(int $roomId): void
    {
        try {
            $this->db->beginTransaction();
            $room = $this->lockRoom($roomId);
            if ($room['status'] !== 'playing' || !$room['next_draw_at']) {
                $this->db->commit();
                return;
            }

            $dueStatement = $this->db->prepare(
                'SELECT (`next_draw_at` <= CURRENT_TIMESTAMP(6)) FROM `loteria_rooms` WHERE `id` = :room_id'
            );
            $dueStatement->execute([':room_id' => $roomId]);
            if (!(bool)$dueStatement->fetchColumn()) {
                $this->db->commit();
                return;
            }

            $deck = $this->decodeIdArray($room['draw_order']);
            $position = (int)$room['draw_position'];
            if (!isset($deck[$position])) {
                $statement = $this->db->prepare(
                    'UPDATE `loteria_rooms` SET `next_draw_at` = NULL WHERE `id` = :room_id'
                );
                $statement->execute([':room_id' => $roomId]);
                $this->db->commit();
                return;
            }

            $catalogId = (int)$deck[$position];
            if (!isset($this->catalog[$catalogId])) {
                throw new RuntimeException('El mazo contiene una baraja desconocida.');
            }
            $drawOrder = $position + 1;
            $insert = $this->db->prepare(
                'INSERT INTO `loteria_drawn_cards` (`room_id`, `card_id`, `card_name`, `drawn_order`) '
                . 'VALUES (:room_id, :card_id, :card_name, :drawn_order)'
            );
            $insert->execute([
                ':room_id' => $roomId, ':card_id' => $catalogId,
                ':card_name' => $this->catalog[$catalogId]['name'], ':drawn_order' => $drawOrder,
            ]);

            $hasNext = isset($deck[$drawOrder]);
            if ($hasNext) {
                $update = $this->db->prepare(
                    'UPDATE `loteria_rooms` SET `draw_position` = :draw_position, `current_card_id` = :card_id, '
                    . '`next_draw_at` = DATE_ADD(CURRENT_TIMESTAMP(6), INTERVAL `speed_seconds` SECOND) '
                    . 'WHERE `id` = :room_id'
                );
            } else {
                $update = $this->db->prepare(
                    'UPDATE `loteria_rooms` SET `draw_position` = :draw_position, `current_card_id` = :card_id, '
                    . '`next_draw_at` = NULL WHERE `id` = :room_id'
                );
            }
            $update->execute([
                ':draw_position' => $drawOrder, ':card_id' => $catalogId, ':room_id' => $roomId,
            ]);
            $this->db->commit();
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('No fue posible actualizar el sorteo.', 409);
        }
    }

    private function getOrCreateOffers(int $roomId, int $accountId): array
    {
        try {
            $this->db->beginTransaction();
            $room = $this->lockRoom($roomId);
            if ($room['status'] !== 'waiting') {
                $this->db->commit();
                return [];
            }
            $rules = $this->decodeObject($room['rules_json']);

            $playerStatement = $this->db->prepare(
                'SELECT `id` FROM `loteria_room_players` WHERE `room_id` = :room_id AND `account_id` = :account_id'
            );
            $playerStatement->execute([':room_id' => $roomId, ':account_id' => $accountId]);
            if (!$playerStatement->fetchColumn()) {
                $capacityStatement = $this->db->prepare(
                    'SELECT COUNT(*) FROM `loteria_room_players` WHERE `room_id` = :room_id AND `cards_bought` > 0'
                );
                $capacityStatement->execute([':room_id' => $roomId]);
                if ((int)$capacityStatement->fetchColumn() >= (int)$room['max_players']) {
                    $this->db->commit();
                    return [];
                }
            }

            $countStatement = $this->db->prepare(
                'SELECT COUNT(*) FROM `loteria_player_cards` WHERE `room_id` = :room_id AND `account_id` = :account_id'
            );
            $countStatement->execute([':room_id' => $roomId, ':account_id' => $accountId]);
            if ((int)$countStatement->fetchColumn() >= (int)$rules['cards_per_player']) {
                $this->db->commit();
                return [];
            }

            $offersStatement = $this->db->prepare(
                'SELECT `offer_token`, `card_data`, `expires_at` FROM `loteria_card_offers` '
                . 'WHERE `room_id` = :room_id AND `account_id` = :account_id '
                . 'AND `purchased_at` IS NULL AND `expires_at` > CURRENT_TIMESTAMP '
                . 'ORDER BY `id` FOR UPDATE'
            );
            $offersStatement->execute([':room_id' => $roomId, ':account_id' => $accountId]);
            $offers = $offersStatement->fetchAll(PDO::FETCH_ASSOC);

            if (!$offers) {
                $expireStatement = $this->db->prepare(
                    'DELETE FROM `loteria_card_offers` WHERE `room_id` = :room_id AND `account_id` = :account_id '
                    . 'AND `purchased_at` IS NULL'
                );
                $expireStatement->execute([':room_id' => $roomId, ':account_id' => $accountId]);

                $batchToken = bin2hex(random_bytes(32));
                $lifetimeMinutes = max(1, (int)$this->config['cards']['offer_lifetime_minutes']);
                $insert = $this->db->prepare(
                    'INSERT INTO `loteria_card_offers` '
                    . '(`room_id`, `account_id`, `batch_token`, `offer_token`, `card_data`, `expires_at`) '
                    . 'VALUES (:room_id, :account_id, :batch_token, :offer_token, :card_data, '
                    . 'DATE_ADD(CURRENT_TIMESTAMP, INTERVAL ' . $lifetimeMinutes . ' MINUTE))'
                );
                for ($i = 0; $i < (int)$this->config['cards']['offered']; $i++) {
                    $ids = array_slice($this->secureShuffle(array_keys($this->catalog)), 0, (int)$rules['cells_per_card']);
                    $offerToken = bin2hex(random_bytes(32));
                    $insert->execute([
                        ':room_id' => $roomId, ':account_id' => $accountId,
                        ':batch_token' => $batchToken, ':offer_token' => $offerToken,
                        ':card_data' => $this->encodeJson($ids),
                    ]);
                    $offers[] = ['offer_token' => $offerToken, 'card_data' => $this->encodeJson($ids), 'expires_at' => null];
                }
            }
            $this->db->commit();

            return array_map(function (array $offer): array {
                return [
                    'token' => $offer['offer_token'],
                    'cells' => $this->expandCard($this->decodeIdArray($offer['card_data'])),
                    'expires_at' => $offer['expires_at'],
                ];
            }, $offers);
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('No fue posible generar las cartas aleatorias.', 409);
        }
    }

    private function payPrizesLocked(array $room, array $rules): int
    {
        if ((bool)$room['winners_paid']) {
            throw new RuntimeException('Los premios de esta sala ya fueron pagados.');
        }
        $prizes = $rules['prizes'];
        ksort($prizes, SORT_NUMERIC);
        $pool = (int)$room['prize_pool'];
        $distributed = 0;
        $places = array_keys($prizes);
        $lastPlace = (int)end($places);

        $winnerStatement = $this->db->prepare(
            'SELECT `id`, `account_id`, `place` FROM `loteria_winners` '
            . 'WHERE `room_id` = :room_id ORDER BY `place` FOR UPDATE'
        );
        $winnerStatement->execute([':room_id' => (int)$room['id']]);
        $winners = $winnerStatement->fetchAll(PDO::FETCH_ASSOC);
        if (count($winners) !== count($prizes)) {
            throw new RuntimeException('El numero de ganadores no coincide con la regla de premios.');
        }

        foreach ($winners as $winner) {
            $place = (int)$winner['place'];
            if (!array_key_exists($place, $prizes)) {
                throw new RuntimeException('Posicion de premio no configurada.');
            }
            $amount = $place === $lastPlace
                ? $pool - $distributed
                : (int)floor($pool * ((int)$prizes[$place] / 100));
            $distributed += $amount;

            $accountStatement = $this->db->prepare(
                'SELECT `coins_transferable` FROM `accounts` WHERE `id` = :account_id FOR UPDATE'
            );
            $accountStatement->execute([':account_id' => (int)$winner['account_id']]);
            $oldBalance = $accountStatement->fetchColumn();
            if ($oldBalance === false) {
                throw new RuntimeException('No existe la cuenta ganadora.');
            }
            $newBalance = (int)$oldBalance + $amount;
            $credit = $this->db->prepare(
                'UPDATE `accounts` SET `coins_transferable` = `coins_transferable` + :amount WHERE `id` = :account_id'
            );
            $credit->execute([':amount' => $amount, ':account_id' => (int)$winner['account_id']]);

            $updateWinner = $this->db->prepare(
                'UPDATE `loteria_winners` SET `prize_amount` = :amount, `paid_at` = CURRENT_TIMESTAMP(6) '
                . 'WHERE `id` = :winner_id AND `paid_at` IS NULL'
            );
            $updateWinner->execute([':amount' => $amount, ':winner_id' => (int)$winner['id']]);
            if ($updateWinner->rowCount() !== 1) {
                throw new RuntimeException('El premio ya habia sido procesado.');
            }

            $ledger = $this->db->prepare(
                "INSERT INTO `loteria_coin_ledger`
                 (`room_id`, `account_id`, `movement_type`, `amount`, `reference_key`, `balance_after`)
                 VALUES (:room_id, :account_id, 'prize', :amount, :reference_key, :balance_after)"
            );
            $ledger->execute([
                ':room_id' => (int)$room['id'], ':account_id' => (int)$winner['account_id'],
                ':amount' => $amount, ':reference_key' => 'prize:' . (int)$room['id'] . ':' . $place,
                ':balance_after' => $newBalance,
            ]);
        }

        if ($distributed !== $pool) {
            throw new RuntimeException('El reparto no coincide con el pozo.');
        }
        $finish = $this->db->prepare(
            "UPDATE `loteria_rooms` SET `status` = 'finished', `winners_paid` = 1,
             `finished_reason` = 'three_winners', `next_draw_at` = NULL, `ended_at` = CURRENT_TIMESTAMP(6)
             WHERE `id` = :room_id AND `status` = 'playing' AND `winners_paid` = 0"
        );
        $finish->execute([':room_id' => (int)$room['id']]);
        if ($finish->rowCount() !== 1) {
            throw new RuntimeException('No fue posible finalizar la sala.');
        }
        return $this->archiveAndDeleteFinishedRoomLocked($room, $rules);
    }

    private function lockRoom(int $roomId): array
    {
        $statement = $this->db->prepare('SELECT * FROM `loteria_rooms` WHERE `id` = :room_id FOR UPDATE');
        $statement->execute([':room_id' => $roomId]);
        $room = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$room) {
            throw new LoteriaDomainException('La sala no existe.', 404);
        }
        return $room;
    }

    private function roomExists(int $roomId): bool
    {
        $statement = $this->db->prepare('SELECT 1 FROM `loteria_rooms` WHERE `id` = :room_id LIMIT 1');
        $statement->execute([':room_id' => $roomId]);
        return (bool)$statement->fetchColumn();
    }

    private function touchPresence(int $roomId, int $accountId): void
    {
        try {
            $this->db->beginTransaction();
            $this->lockRoom($roomId);
            $presence = $this->db->prepare(
                'INSERT INTO `loteria_room_presence` (`room_id`, `account_id`, `last_seen_at`) '
                . 'VALUES (:room_id, :account_id, CURRENT_TIMESTAMP(6)) '
                . 'ON DUPLICATE KEY UPDATE `last_seen_at` = CURRENT_TIMESTAMP(6)'
            );
            $presence->execute([':room_id' => $roomId, ':account_id' => $accountId]);
            $reset = $this->db->prepare('UPDATE `loteria_rooms` SET `empty_since` = NULL WHERE `id` = :room_id');
            $reset->execute([':room_id' => $roomId]);
            $this->db->commit();
        } catch (Throwable $exception) {
            $this->rollbackIfNeeded();
            if ($exception instanceof LoteriaDomainException) {
                throw $exception;
            }
            throw new LoteriaDomainException('No fue posible registrar tu presencia en la sala.', 409);
        }
    }

    private function refundAndDeleteLocked(array $room, string $reason): void
    {
        if ((bool)$room['winners_paid']) {
            throw new RuntimeException('Una sala pagada no puede reembolsarse.');
        }
        $playersStatement = $this->db->prepare(
            'SELECT `account_id`, `total_paid` FROM `loteria_room_players` '
            . 'WHERE `room_id` = :room_id AND `total_paid` > 0 ORDER BY `account_id` FOR UPDATE'
        );
        $playersStatement->execute([':room_id' => (int)$room['id']]);
        foreach ($playersStatement->fetchAll(PDO::FETCH_ASSOC) as $player) {
            $accountId = (int)$player['account_id'];
            $amount = (int)$player['total_paid'];
            $balanceStatement = $this->db->prepare(
                'SELECT `coins_transferable` FROM `accounts` WHERE `id` = :account_id FOR UPDATE'
            );
            $balanceStatement->execute([':account_id' => $accountId]);
            $oldBalance = $balanceStatement->fetchColumn();
            if ($oldBalance === false) {
                throw new RuntimeException('No existe una cuenta que debe recibir reembolso.');
            }
            $newBalance = (int)$oldBalance + $amount;
            $credit = $this->db->prepare(
                'UPDATE `accounts` SET `coins_transferable` = `coins_transferable` + :amount WHERE `id` = :account_id'
            );
            $credit->execute([':amount' => $amount, ':account_id' => $accountId]);
            $ledger = $this->db->prepare(
                "INSERT INTO `loteria_coin_ledger`
                 (`room_id`, `account_id`, `movement_type`, `amount`, `reference_key`, `balance_after`)
                 VALUES (:room_id, :account_id, 'refund', :amount, :reference_key, :balance_after)"
            );
            $ledger->execute([
                ':room_id' => (int)$room['id'], ':account_id' => $accountId,
                ':amount' => $amount,
                ':reference_key' => 'refund:' . (int)$room['id'] . ':' . $accountId . ':' . $reason,
                ':balance_after' => $newBalance,
            ]);
        }

        $deleteWinners = $this->db->prepare('DELETE FROM `loteria_winners` WHERE `room_id` = :room_id');
        $deleteWinners->execute([':room_id' => (int)$room['id']]);
        $deleteRoom = $this->db->prepare('DELETE FROM `loteria_rooms` WHERE `id` = :room_id');
        $deleteRoom->execute([':room_id' => (int)$room['id']]);
        if ($deleteRoom->rowCount() !== 1) {
            throw new RuntimeException('La sala no pudo eliminarse.');
        }
    }

    private function archiveAndDeleteFinishedRoomLocked(array $room, array $rules): int
    {
        $playersStatement = $this->db->prepare(
            'SELECT `display_name`, `cards_bought`, `total_paid`, `joined_at` '
            . 'FROM `loteria_room_players` WHERE `room_id` = :room_id AND `cards_bought` > 0 '
            . 'ORDER BY `joined_at`, `id`'
        );
        $playersStatement->execute([':room_id' => (int)$room['id']]);
        $players = $playersStatement->fetchAll(PDO::FETCH_ASSOC);

        $drawnStatement = $this->db->prepare(
            'SELECT `card_id`, `drawn_order`, `drawn_at` FROM `loteria_drawn_cards` '
            . 'WHERE `room_id` = :room_id ORDER BY `drawn_order`'
        );
        $drawnStatement->execute([':room_id' => (int)$room['id']]);
        $drawn = $drawnStatement->fetchAll(PDO::FETCH_ASSOC);

        $winnersStatement = $this->db->prepare(
            'SELECT `account_id`, `player_name`, `place`, `prize_amount` FROM `loteria_winners` '
            . 'WHERE `room_id` = :room_id ORDER BY `place` FOR UPDATE'
        );
        $winnersStatement->execute([':room_id' => (int)$room['id']]);
        $winners = $winnersStatement->fetchAll(PDO::FETCH_ASSOC);

        $archive = $this->db->prepare(
            'INSERT INTO `loteria_game_history` '
            . '(`original_room_id`, `creator_account_id`, `creator_name`, `room_name`, `card_price`, '
            . '`speed_seconds`, `max_players`, `victory_mode`, `prize_pool`, `player_count`, `rules_json`, '
            . '`players_json`, `drawn_json`, `started_at`, `ended_at`) '
            . 'VALUES (:original_room_id, :creator_account_id, :creator_name, :room_name, :card_price, '
            . ':speed_seconds, :max_players, :victory_mode, :prize_pool, :player_count, :rules_json, '
            . ':players_json, :drawn_json, :started_at, COALESCE(:ended_at, CURRENT_TIMESTAMP(6)))'
        );
        $archive->execute([
            ':original_room_id' => (int)$room['id'],
            ':creator_account_id' => (int)$room['creator_account_id'],
            ':creator_name' => $room['creator_name'], ':room_name' => $room['name'],
            ':card_price' => (int)$room['card_price'], ':speed_seconds' => (int)$room['speed_seconds'],
            ':max_players' => (int)$room['max_players'], ':victory_mode' => $room['victory_mode'],
            ':prize_pool' => (int)$room['prize_pool'], ':player_count' => count($players),
            ':rules_json' => $this->encodeJson($rules), ':players_json' => $this->encodeJson($players),
            ':drawn_json' => $this->encodeJson($drawn), ':started_at' => $room['started_at'],
            ':ended_at' => $room['ended_at'],
        ]);
        $historyId = (int)$this->db->lastInsertId();
        if ($historyId <= 0) {
            throw new RuntimeException('No se pudo guardar el historial de la partida.');
        }

        $insertWinner = $this->db->prepare(
            'INSERT INTO `loteria_winner_history` '
            . '(`history_id`, `account_id`, `player_name`, `place`, `prize_amount`) '
            . 'VALUES (:history_id, :account_id, :player_name, :place, :prize_amount)'
        );
        foreach ($winners as $winner) {
            $insertWinner->execute([
                ':history_id' => $historyId, ':account_id' => (int)$winner['account_id'],
                ':player_name' => $winner['player_name'], ':place' => (int)$winner['place'],
                ':prize_amount' => (int)$winner['prize_amount'],
            ]);
        }

        $this->db->prepare('DELETE FROM `loteria_winners` WHERE `room_id` = :room_id')
            ->execute([':room_id' => (int)$room['id']]);
        $deleteRoom = $this->db->prepare('DELETE FROM `loteria_rooms` WHERE `id` = :room_id');
        $deleteRoom->execute([':room_id' => (int)$room['id']]);
        if ($deleteRoom->rowCount() !== 1) {
            throw new RuntimeException('No fue posible limpiar la sala finalizada.');
        }
        return $historyId;
    }

    private function archivedRoomState(int $roomId, int $accountId): array
    {
        $statement = $this->db->prepare(
            'SELECT * FROM `loteria_game_history` WHERE `original_room_id` = :room_id LIMIT 1'
        );
        $statement->execute([':room_id' => $roomId]);
        $history = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$history) {
            throw new LoteriaDomainException('La sala no existe o ya fue eliminada.', 404);
        }
        $rules = $this->decodeObject($history['rules_json']);
        $players = json_decode($history['players_json'], true, 64, JSON_THROW_ON_ERROR);
        foreach ($players as &$player) {
            $player['cards_bought'] = (int)$player['cards_bought'];
            $player['total_paid'] = (int)$player['total_paid'];
        }
        unset($player);

        $drawn = [];
        foreach (json_decode($history['drawn_json'], true, 64, JSON_THROW_ON_ERROR) as $item) {
            $card = $this->publicCatalogCard((int)$item['card_id']);
            $card['order'] = (int)$item['drawn_order'];
            $card['drawn_at'] = $item['drawn_at'];
            $drawn[] = $card;
        }
        $winnersStatement = $this->db->prepare(
            'SELECT `player_name`, `place`, `prize_amount`, `created_at` '
            . 'FROM `loteria_winner_history` WHERE `history_id` = :history_id ORDER BY `place`'
        );
        $winnersStatement->execute([':history_id' => (int)$history['id']]);
        $winners = $winnersStatement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($winners as &$winner) {
            $winner['place'] = (int)$winner['place'];
            $winner['prize_amount'] = (int)$winner['prize_amount'];
            $winner['paid_at'] = $history['ended_at'];
        }
        unset($winner);

        $room = [
            'id' => $roomId, 'creator_account_id' => (int)$history['creator_account_id'],
            'creator_name' => $history['creator_name'], 'name' => $history['room_name'],
            'card_price' => (int)$history['card_price'], 'speed_seconds' => (int)$history['speed_seconds'],
            'max_players' => (int)$history['max_players'], 'player_count' => (int)$history['player_count'],
            'my_cards' => 0, 'victory_mode' => $history['victory_mode'], 'status' => 'finished',
            'prize_pool' => (int)$history['prize_pool'], 'created_at' => $history['started_at'],
            'started_at' => $history['started_at'], 'ended_at' => $history['ended_at'],
            'rules' => $rules, 'draw_count' => count($drawn), 'next_draw_at' => null,
            'can_start' => false, 'is_creator' => (int)$history['creator_account_id'] === $accountId,
            'victory_mode_label' => $this->config['victory_modes'][$history['victory_mode']] ?? $history['victory_mode'],
        ];
        return [
            'room' => $room, 'balance' => $this->accountBalance($accountId), 'players' => $players,
            'offers' => [], 'my_cards' => [], 'drawn' => $drawn,
            'current' => $drawn ? $drawn[count($drawn) - 1] : null,
            'winners' => $winners, 'archived' => true,
        ];
    }

    private function isWinningCard(array $cardData, array $markedIds, string $mode): bool
    {
        $patterns = [];
        if ($mode === 'traditional') {
            for ($row = 0; $row < 4; $row++) {
                $patterns[] = [$row * 4, $row * 4 + 1, $row * 4 + 2, $row * 4 + 3];
            }
            for ($column = 0; $column < 4; $column++) {
                $patterns[] = [$column, $column + 4, $column + 8, $column + 12];
            }
            $patterns[] = [0, 5, 10, 15];
            $patterns[] = [3, 6, 9, 12];

            // Tradicional tambien acepta cualquiera de los nueve cuadros 2x2.
            for ($row = 0; $row < 3; $row++) {
                for ($column = 0; $column < 3; $column++) {
                    $topLeft = $row * 4 + $column;
                    $patterns[] = [$topLeft, $topLeft + 1, $topLeft + 4, $topLeft + 5];
                }
            }
        } elseif ($mode === 'square') {
            for ($row = 0; $row < 3; $row++) {
                for ($column = 0; $column < 3; $column++) {
                    $topLeft = $row * 4 + $column;
                    $patterns[] = [$topLeft, $topLeft + 1, $topLeft + 4, $topLeft + 5];
                }
            }
        } elseif ($mode === 'four_corners') {
            $patterns[] = [0, 3, 12, 15];
        } elseif ($mode === 'full_card') {
            $patterns[] = range(0, 15);
        } else {
            throw new RuntimeException('Modo de victoria desconocido.');
        }

        $markedLookup = array_fill_keys(array_map('intval', $markedIds), true);
        foreach ($patterns as $pattern) {
            $complete = true;
            foreach ($pattern as $position) {
                if (!isset($cardData[$position]) || !isset($markedLookup[(int)$cardData[$position]])) {
                    $complete = false;
                    break;
                }
            }
            if ($complete) {
                return true;
            }
        }
        return false;
    }

    private function normalizeRoomSummary(array $room): array
    {
        return [
            'id' => (int)$room['id'],
            'creator_account_id' => (int)$room['creator_account_id'],
            'creator_name' => (string)$room['creator_name'],
            'name' => (string)$room['name'],
            'card_price' => (int)$room['card_price'],
            'speed_seconds' => (int)$room['speed_seconds'],
            'max_players' => (int)$room['max_players'],
            'victory_mode' => (string)$room['victory_mode'],
            'victory_mode_label' => $this->config['victory_modes'][$room['victory_mode']] ?? $room['victory_mode'],
            'player_count' => (int)($room['player_count'] ?? 0),
            'my_cards' => (int)($room['my_cards'] ?? 0),
            'status' => (string)$room['status'],
            'prize_pool' => (int)$room['prize_pool'],
            'created_at' => $room['created_at'],
            'started_at' => $room['started_at'],
            'ended_at' => $room['ended_at'],
        ];
    }

    private function publicCatalogCard(int $id): array
    {
        if (!isset($this->catalog[$id])) {
            throw new RuntimeException('Baraja desconocida: ' . $id);
        }
        $card = $this->catalog[$id];
        return [
            'id' => $id,
            'name' => $card['name'],
            'image' => $this->assetUrl($this->config['assets']['image_base_url'], $card['image_file']),
            'audio' => $this->assetUrl($this->config['assets']['audio_base_url'], $card['audio_file']),
        ];
    }

    private function expandCard(array $ids): array
    {
        return array_map(function (int $id): array {
            return $this->publicCatalogCard($id);
        }, $ids);
    }

    private function assetUrl(string $base, string $file): string
    {
        $siteBase = defined('BASE_DIR') ? rtrim(BASE_DIR, '/') : '';
        return $siteBase . '/' . trim($base, '/') . '/' . rawurlencode($file);
    }

    private function assertValidGameCard(array $ids): void
    {
        if (count($ids) !== (int)$this->config['cards']['cells'] || count(array_unique($ids)) !== count($ids)) {
            throw new RuntimeException('La carta guardada no contiene 16 barajas unicas.');
        }
        foreach ($ids as $id) {
            if (!isset($this->catalog[$id])) {
                throw new RuntimeException('La carta guardada contiene un ID desconocido.');
            }
        }
    }

    private function secureShuffle(array $items): array
    {
        for ($i = count($items) - 1; $i > 0; $i--) {
            $j = random_int(0, $i);
            [$items[$i], $items[$j]] = [$items[$j], $items[$i]];
        }
        return array_values(array_map('intval', $items));
    }

    private function decodeIdArray(?string $json): array
    {
        if ($json === null || $json === '') {
            return [];
        }
        $value = json_decode($json, true, 64, JSON_THROW_ON_ERROR);
        if (!is_array($value)) {
            throw new RuntimeException('JSON de carta invalido.');
        }
        return array_values(array_map('intval', $value));
    }

    private function decodeObject(string $json): array
    {
        $value = json_decode($json, true, 64, JSON_THROW_ON_ERROR);
        if (!is_array($value)) {
            throw new RuntimeException('JSON de reglas invalido.');
        }
        return $value;
    }

    private function encodeJson(array $value): string
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    }

    private function validateConfiguration(): void
    {
        if (count($this->catalog) !== 54 || array_keys($this->catalog) !== range(1, 54)) {
            throw new RuntimeException('El catalogo debe contener exactamente las barajas 1 a 54.');
        }
        if (array_sum($this->config['prizes']) !== 100 || count($this->config['prizes']) !== 3) {
            throw new RuntimeException('Los tres porcentajes de premio deben sumar 100.');
        }
        if ((int)$this->config['cards']['cells'] !== 16) {
            throw new RuntimeException('Esta version requiere cartas de 16 casillas.');
        }
        $requiredModes = ['traditional', 'square', 'four_corners', 'full_card'];
        if (array_keys($this->config['victory_modes']) !== $requiredModes
            || !isset($this->config['victory_modes'][$this->config['win_condition']])) {
            throw new RuntimeException('La configuracion de modos de victoria no es valida.');
        }
    }

    private function cleanDisplayName(string $name, int $accountId): string
    {
        $name = trim(strip_tags($name));
        return $name === '' ? 'Cuenta #' . $accountId : substr($name, 0, 80);
    }

    private function textLength(string $text): int
    {
        return function_exists('mb_strlen') ? mb_strlen($text, 'UTF-8') : strlen($text);
    }

    private function rollbackIfNeeded(): void
    {
        if ($this->db->inTransaction()) {
            $this->db->rollBack();
        }
    }
}

<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Fishing System';

$fishingMonsters = [
    ['skill' => 10, 'name' => 'Rootthing Bug Tracker', 'look' => 1763],
    ['skill' => 10, 'name' => 'Rootthing Nutshell', 'look' => 1760],
    ['skill' => 10, 'name' => 'Rootthing Amber Shaper', 'look' => 1762],
    ['skill' => 10, 'name' => 'Quara Raider', 'look' => 1759],
    ['skill' => 10, 'name' => 'Quara Looter', 'look' => 1794],
    ['skill' => 10, 'name' => 'Quara Plunderer', 'look' => 1758],
    ['skill' => 50, 'name' => 'Angler Fish', 'look' => 1294],
    ['skill' => 50, 'name' => 'The Deep', 'look' => 275],
    ['skill' => 50, 'name' => 'Mega Charizard X', 'look' => 2331],
    ['skill' => 50, 'name' => 'Infernal Toxicroak', 'look' => 1750],
    ['skill' => 110, 'name' => 'Tentacruel', 'look' => 2439],
    ['skill' => 110, 'name' => 'Golduck', 'look' => 2441],
    ['skill' => 110, 'name' => 'Bloody Tentacruel', 'look' => 2440],
    ['skill' => 110, 'name' => 'Dark Kingdra', 'look' => 1739],
];
?>

<link rel="stylesheet" href="/tools/fishing-page.css?v=20260606">

<div class="fishing-page" id="fishing-top">
    <section class="fishing-hero">
        <div class="fishing-hero__copy">
            <span class="fishing-eyebrow">Mob Fishing Rod</span>
            <h1>Fishing System</h1>
            <p>
                Aqu&iacute; no pescas peces: invocas criaturas desde el agua. Tu Fishing Skill
                define el pool disponible y los consumibles controlan la cantidad de spawns y
                su posibilidad de aparecer Influenced.
            </p>
            <div class="fishing-hero__tags">
                <span>Reset 20+</span>
                <span>Agua de VIP City</span>
                <span>Hasta 4 spawns</span>
            </div>
        </div>

        <div class="fishing-hero__scene" aria-hidden="true">
            <div class="fishing-moon"></div>
            <div class="fishing-rod-art"><i></i><span></span></div>
            <div class="fishing-float"><span></span></div>
            <div class="fishing-water-line fishing-water-line--one"></div>
            <div class="fishing-water-line fishing-water-line--two"></div>
            <div class="fishing-water-line fishing-water-line--three"></div>
        </div>
    </section>

    <div class="fishing-summary">
        <article><span>20</span><div><strong>Reset m&iacute;nimo</strong><small>Sin Reset 20, el uso se cancela.</small></div></article>
        <article><span>110</span><div><strong>Pool completo</strong><small>Desbloquea las 14 criaturas.</small></div></article>
        <article><span>4</span><div><strong>Spawns por uso</strong><small>M&aacute;ximo con consumible.</small></div></article>
        <article><span>8</span><div><strong>Casillas cercanas</strong><small>Incluye las cuatro diagonales.</small></div></article>
    </div>

    <nav class="fishing-nav" aria-label="Secciones de Fishing System">
        <button type="button" class="is-active" data-fishing-link="requirements">Requisitos</button>
        <button type="button" data-fishing-link="pool">Pool</button>
        <button type="button" data-fishing-link="boosts">Consumibles</button>
        <button type="button" data-fishing-link="influenced">Influenced</button>
        <button type="button" data-fishing-link="spawn-area">Zona de spawn</button>
        <button type="button" data-fishing-link="guide">Gu&iacute;a</button>
    </nav>

    <section class="fishing-section" id="requirements" data-fishing-section>
        <div class="fishing-heading">
            <span class="fishing-heading__number">01</span>
            <div>
                <span class="fishing-kicker">Prepara tu expedici&oacute;n</span>
                <h2>Requisitos y activaci&oacute;n</h2>
                <p>Comprueba las condiciones obligatorias antes de usar la rod.</p>
            </div>
        </div>

        <div class="fishing-requirement-layout">
            <div class="fishing-checklist">
                <label>
                    <input type="checkbox" data-fishing-check>
                    <span class="fishing-checkmark"></span>
                    <div><strong>Reset 20 o superior</strong><small>De lo contrario, la pesca se cancela.</small></div>
                </label>
                <label>
                    <input type="checkbox" data-fishing-check>
                    <span class="fishing-checkmark"></span>
                    <div><strong>Agua de VIP City</strong><small>Solo funciona sobre tiles de agua permitidos.</small></div>
                </label>
                <label>
                    <input type="checkbox" data-fishing-check>
                    <span class="fishing-checkmark"></span>
                    <div><strong>Mechanical Fishing Rod</strong><small>Es la herramienta que activa el sistema.</small></div>
                </label>
            </div>

            <div class="fishing-tool-card">
                <div class="fishing-tool-card__visual">
                    <span class="fishing-tool-card__rod"></span>
                    <img src="https://mortera-world.com/images/items/9306.gif" alt="Mechanical Fishing Rod" loading="lazy">
                </div>
                <span class="fishing-kicker">Herramienta requerida</span>
                <h3>Mechanical Fishing Rod</h3>
                <p>Al completar un uso correcto aparece un efecto visual sobre el agua.</p>
                <div class="fishing-readiness" data-fishing-readiness>
                    <i><span data-fishing-readiness-bar></span></i>
                    <strong data-fishing-readiness-text>0 de 3 requisitos</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="fishing-section" id="pool" data-fishing-section>
        <div class="fishing-heading">
            <span class="fishing-heading__number">02</span>
            <div>
                <span class="fishing-kicker">Progresi&oacute;n acumulativa</span>
                <h2>Explorador del pool</h2>
                <p>Sube el Fishing Skill para ver qu&eacute; criaturas pueden aparecer.</p>
            </div>
        </div>

        <div class="fishing-pool-control">
            <div>
                <label for="fishing-skill-range">Fishing Skill</label>
                <strong data-fishing-skill-output>10</strong>
            </div>
            <input id="fishing-skill-range" type="range" min="0" max="130" value="10" data-fishing-skill>
            <div class="fishing-pool-marks"><span>0</span><span>10</span><span>50</span><span>110</span><span>130</span></div>
        </div>

        <div class="fishing-pool-status">
            <div><small>Tier actual</small><strong data-pool-tier>Pool inicial</strong></div>
            <div><small>Criaturas disponibles</small><strong data-pool-count>6</strong></div>
            <div><small>Chance por criatura</small><strong data-pool-chance>16.67%</strong></div>
            <div><small>Siguiente desbloqueo</small><strong data-pool-next>Skill 50</strong></div>
        </div>

        <div class="fishing-tier-tabs">
            <button type="button" data-set-skill="10" class="is-active"><span>10+</span>Inicial</button>
            <button type="button" data-set-skill="50"><span>50+</span>Avanzado</button>
            <button type="button" data-set-skill="110"><span>110+</span>Top</button>
        </div>

        <div class="fishing-monster-grid">
            <?php foreach ($fishingMonsters as $monster): ?>
                <article data-monster-skill="<?= $monster['skill']; ?>">
                    <div class="fishing-monster-image">
                        <span><?= substr($monster['name'], 0, 1); ?></span>
                        <img
                            src="https://mortera-world.com/images/animated-outfits/animoutfit.php?id=<?= $monster['look']; ?>&amp;addons=0&amp;head=0&amp;body=0&amp;legs=0&amp;feet=0"
                            alt="<?= escapeHtml($monster['name']); ?>"
                            loading="lazy">
                    </div>
                    <div>
                        <span class="fishing-monster-tier">Skill <?= $monster['skill']; ?>+</span>
                        <h3><?= escapeHtml($monster['name']); ?></h3>
                        <small data-monster-chance>16.67% dentro del pool</small>
                    </div>
                    <span class="fishing-monster-lock" aria-hidden="true">Locked</span>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="fishing-note">
            Los tiers se acumulan: Skill 50 conserva las criaturas de Skill 10 y Skill 110
            conserva todos los pools anteriores. Cada spawn elige una criatura al azar del pool total.
        </div>
    </section>

    <section class="fishing-section" id="boosts" data-fishing-section>
        <div class="fishing-heading">
            <span class="fishing-heading__number">03</span>
            <div>
                <span class="fishing-kicker">Configura cada uso</span>
                <h2>Consumibles y cantidad de spawns</h2>
                <p>Activa los items que llevas y observa cu&aacute;l consumir&aacute; realmente el sistema.</p>
            </div>
        </div>

        <div class="fishing-loadout">
            <div class="fishing-loadout__items">
                <label class="fishing-consumable">
                    <input type="checkbox" data-tiny-bass>
                    <span class="fishing-consumable__check"></span>
                    <div class="fishing-consumable__image">
                        <span>2x</span>
                        <img src="https://mortera-world.com/images/items/61738.gif" alt="Tiny Special Bass" loading="lazy">
                    </div>
                    <div><strong>Tiny Special Bass</strong><small>Se consume primero y genera 2 spawns.</small></div>
                </label>

                <label class="fishing-consumable">
                    <input type="checkbox" data-small-bass>
                    <span class="fishing-consumable__check"></span>
                    <div class="fishing-consumable__image">
                        <span>4x</span>
                        <img src="https://mortera-world.com/images/items/61737.gif" alt="Small Special Bass" loading="lazy">
                    </div>
                    <div><strong>Small Special Bass</strong><small>Genera 4 spawns solo si no hay Tiny Bass.</small></div>
                </label>

                <label class="fishing-consumable">
                    <input type="checkbox" data-special-bass>
                    <span class="fishing-consumable__check"></span>
                    <div class="fishing-consumable__image fishing-consumable__image--influenced">
                        <span>INF</span>
                        <img src="https://mortera-world.com/images/items/61736.gif" alt="Special Bass" loading="lazy">
                    </div>
                    <div><strong>Special Bass</strong><small>Todos los spawns forgeable intentan salir Influenced.</small></div>
                </label>
            </div>

            <div class="fishing-loadout__result">
                <span class="fishing-loadout__label">Resultado del uso</span>
                <div class="fishing-spawn-number"><strong data-spawn-count>1</strong><small>spawn</small></div>
                <h3 data-consumed-item>Sin consumible de cantidad</h3>
                <p data-loadout-message>La rod intentar&aacute; crear un monstruo.</p>
                <div class="fishing-influenced-result">
                    <span>Influenced</span>
                    <strong data-influenced-chance>2.00%</strong>
                    <small data-influenced-mode>Probabilidad por spawn</small>
                </div>
            </div>
        </div>

        <div class="fishing-priority-warning">
            <strong>Prioridad importante</strong>
            <p>
                Si llevas Tiny y Small al mismo tiempo, el sistema consume primero
                <b>Tiny Special Bass</b> y genera 2 spawns. Small solo se usa cuando no hay Tiny.
            </p>
        </div>
    </section>

    <section class="fishing-section" id="influenced" data-fishing-section>
        <div class="fishing-heading">
            <span class="fishing-heading__number">04</span>
            <div>
                <span class="fishing-kicker">Poder de la Forja</span>
                <h2>Spawns Influenced</h2>
                <p>Entiende cu&aacute;ndo aparecen y qu&eacute; limitaciones tienen.</p>
            </div>
        </div>

        <div class="fishing-influenced-layout">
            <article class="fishing-influenced-card fishing-influenced-card--random">
                <span class="fishing-influenced-card__rate">2%</span>
                <div class="fishing-influenced-icon"><i></i></div>
                <span class="fishing-kicker">Sin Special Bass</span>
                <h3>Influenced aleatorio</h3>
                <p>Cada spawn tiene 2% de probabilidad independiente de convertirse en Influenced.</p>
            </article>
            <article class="fishing-influenced-card fishing-influenced-card--guaranteed">
                <span class="fishing-influenced-card__rate">100%</span>
                <div class="fishing-influenced-icon"><i></i></div>
                <span class="fishing-kicker">Con Special Bass</span>
                <h3>Influenced garantizado</h3>
                <p>Todos los spawns de ese uso intentan recibir un nivel Influenced aleatorio.</p>
            </article>
            <div class="fishing-influenced-info">
                <div>
                    <small>Nivel asignado</small>
                    <strong>1 - 5</strong>
                    <span>Elegido aleatoriamente al activarse.</span>
                </div>
                <div>
                    <small>Restricci&oacute;n</small>
                    <strong>Forgeable</strong>
                    <span>Si el monstruo no permite forge, no recibe Influenced.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="fishing-section" id="spawn-area" data-fishing-section>
        <div class="fishing-heading">
            <span class="fishing-heading__number">05</span>
            <div>
                <span class="fishing-kicker">Haz espacio antes de lanzar</span>
                <h2>Simulador de zona de spawn</h2>
                <p>Bloquea casillas para comprobar cu&aacute;ntos monstruos caben a tu alrededor.</p>
            </div>
        </div>

        <div class="fishing-area-layout">
            <div class="fishing-tile-map" data-tile-map>
                <button type="button" data-tile="0" aria-label="Casilla noroeste"><span></span></button>
                <button type="button" data-tile="1" aria-label="Casilla norte"><span></span></button>
                <button type="button" data-tile="2" aria-label="Casilla noreste"><span></span></button>
                <button type="button" data-tile="3" aria-label="Casilla oeste"><span></span></button>
                <div class="fishing-player-tile"><span></span><strong>T&uacute;</strong></div>
                <button type="button" data-tile="4" aria-label="Casilla este"><span></span></button>
                <button type="button" data-tile="5" aria-label="Casilla suroeste"><span></span></button>
                <button type="button" data-tile="6" aria-label="Casilla sur"><span></span></button>
                <button type="button" data-tile="7" aria-label="Casilla sureste"><span></span></button>
            </div>

            <div class="fishing-area-panel">
                <span class="fishing-kicker">Haz clic para bloquear o liberar tiles</span>
                <h3>Espacio disponible</h3>
                <div class="fishing-area-stats">
                    <div><small>Casillas libres</small><strong data-free-tiles>8 / 8</strong></div>
                    <div><small>Spawns solicitados</small><strong data-requested-spawns>1</strong></div>
                    <div><small>Spawns posibles</small><strong data-possible-spawns>1</strong></div>
                </div>
                <p data-area-message>Hay espacio suficiente para todos los spawns.</p>
                <button type="button" data-reset-tiles>Limpiar obst&aacute;culos</button>
            </div>
        </div>

        <div class="fishing-area-rules">
            <article><strong>Radio de 1 tile</strong><p>Norte, sur, este, oeste y las cuatro diagonales.</p></article>
            <article><strong>Tile walkable</strong><p>La casilla debe permitir caminar y no tener una criatura encima.</p></article>
            <article><strong>Sin reintento lejano</strong><p>Si ya no hay espacio, ese spawn se pierde.</p></article>
        </div>
    </section>

    <section class="fishing-section" id="guide" data-fishing-section>
        <div class="fishing-heading">
            <span class="fishing-heading__number">06</span>
            <div>
                <span class="fishing-kicker">Todo en orden</span>
                <h2>Gu&iacute;a r&aacute;pida</h2>
                <p>Seis pasos para aprovechar cada uso de la rod.</p>
            </div>
        </div>

        <div class="fishing-guide">
            <article><span>1</span><div><strong>Alcanza Reset 20+</strong><p>Es el requisito obligatorio para activar el sistema.</p></div></article>
            <article><span>2</span><div><strong>Ve al agua de VIP City</strong><p>Busca uno de los tiles permitidos para usar la rod.</p></div></article>
            <article><span>3</span><div><strong>Mejora Fishing Skill</strong><p>Los pools se desbloquean en 10, 50 y 110.</p></div></article>
            <article><span>4</span><div><strong>Prepara tus bass</strong><p>Tiny genera 2 spawns; Small genera 4 cuando no hay Tiny.</p></div></article>
            <article><span>5</span><div><strong>Decide sobre Influenced</strong><p>Special Bass garantiza el intento Influenced en mobs forgeable.</p></div></article>
            <article><span>6</span><div><strong>Busca un &aacute;rea abierta</strong><p>Usa la Mechanical Fishing Rod y elimina lo que aparezca.</p></div></article>
        </div>

        <div class="fishing-final-tip">
            <div class="fishing-final-tip__waves"><span></span><span></span><span></span></div>
            <div>
                <strong>Consejo para 4 spawns</strong>
                <p>Al&eacute;jate de obst&aacute;culos y criaturas. Una casilla ocupada puede hacerte perder parte del boost.</p>
            </div>
            <button type="button" data-fishing-link="spawn-area">Probar zona</button>
        </div>
    </section>
</div>

<script>
(function () {
    var page = document.querySelector('.fishing-page');
    if (!page) {
        return;
    }

    var links = page.querySelectorAll('[data-fishing-link]');
    var sections = page.querySelectorAll('[data-fishing-section]');
    links.forEach(function (button) {
        button.addEventListener('click', function () {
            var target = document.getElementById(button.getAttribute('data-fishing-link'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }
                links.forEach(function (button) {
                    button.classList.toggle(
                        'is-active',
                        button.getAttribute('data-fishing-link') === entry.target.id
                    );
                });
            });
        }, { rootMargin: '-20% 0px -65%', threshold: 0 });
        sections.forEach(function (section) { observer.observe(section); });
    }

    var requirementChecks = page.querySelectorAll('[data-fishing-check]');
    function updateReadiness() {
        var checked = Array.prototype.filter.call(requirementChecks, function (item) {
            return item.checked;
        }).length;
        page.querySelector('[data-fishing-readiness-bar]').style.width =
            ((checked / requirementChecks.length) * 100) + '%';
        page.querySelector('[data-fishing-readiness-text]').textContent =
            checked === requirementChecks.length
                ? 'Listo para pescar'
                : checked + ' de ' + requirementChecks.length + ' requisitos';
        page.querySelector('[data-fishing-readiness]').classList.toggle(
            'is-ready',
            checked === requirementChecks.length
        );
    }
    requirementChecks.forEach(function (item) {
        item.addEventListener('change', updateReadiness);
    });

    var skillRange = page.querySelector('[data-fishing-skill]');
    var monsters = page.querySelectorAll('[data-monster-skill]');
    var tierButtons = page.querySelectorAll('[data-set-skill]');

    function updatePool() {
        var skill = parseInt(skillRange.value, 10);
        var unlocked = 0;
        var tier = 'Sin pool';
        var next = 'Skill 10';

        if (skill >= 110) {
            tier = 'Pool top';
            next = 'Pool completo';
        } else if (skill >= 50) {
            tier = 'Pool avanzado';
            next = 'Skill 110';
        } else if (skill >= 10) {
            tier = 'Pool inicial';
            next = 'Skill 50';
        }

        monsters.forEach(function (monster) {
            var isUnlocked = skill >= parseInt(monster.getAttribute('data-monster-skill'), 10);
            monster.classList.toggle('is-locked', !isUnlocked);
            if (isUnlocked) {
                unlocked += 1;
            }
        });

        var chance = unlocked ? (100 / unlocked).toFixed(2) + '%' : '0%';
        monsters.forEach(function (monster) {
            monster.querySelector('[data-monster-chance]').textContent =
                monster.classList.contains('is-locked')
                    ? 'A\u00fan no disponible'
                    : chance + ' dentro del pool';
        });

        page.querySelector('[data-fishing-skill-output]').textContent = skill;
        page.querySelector('[data-pool-tier]').textContent = tier;
        page.querySelector('[data-pool-count]').textContent = unlocked;
        page.querySelector('[data-pool-chance]').textContent = chance;
        page.querySelector('[data-pool-next]').textContent = next;

        tierButtons.forEach(function (button) {
            var required = parseInt(button.getAttribute('data-set-skill'), 10);
            var active = required === 110 ? skill >= 110 :
                required === 50 ? skill >= 50 && skill < 110 :
                skill >= 10 && skill < 50;
            button.classList.toggle('is-active', active);
        });
    }

    skillRange.addEventListener('input', updatePool);
    tierButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            skillRange.value = button.getAttribute('data-set-skill');
            updatePool();
        });
    });

    var tinyBass = page.querySelector('[data-tiny-bass]');
    var smallBass = page.querySelector('[data-small-bass]');
    var specialBass = page.querySelector('[data-special-bass]');
    var spawnCount = 1;
    var blockedTiles = new Set();

    function updateLoadout() {
        var consumed = 'Sin consumible de cantidad';
        var message = 'La rod intentar\u00e1 crear un monstruo.';

        if (tinyBass.checked) {
            spawnCount = 2;
            consumed = 'Consume Tiny Special Bass';
            message = smallBass.checked
                ? 'Tiny tiene prioridad: Small permanece en tu inventario.'
                : 'La rod intentar\u00e1 crear dos monstruos.';
        } else if (smallBass.checked) {
            spawnCount = 4;
            consumed = 'Consume Small Special Bass';
            message = 'La rod intentar\u00e1 crear cuatro monstruos.';
        } else {
            spawnCount = 1;
        }

        var influencedProbability = specialBass.checked
            ? 100
            : (1 - Math.pow(0.98, spawnCount)) * 100;

        page.querySelector('[data-spawn-count]').textContent = spawnCount;
        page.querySelector('[data-consumed-item]').textContent = consumed;
        page.querySelector('[data-loadout-message]').textContent = message;
        page.querySelector('[data-influenced-chance]').textContent =
            specialBass.checked ? '100%' : influencedProbability.toFixed(2) + '%';
        page.querySelector('[data-influenced-mode]').textContent = specialBass.checked
            ? 'Special Bass activo'
            : 'Chance de al menos un Influenced';
        updateTileMap();
    }

    tinyBass.addEventListener('change', updateLoadout);
    smallBass.addEventListener('change', updateLoadout);
    specialBass.addEventListener('change', updateLoadout);

    var tileButtons = page.querySelectorAll('[data-tile]');
    function updateTileMap() {
        var free = 8 - blockedTiles.size;
        var possible = Math.min(spawnCount, free);
        tileButtons.forEach(function (button) {
            var index = parseInt(button.getAttribute('data-tile'), 10);
            button.classList.toggle('is-blocked', blockedTiles.has(index));
        });
        page.querySelector('[data-free-tiles]').textContent = free + ' / 8';
        page.querySelector('[data-requested-spawns]').textContent = spawnCount;
        page.querySelector('[data-possible-spawns]').textContent = possible;
        page.querySelector('[data-area-message]').textContent =
            possible === spawnCount
                ? 'Hay espacio suficiente para todos los spawns.'
                : 'Se perder\u00e1n ' + (spawnCount - possible) + ' spawn(s) por falta de espacio.';
        page.querySelector('.fishing-area-panel').classList.toggle(
            'has-loss',
            possible < spawnCount
        );
    }

    tileButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var index = parseInt(button.getAttribute('data-tile'), 10);
            if (blockedTiles.has(index)) {
                blockedTiles.delete(index);
            } else {
                blockedTiles.add(index);
            }
            updateTileMap();
        });
    });
    page.querySelector('[data-reset-tiles]').addEventListener('click', function () {
        blockedTiles.clear();
        updateTileMap();
    });

    updateReadiness();
    updatePool();
    updateLoadout();
}());
</script>

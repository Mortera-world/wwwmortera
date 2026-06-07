<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Armas Ethereals';

$vocations = [
    'knight' => [
        'label' => 'Knight',
        'role' => 'Fuerza cuerpo a cuerpo',
        'mark' => 'K',
        'description' => 'Tres caminos de combate: sword, axe y club.',
    ],
    'paladin' => [
        'label' => 'Paladin',
        'role' => 'Precision a distancia',
        'mark' => 'P',
        'description' => 'Bow y crossbow con perfect shot y alcance superior.',
    ],
    'druid' => [
        'label' => 'Druid',
        'role' => 'Naturaleza y curacion',
        'mark' => 'D',
        'description' => 'Una rod elemental con ataques en cadena.',
    ],
    'sorcerer' => [
        'label' => 'Sorcerer',
        'role' => 'Poder arcano',
        'mark' => 'S',
        'description' => 'Una wand capaz de alternar entre cuatro elementos.',
    ],
];

$weapons = [
    'knight' => [
        [
            'id' => 49372,
            'name' => "Ethereal's Scourge",
            'type' => 'Sword',
            'baseId' => 60062,
            'baseName' => 'Ultimatum Knight Blade',
            'accent' => 'violet',
            'lead' => 'La espada defensiva del arsenal Ethereal.',
            'highlights' => [['ATK', '400'], ['DEF', '160 +30'], ['Sword', '+72']],
            'stats' => [
                'Critical hit chance 10%',
                'Critical extra damage +180%',
                'Life leech +20%',
                'Mana leech +20%',
                'Proteccion elemental +14%',
                'Physical magic level +40',
                'Cleave 100%',
                '3 imbuement slots',
            ],
        ],
        [
            'id' => 49368,
            'name' => "Ethereal's Decimator",
            'type' => 'Axe',
            'baseId' => 60064,
            'baseName' => 'Ultimatum Knight Chopper',
            'accent' => 'azure',
            'lead' => 'Ataque brutal con una defensa sorprendentemente alta.',
            'highlights' => [['ATK', '420'], ['DEF', '140'], ['Axe', '+60']],
            'stats' => [
                'Critical hit chance 10%',
                'Critical extra damage +180%',
                'Life leech +20%',
                'Mana leech +20%',
                'Proteccion elemental +14%',
                'Physical magic level +20',
                'Cleave 100%',
                '3 imbuement slots',
            ],
        ],
        [
            'id' => 49370,
            'name' => "Ethereal's Crusher",
            'type' => 'Club',
            'baseId' => 60066,
            'baseName' => 'Ultimatum Knight Mace',
            'accent' => 'amber',
            'lead' => 'La opcion de mayor ataque base para Knight.',
            'highlights' => [['ATK', '440'], ['DEF', '40'], ['Club', '+52']],
            'stats' => [
                'Critical hit chance 10%',
                'Critical extra damage +180%',
                'Life leech +20%',
                'Mana leech +20%',
                'Proteccion elemental +14%',
                'Physical magic level +40',
                'Cleave 100%',
                '3 imbuement slots',
            ],
        ],
    ],
    'paladin' => [
        [
            'id' => 49371,
            'name' => "Ethereal's Rupture",
            'type' => 'Crossbow',
            'baseId' => 60069,
            'baseName' => 'Ultimatum Paladin Crossbow',
            'accent' => 'rose',
            'lead' => 'Un crossbow centrado en impacto y perfect shot.',
            'highlights' => [['ATK', '178'], ['Distance', '+118'], ['Perfect', '+400']],
            'stats' => [
                'Range 7 y hit chance +70%',
                'Critical hit chance 10%',
                'Critical extra damage +400%',
                'Life leech +28%',
                'Mana leech +28%',
                'Holy magic level +58',
                'Healing magic level +58',
                'Perfect shot a rango 4',
                'Proteccion elemental +14%',
                '3 imbuement slots',
            ],
        ],
        [
            'id' => 49369,
            'name' => "Ethereal's Whisper",
            'type' => 'Bow',
            'baseId' => 60077,
            'baseName' => 'Ultimatum Paladin Bow',
            'accent' => 'emerald',
            'lead' => 'Precision extrema y el mayor bonus de distance.',
            'highlights' => [['ATK', '128'], ['Distance', '+148'], ['Perfect', '+300']],
            'stats' => [
                'Range 7 y hit chance +70%',
                'Critical hit chance 10%',
                'Critical extra damage +340%',
                'Life leech +28%',
                'Mana leech +28%',
                'Holy magic level +58',
                'Healing magic level +58',
                'Perfect shot a rango 4',
                'Proteccion elemental +14%',
                '3 imbuement slots',
            ],
        ],
    ],
    'druid' => [
        [
            'id' => 49373,
            'name' => "Ethereal's Savior",
            'type' => 'Elemental Rod',
            'baseId' => 60086,
            'baseName' => 'Ultimatum Druid Rod',
            'accent' => 'emerald',
            'lead' => 'Rod adaptable con cuatro elementos y cadena de 6 objetivos.',
            'highlights' => [['Magic', '+48'], ['Chain', '6'], ['Range', '7']],
            'stats' => [
                'Ice, Earth, Death o Agony',
                'Magic level +48',
                'Ice magic level +48',
                'Earth magic level +48',
                'Healing magic level +48',
                'Critical hit chance 10%',
                'Critical extra damage +104%',
                'Life leech +28%',
                'Mana leech +28%',
                'Proteccion elemental +14%',
                '2 imbuement slots',
            ],
            'elementCommand' => '!etherealrod',
            'elements' => ['Ice', 'Earth', 'Death', 'Agony'],
        ],
    ],
    'sorcerer' => [
        [
            'id' => 49374,
            'name' => "Ethereal's Sceptre",
            'type' => 'Elemental Wand',
            'baseId' => 60095,
            'baseName' => 'Ultimatum Sorcerer Wand',
            'accent' => 'violet',
            'lead' => 'Wand adaptable con cuatro elementos y cadena de 12 objetivos.',
            'highlights' => [['Magic', '+48'], ['Chain', '12'], ['Range', '7']],
            'stats' => [
                'Fire, Energy, Death o Agony',
                'Magic level +48',
                'Fire magic level +48',
                'Energy magic level +48',
                'Death magic level +48',
                'Critical hit chance 10%',
                'Critical extra damage +100%',
                'Life leech +28%',
                'Mana leech +28%',
                'Proteccion elemental +14%',
                '3 imbuement slots',
            ],
            'elementCommand' => '!etherealwand',
            'elements' => ['Fire', 'Energy', 'Death', 'Agony'],
        ],
    ],
];

$allWeapons = [];
foreach ($weapons as $vocationKey => $vocationWeapons) {
    foreach ($vocationWeapons as $weapon) {
        $weapon['vocation'] = $vocationKey;
        $weapon['vocationLabel'] = $vocations[$vocationKey]['label'];
        $allWeapons[$weapon['id']] = $weapon;
    }
}

$itemImage = static function (int $id, string $name, string $fallback = 'E'): void {
    ?>
    <span class="eth-item-image">
        <b aria-hidden="true"><?= htmlspecialchars($fallback) ?></b>
        <img loading="lazy"
             src="https://mortera-world.com/images/items/<?= $id ?>.gif"
             alt="<?= htmlspecialchars($name) ?>"
             onerror="this.style.display='none'">
    </span>
    <?php
};
?>

<link rel="stylesheet" href="/tools/ethereals-page.css?v=20260607">

<div class="eth-page" data-eth-page>
    <section class="eth-hero">
        <div class="eth-hero__aurora" aria-hidden="true"></div>
        <div class="eth-hero__copy">
            <span class="eth-eyebrow"><i></i> Nuevo nivel maximo de armamento</span>
            <h1>Armas<br><em>Ethereals</em></h1>
            <p>
                El poder que existe por encima de Ultimatum. Descubre las siete armas,
                compara sus atributos y prepara cada material de evolucion.
            </p>
            <div class="eth-hero__actions">
                <button type="button" data-scroll-weapons>Explorar arsenal <span>&darr;</span></button>
                <button type="button" class="is-quiet" data-copy-command="!ultimatumplus craft">
                    <small>Comando de craft</small>
                    <strong>!ultimatumplus craft</strong>
                </button>
            </div>
        </div>

        <div class="eth-hero__relics" aria-label="Vista previa de armas Ethereals">
            <?php foreach ([49372, 49374, 49371] as $index => $weaponId): ?>
                <?php $weapon = $allWeapons[$weaponId]; ?>
                <button type="button"
                        class="eth-hero-relic eth-hero-relic--<?= $index + 1 ?>"
                        data-open-weapon="<?= $weaponId ?>"
                        aria-label="Ver <?= htmlspecialchars($weapon['name']) ?>">
                    <?php $itemImage($weaponId, $weapon['name'], substr($weapon['vocationLabel'], 0, 1)); ?>
                    <span><?= htmlspecialchars($weapon['type']) ?></span>
                </button>
            <?php endforeach; ?>
            <span class="eth-orbit eth-orbit--one"></span>
            <span class="eth-orbit eth-orbit--two"></span>
            <span class="eth-core">7</span>
        </div>

        <div class="eth-hero__facts">
            <div><strong>7</strong><span>armas unicas</span></div>
            <div><strong>4</strong><span>vocaciones</span></div>
            <div><strong>5:1</strong><span>evolucion Ultimatum</span></div>
            <div><strong>14%</strong><span>proteccion elemental</span></div>
        </div>
    </section>

    <section class="eth-intro">
        <div>
            <span class="eth-section-kicker">La evolucion final</span>
            <h2>De Ultimatum a <em>Ethereal</em></h2>
        </div>
        <p>
            Cada arma nace de cinco Ultimatum del mismo tipo, un Activator Ring y un Channeler.
            Selecciona una vocacion y abre cualquier arma para ver su receta exacta.
        </p>
    </section>

    <section class="eth-arsenal" id="ethereal-arsenal">
        <div class="eth-vocation-tabs" role="tablist" aria-label="Vocaciones Ethereal">
            <?php foreach ($vocations as $key => $vocation): ?>
                <button type="button"
                        class="<?= $key === 'knight' ? 'is-active' : '' ?>"
                        data-eth-tab="<?= $key ?>"
                        role="tab"
                        aria-selected="<?= $key === 'knight' ? 'true' : 'false' ?>">
                    <span><?= htmlspecialchars($vocation['mark']) ?></span>
                    <div>
                        <strong><?= htmlspecialchars($vocation['label']) ?></strong>
                        <small><?= htmlspecialchars($vocation['role']) ?></small>
                    </div>
                    <em><?= count($weapons[$key]) ?></em>
                </button>
            <?php endforeach; ?>
        </div>

        <?php foreach ($vocations as $key => $vocation): ?>
            <div class="eth-vocation-panel <?= $key === 'knight' ? 'is-active' : '' ?>"
                 data-eth-panel="<?= $key ?>"
                 role="tabpanel">
                <header>
                    <div class="eth-vocation-seal"><?= htmlspecialchars($vocation['mark']) ?></div>
                    <div>
                        <span><?= htmlspecialchars($vocation['role']) ?></span>
                        <h3>Arsenal <?= htmlspecialchars($vocation['label']) ?></h3>
                    </div>
                    <p><?= htmlspecialchars($vocation['description']) ?></p>
                </header>

                <div class="eth-weapon-grid eth-weapon-grid--<?= count($weapons[$key]) ?>">
                    <?php foreach ($weapons[$key] as $weapon): ?>
                        <button type="button"
                                class="eth-weapon-card eth-weapon-card--<?= htmlspecialchars($weapon['accent']) ?>"
                                data-open-weapon="<?= (int) $weapon['id'] ?>">
                            <span class="eth-weapon-card__glow" aria-hidden="true"></span>
                            <span class="eth-weapon-card__top">
                                <small><?= htmlspecialchars($weapon['type']) ?></small>
                                <em>Item <?= (int) $weapon['id'] ?></em>
                            </span>
                            <span class="eth-weapon-card__visual">
                                <?php $itemImage((int) $weapon['id'], $weapon['name'], $vocation['mark']); ?>
                                <i></i>
                            </span>
                            <span class="eth-weapon-card__name">
                                <strong><?= htmlspecialchars($weapon['name']) ?></strong>
                                <small><?= htmlspecialchars($weapon['lead']) ?></small>
                            </span>
                            <span class="eth-weapon-card__stats">
                                <?php foreach ($weapon['highlights'] as $highlight): ?>
                                    <span><small><?= htmlspecialchars($highlight[0]) ?></small><strong><?= htmlspecialchars($highlight[1]) ?></strong></span>
                                <?php endforeach; ?>
                            </span>
                            <span class="eth-weapon-card__cta">Abrir ficha completa <i>&rarr;</i></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="eth-path">
        <div class="eth-path__heading">
            <div>
                <span class="eth-section-kicker">Ruta de obtencion</span>
                <h2>Construye los dos <em>catalizadores</em></h2>
            </div>
            <p>Ambos materiales pueden obtenerse jugando. Ajusta tus cantidades para calcular cuanto te falta.</p>
        </div>

        <div class="eth-farm-grid">
            <article class="eth-farm-card eth-farm-card--fragment">
                <div class="eth-farm-card__visual">
                    <img loading="lazy"
                         src="https://mortera-world.com/images/animated-outfits/animoutfit.php?id=1815&amp;addons=0&amp;head=0&amp;body=0&amp;legs=0&amp;feet=0"
                         alt="Skeleton King, looktype 1815"
                         onerror="this.style.display='none'">
                    <span>1815</span>
                </div>
                <div class="eth-farm-card__body">
                    <span class="eth-farm-label">Nuevo respawn</span>
                    <h3>Skeleton King</h3>
                    <p>Enfrenta al boss para obtener el material que se convierte en Channeler.</p>
                    <div class="eth-material">
                        <?php $itemImage(49457, 'Mystical Fragment', 'MF'); ?>
                        <div><strong>Mystical Fragment</strong><small>Item 49457</small></div>
                        <em>1,000</em>
                    </div>
                    <label class="eth-progress-control">
                        <span><strong>Tu progreso</strong><output data-progress-output="fragment">0 / 1,000</output></span>
                        <input type="range" min="0" max="1000" value="0" step="10" data-progress="fragment">
                        <span class="eth-progress-track"><i data-progress-bar="fragment"></i></span>
                    </label>
                    <div class="eth-conversion">
                        <span>1,000x</span><i>&rarr;</i>
                        <?php $itemImage(61928, 'Channeler', 'CH'); ?>
                        <strong>Channeler</strong>
                    </div>
                </div>
            </article>

            <article class="eth-farm-card eth-farm-card--essence">
                <div class="eth-farm-card__symbol" aria-hidden="true"><span></span><i></i></div>
                <div class="eth-farm-card__body">
                    <span class="eth-farm-label">Caceria influenciada</span>
                    <h3>Sun Essences</h3>
                    <p>Derrota criaturas influenciadas con mas de 8 millones de vida para reunirlas.</p>
                    <div class="eth-material">
                        <?php $itemImage(60821, 'Sun Essence', 'SE'); ?>
                        <div><strong>Sun Essence</strong><small>Item 60821</small></div>
                        <em>1,000</em>
                    </div>
                    <label class="eth-progress-control">
                        <span><strong>Tu progreso</strong><output data-progress-output="essence">0 / 1,000</output></span>
                        <input type="range" min="0" max="1000" value="0" step="10" data-progress="essence">
                        <span class="eth-progress-track"><i data-progress-bar="essence"></i></span>
                    </label>
                    <div class="eth-conversion">
                        <span>1,000x</span><i>&rarr;</i>
                        <?php $itemImage(61918, 'Activator Ring', 'AR'); ?>
                        <strong>Activator Ring</strong>
                    </div>
                </div>
            </article>
        </div>

        <div class="eth-alt-route">
            <span>Ruta alternativa</span>
            <div>
                <strong>Promociones de donacion</strong>
                <p>Cuando la promocion este activa, una donacion de 500 o mas puede otorgar el Activator Ring y el Channeler.</p>
            </div>
            <div class="eth-alt-route__items">
                <?php $itemImage(61918, 'Activator Ring', 'AR'); ?>
                <span>+</span>
                <?php $itemImage(61928, 'Channeler', 'CH'); ?>
            </div>
        </div>
    </section>

    <section class="eth-command">
        <div class="eth-command__copy">
            <span class="eth-section-kicker">Un solo comando</span>
            <h2>Abre el taller <em>Ethereal</em></h2>
            <p>
                La misma ventana permite convertir 1,000 materiales especiales, crear armas
                Ethereals y completar la evolucion desde Ultimatum.
            </p>
            <button type="button" data-copy-command="!ultimatumplus craft">
                <span>!ultimatumplus craft</span>
                <strong data-copy-label>Copiar comando</strong>
            </button>
        </div>
        <ol class="eth-command__steps">
            <li><span>01</span><div><strong>Reune</strong><small>5 armas Ultimatum iguales</small></div></li>
            <li><span>02</span><div><strong>Convierte</strong><small>Tus fragmentos y esencias</small></div></li>
            <li><span>03</span><div><strong>Evoluciona</strong><small>Selecciona el Ethereal deseado</small></div></li>
        </ol>
    </section>

    <section class="eth-future">
        <div>
            <span>Contenido futuro</span>
            <h2>Una quest acelerara tu primera arma</h2>
            <p>La recompensa anunciada cubrira la mitad de cada catalizador necesario.</p>
        </div>
        <div class="eth-future__rewards">
            <article>
                <?php $itemImage(60821, 'Sun Essence', 'SE'); ?>
                <strong>500</strong><span>Sun Essences</span>
            </article>
            <i>+</i>
            <article>
                <?php $itemImage(49457, 'Mystical Fragment', 'MF'); ?>
                <strong>500</strong><span>Mystical Fragments</span>
            </article>
        </div>
    </section>

    <div class="eth-drawer" data-eth-drawer aria-hidden="true">
        <button type="button" class="eth-drawer__backdrop" data-close-drawer aria-label="Cerrar ficha"></button>
        <section class="eth-drawer__panel" role="dialog" aria-modal="true" aria-labelledby="eth-drawer-title">
            <button type="button" class="eth-drawer__close" data-close-drawer aria-label="Cerrar">&times;</button>
            <div class="eth-drawer__hero">
                <div class="eth-drawer__image">
                    <span data-drawer-fallback>E</span>
                    <img src="" alt="" data-drawer-image>
                    <i></i>
                </div>
                <div>
                    <span data-drawer-vocation>Ethereal</span>
                    <h2 id="eth-drawer-title" data-drawer-name>Arma Ethereal</h2>
                    <p data-drawer-lead></p>
                    <div class="eth-drawer__tags">
                        <span data-drawer-type></span>
                        <span data-drawer-id></span>
                    </div>
                </div>
            </div>

            <div class="eth-drawer__content">
                <div class="eth-drawer__stats">
                    <div class="eth-drawer__section-title">
                        <span>Atributos</span><strong>Poder base del arma</strong>
                    </div>
                    <div class="eth-drawer__highlights" data-drawer-highlights></div>
                    <div class="eth-drawer__stat-list" data-drawer-stats></div>
                    <div class="eth-elements" data-drawer-elements hidden>
                        <div>
                            <span>Selector elemental</span>
                            <strong data-element-command></strong>
                        </div>
                        <div data-element-list></div>
                        <button type="button" data-copy-element>Copiar comando</button>
                    </div>
                </div>

                <div class="eth-recipe">
                    <div class="eth-drawer__section-title">
                        <span>Receta exacta</span><strong>Evolucion 5 a 1</strong>
                    </div>
                    <div class="eth-recipe__items">
                        <article>
                            <span class="eth-recipe__qty">5x</span>
                            <span class="eth-recipe__image"><img src="" alt="" data-recipe-base-image><b>U</b></span>
                            <div><strong data-recipe-base-name></strong><small data-recipe-base-id></small></div>
                        </article>
                        <i>+</i>
                        <article>
                            <span class="eth-recipe__qty">1x</span>
                            <span class="eth-recipe__image">
                                <img src="https://mortera-world.com/images/items/61918.gif" alt="Activator Ring" onerror="this.style.display='none'">
                                <b>AR</b>
                            </span>
                            <div><strong>Activator Ring</strong><small>Item 61918</small></div>
                        </article>
                        <i>+</i>
                        <article>
                            <span class="eth-recipe__qty">1x</span>
                            <span class="eth-recipe__image">
                                <img src="https://mortera-world.com/images/items/61928.gif" alt="Channeler" onerror="this.style.display='none'">
                                <b>CH</b>
                            </span>
                            <div><strong>Channeler</strong><small>Item 61928</small></div>
                        </article>
                    </div>
                    <div class="eth-recipe__result">
                        <span>Resultado</span>
                        <div>
                            <img src="" alt="" data-recipe-result-image>
                            <strong data-recipe-result-name></strong>
                        </div>
                    </div>
                    <button type="button" class="eth-recipe__command" data-copy-command="!ultimatumplus craft">
                        <span>!ultimatumplus craft</span>
                        <strong data-copy-label>Copiar comando</strong>
                    </button>
                    <p>El sistema conserva el mayor tier y las mejores mejoras presentes entre los materiales utilizados.</p>
                </div>
            </div>
        </section>
    </div>

    <div class="eth-toast" data-eth-toast role="status" aria-live="polite">Comando copiado</div>
</div>

<script>
(function () {
    var page = document.querySelector('[data-eth-page]');
    if (!page) return;

    var weapons = <?= json_encode($allWeapons, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
    var drawer = page.querySelector('[data-eth-drawer]');
    var closeButton = page.querySelector('.eth-drawer__close');
    var toast = page.querySelector('[data-eth-toast]');
    var activeWeapon = null;

    function itemUrl(id) {
        return 'https://mortera-world.com/images/items/' + id + '.gif';
    }

    function selectVocation(key) {
        Array.prototype.forEach.call(page.querySelectorAll('[data-eth-tab]'), function (button) {
            var active = button.getAttribute('data-eth-tab') === key;
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        Array.prototype.forEach.call(page.querySelectorAll('[data-eth-panel]'), function (panel) {
            panel.classList.toggle('is-active', panel.getAttribute('data-eth-panel') === key);
        });
    }

    Array.prototype.forEach.call(page.querySelectorAll('[data-eth-tab]'), function (button) {
        button.addEventListener('click', function () {
            selectVocation(button.getAttribute('data-eth-tab'));
        });
    });

    function fillDrawer(weapon) {
        activeWeapon = weapon;
        page.querySelector('[data-drawer-name]').textContent = weapon.name;
        page.querySelector('[data-drawer-vocation]').textContent = weapon.vocationLabel + ' Ethereal';
        page.querySelector('[data-drawer-lead]').textContent = weapon.lead;
        page.querySelector('[data-drawer-type]').textContent = weapon.type;
        page.querySelector('[data-drawer-id]').textContent = 'Item ' + weapon.id;
        page.querySelector('[data-drawer-fallback]').textContent = weapon.vocationLabel.charAt(0);

        var drawerImage = page.querySelector('[data-drawer-image]');
        drawerImage.src = itemUrl(weapon.id);
        drawerImage.alt = weapon.name;
        drawerImage.style.display = '';
        drawerImage.onerror = function () { drawerImage.style.display = 'none'; };

        var resultImage = page.querySelector('[data-recipe-result-image]');
        resultImage.src = itemUrl(weapon.id);
        resultImage.alt = weapon.name;
        resultImage.style.display = '';
        resultImage.onerror = function () { resultImage.style.display = 'none'; };
        page.querySelector('[data-recipe-result-name]').textContent = weapon.name;

        var baseImage = page.querySelector('[data-recipe-base-image]');
        baseImage.src = itemUrl(weapon.baseId);
        baseImage.alt = weapon.baseName;
        baseImage.style.display = '';
        baseImage.onerror = function () { baseImage.style.display = 'none'; };
        page.querySelector('[data-recipe-base-name]').textContent = weapon.baseName;
        page.querySelector('[data-recipe-base-id]').textContent = 'Item ' + weapon.baseId;

        var highlights = page.querySelector('[data-drawer-highlights]');
        highlights.innerHTML = '';
        weapon.highlights.forEach(function (stat) {
            var item = document.createElement('div');
            item.innerHTML = '<span>' + stat[0] + '</span><strong>' + stat[1] + '</strong>';
            highlights.appendChild(item);
        });

        var statList = page.querySelector('[data-drawer-stats]');
        statList.innerHTML = '';
        weapon.stats.forEach(function (stat) {
            var item = document.createElement('span');
            item.textContent = stat;
            statList.appendChild(item);
        });

        var elementBox = page.querySelector('[data-drawer-elements]');
        if (weapon.elements && weapon.elementCommand) {
            elementBox.hidden = false;
            page.querySelector('[data-element-command]').textContent = weapon.elementCommand;
            var elementList = page.querySelector('[data-element-list]');
            elementList.innerHTML = '';
            weapon.elements.forEach(function (element) {
                var chip = document.createElement('span');
                chip.textContent = element;
                elementList.appendChild(chip);
            });
        } else {
            elementBox.hidden = true;
        }
    }

    function openDrawer(id) {
        var weapon = weapons[String(id)] || weapons[id];
        if (!weapon) return;
        fillDrawer(weapon);
        drawer.classList.add('is-open');
        drawer.setAttribute('aria-hidden', 'false');
        document.documentElement.classList.add('eth-lock');
        window.setTimeout(function () { closeButton.focus(); }, 60);
    }

    function closeDrawer() {
        drawer.classList.remove('is-open');
        drawer.setAttribute('aria-hidden', 'true');
        document.documentElement.classList.remove('eth-lock');
    }

    Array.prototype.forEach.call(page.querySelectorAll('[data-open-weapon]'), function (button) {
        button.addEventListener('click', function () {
            openDrawer(button.getAttribute('data-open-weapon'));
        });
    });
    Array.prototype.forEach.call(page.querySelectorAll('[data-close-drawer]'), function (button) {
        button.addEventListener('click', closeDrawer);
    });
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && drawer.classList.contains('is-open')) closeDrawer();
    });

    function showToast(message) {
        toast.textContent = message;
        toast.classList.add('is-visible');
        window.clearTimeout(showToast.timer);
        showToast.timer = window.setTimeout(function () {
            toast.classList.remove('is-visible');
        }, 1800);
    }

    function copyText(text, button) {
        function done() {
            showToast('Comando copiado: ' + text);
            var label = button ? button.querySelector('[data-copy-label]') : null;
            if (label) {
                var previous = label.textContent;
                label.textContent = 'Copiado';
                window.setTimeout(function () { label.textContent = previous; }, 1600);
            }
        }

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(done).catch(function () {
                window.prompt('Copia el comando:', text);
            });
        } else {
            window.prompt('Copia el comando:', text);
        }
    }

    Array.prototype.forEach.call(page.querySelectorAll('[data-copy-command]'), function (button) {
        button.addEventListener('click', function () {
            copyText(button.getAttribute('data-copy-command'), button);
        });
    });
    page.querySelector('[data-copy-element]').addEventListener('click', function (event) {
        if (activeWeapon && activeWeapon.elementCommand) copyText(activeWeapon.elementCommand, event.currentTarget);
    });

    Array.prototype.forEach.call(page.querySelectorAll('[data-progress]'), function (input) {
        function update() {
            var key = input.getAttribute('data-progress');
            var value = Math.max(0, Math.min(1000, Number(input.value) || 0));
            var remaining = 1000 - value;
            page.querySelector('[data-progress-output="' + key + '"]').textContent =
                value.toLocaleString() + ' / 1,000' + (remaining ? ' · faltan ' + remaining.toLocaleString() : ' · listo');
            page.querySelector('[data-progress-bar="' + key + '"]').style.width = (value / 10) + '%';
        }
        input.addEventListener('input', update);
        update();
    });

    page.querySelector('[data-scroll-weapons]').addEventListener('click', function () {
        page.querySelector('#ethereal-arsenal').scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
}());
</script>

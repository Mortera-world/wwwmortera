<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Items Exclusivos';

$dataPath = __DIR__ . '/../data/exclusive-items.json';
$exclusiveData = is_file($dataPath) ? json_decode((string) file_get_contents($dataPath), true) : null;
$categories = $exclusiveData['categories'] ?? [];

$tabs = [
    'balls' => ['label' => 'Balls', 'short' => 'Captura', 'icon' => 'B'],
    'boxes' => ['label' => 'Boxes', 'short' => 'Recompensas', 'icon' => 'X'],
    'dummys' => ['label' => 'Dummys', 'short' => 'Entrenamiento', 'icon' => 'D'],
    'potions' => ['label' => 'Potions', 'short' => 'Soporte', 'icon' => 'P'],
    'ultimatum' => ['label' => 'Ultimatum', 'short' => 'Endgame', 'icon' => 'U'],
    'varios' => ['label' => 'Varios', 'short' => 'Utilidad', 'icon' => 'V'],
    'upgrades' => ['label' => 'Upgrades', 'short' => 'Criaturas', 'icon' => '+'],
];

$vocationMeta = [
    'knight' => ['label' => 'Knight', 'short' => 'Melee', 'icon' => 'K'],
    'paladin' => ['label' => 'Paladin', 'short' => 'Distance', 'icon' => 'P'],
    'druid' => ['label' => 'Druid', 'short' => 'Nature', 'icon' => 'D'],
    'sorcerer' => ['label' => 'Sorcerer', 'short' => 'Arcane', 'icon' => 'S'],
];

$categoryCount = static function (string $key) use ($categories): int {
    if ($key !== 'ultimatum') {
        return count($categories[$key] ?? []);
    }

    $count = 0;
    foreach (($categories['ultimatum'] ?? []) as $items) {
        $count += count($items);
    }
    return $count;
};

$totalItems = 0;
foreach (array_keys($tabs) as $key) {
    $totalItems += $categoryCount($key);
}

$classifyPotion = static function (string $name): string {
    $normalized = strtolower($name);
    if (strpos($normalized, 'resilience') !== false) {
        return 'resilience';
    }
    if (strpos($normalized, 'amplification') !== false) {
        return 'amplification';
    }
    return 'support';
};

$renderImage = static function (int $id, string $name, string $fallback = 'IT'): void {
    ?>
    <div class="exclusive-item-image">
        <span aria-hidden="true"><?= htmlspecialchars($fallback) ?></span>
        <img loading="lazy"
             src="https://mortera-world.com/images/items/<?= $id ?>.gif"
             alt="<?= htmlspecialchars($name) ?>"
             onerror="this.style.display='none'">
    </div>
    <?php
};
?>

<link rel="stylesheet" href="/tools/exclusive-items-page.css?v=20260606">

<div class="exclusive-page" data-exclusive-page>
    <section class="exclusive-hero">
        <div class="exclusive-hero__copy">
            <span class="exclusive-eyebrow">El arsenal especial de Mortera</span>
            <h1>Items<br>Exclusivos</h1>
            <p>
                Explora herramientas de captura, cajas, consumibles, entrenamiento,
                utilidades y todo el equipo Ultimatum en un solo lugar.
            </p>
            <div class="exclusive-hero__stats">
                <div><strong><?= $totalItems ?></strong><span>items documentados</span></div>
                <div><strong><?= count($tabs) ?></strong><span>categorias</span></div>
                <div><strong>4</strong><span>sets Ultimatum</span></div>
            </div>
        </div>
        <div class="exclusive-hero__visual" aria-hidden="true">
            <div class="exclusive-relic exclusive-relic--one">
                <span>U</span>
                <img src="/images/mortera/ultimatum_helmet.png" alt="">
            </div>
            <div class="exclusive-relic exclusive-relic--two">
                <span>K</span>
                <img src="/images/mortera/ultimatum_sword.png" alt="">
            </div>
            <div class="exclusive-relic exclusive-relic--three">
                <span>A</span>
                <img src="/images/mortera/ultimatum_axe.png" alt="">
            </div>
            <i></i><i></i><i></i>
        </div>
    </section>

    <?php if (!$exclusiveData): ?>
        <div class="exclusive-error">
            No fue posible cargar el catalogo de items.
        </div>
    <?php else: ?>
        <section class="exclusive-explorer">
            <div class="exclusive-toolbar">
                <label class="exclusive-search">
                    <span>Buscar en la pesta&ntilde;a actual</span>
                    <div>
                        <i aria-hidden="true"></i>
                        <input type="search" placeholder="Nombre, ID, atributo o descripcion..." data-exclusive-search-input>
                        <button type="button" data-exclusive-search-clear aria-label="Limpiar busqueda">&times;</button>
                    </div>
                </label>
                <div class="exclusive-toolbar__result">
                    <strong data-exclusive-visible><?= $categoryCount('balls') ?></strong>
                    <span>resultados visibles</span>
                </div>
            </div>

            <div class="exclusive-tabs" role="tablist" aria-label="Categorias de items">
                <?php foreach ($tabs as $key => $tab): ?>
                    <button type="button"
                            class="<?= $key === 'balls' ? 'is-active' : '' ?>"
                            data-exclusive-tab="<?= $key ?>"
                            role="tab"
                            aria-selected="<?= $key === 'balls' ? 'true' : 'false' ?>">
                        <span><?= htmlspecialchars($tab['icon']) ?></span>
                        <div><strong><?= htmlspecialchars($tab['label']) ?></strong><small><?= htmlspecialchars($tab['short']) ?></small></div>
                        <em><?= $categoryCount($key) ?></em>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="exclusive-panels">
                <?php foreach ($tabs as $key => $tab): ?>
                    <section class="exclusive-panel <?= $key === 'balls' ? 'is-active' : '' ?>"
                             data-exclusive-panel="<?= $key ?>"
                             role="tabpanel">
                        <div class="exclusive-panel__heading">
                            <div>
                                <span><?= htmlspecialchars($tab['short']) ?></span>
                                <h2><?= htmlspecialchars($tab['label']) ?></h2>
                            </div>
                            <p>
                                <?php if ($key === 'balls'): ?>
                                    Herramientas con diferentes multiplicadores para capturar criaturas.
                                <?php elseif ($key === 'boxes'): ?>
                                    Cajas especiales con recompensas VIP y posibilidades de obtener Ultimatums.
                                <?php elseif ($key === 'dummys'): ?>
                                    Dummies de ejercicio con bonificaciones crecientes para entrenar skills.
                                <?php elseif ($key === 'potions'): ?>
                                    Curacion, soporte temporal, resistencia elemental y amplificacion de da&ntilde;o.
                                <?php elseif ($key === 'ultimatum'): ?>
                                    Equipo endgame creado principalmente con 15 piezas VIP y el comando !craft ultimatum.
                                <?php elseif ($key === 'varios'): ?>
                                    Herramientas portatiles, boosters, acceso a bosses y objetos de Forge.
                                <?php else: ?>
                                    Mejoras permanentes de HP y ATK para las criaturas capturadas.
                                <?php endif; ?>
                            </p>
                        </div>

                        <?php if ($key === 'potions'): ?>
                            <div class="exclusive-subfilters" data-potion-filters>
                                <button type="button" class="is-active" data-potion-filter="all">Todas</button>
                                <button type="button" data-potion-filter="support">Soporte</button>
                                <button type="button" data-potion-filter="resilience">Resilience</button>
                                <button type="button" data-potion-filter="amplification">Amplification</button>
                            </div>
                        <?php endif; ?>

                        <?php if ($key === 'ultimatum'): ?>
                            <div class="ultimatum-vocations" role="tablist" aria-label="Vocaciones Ultimatum">
                                <?php foreach ($vocationMeta as $vocation => $meta): ?>
                                    <button type="button"
                                            class="<?= $vocation === 'knight' ? 'is-active' : '' ?>"
                                            data-vocation-tab="<?= $vocation ?>">
                                        <span><?= htmlspecialchars($meta['icon']) ?></span>
                                        <div><strong><?= htmlspecialchars($meta['label']) ?></strong><small><?= htmlspecialchars($meta['short']) ?></small></div>
                                        <em><?= count($categories['ultimatum'][$vocation] ?? []) ?></em>
                                    </button>
                                <?php endforeach; ?>
                            </div>

                            <?php foreach ($vocationMeta as $vocation => $meta): ?>
                                <div class="ultimatum-panel <?= $vocation === 'knight' ? 'is-active' : '' ?>"
                                     data-vocation-panel="<?= $vocation ?>">
                                    <div class="ultimatum-panel__intro">
                                        <span><?= htmlspecialchars($meta['icon']) ?></span>
                                        <div>
                                            <small>Set completo</small>
                                            <h3>Ultimatum <?= htmlspecialchars($meta['label']) ?></h3>
                                        </div>
                                        <p>Selecciona una tarjeta para desplegar todas sus estadisticas.</p>
                                    </div>
                                    <div class="ultimatum-grid">
                                        <?php foreach (($categories['ultimatum'][$vocation] ?? []) as $item): ?>
                                            <?php
                                            $search = strtolower($item['name'] . ' ' . $item['id'] . ' ' . $item['source'] . ' ' . $item['stats']);
                                            $fallback = strtoupper(substr($meta['label'], 0, 1));
                                            ?>
                                            <details class="ultimatum-card"
                                                     data-exclusive-card
                                                     data-exclusive-search="<?= htmlspecialchars($search) ?>">
                                                <summary>
                                                    <?php $renderImage((int) $item['id'], $item['name'], $fallback); ?>
                                                    <div class="ultimatum-card__title">
                                                        <small>Item <?= (int) $item['id'] ?></small>
                                                        <strong><?= htmlspecialchars($item['name']) ?></strong>
                                                        <span><?= htmlspecialchars($item['source']) ?></span>
                                                    </div>
                                                    <i></i>
                                                </summary>
                                                <div class="ultimatum-card__stats">
                                                    <small>Estadisticas y efectos</small>
                                                    <p><?= htmlspecialchars($item['stats']) ?></p>
                                                </div>
                                            </details>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="exclusive-empty" data-exclusive-empty hidden>
                                        <strong>No hay coincidencias en este set</strong>
                                        <span>Prueba con otro nombre, ID o atributo.</span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="exclusive-grid exclusive-grid--<?= htmlspecialchars($key) ?>">
                                <?php foreach (($categories[$key] ?? []) as $item): ?>
                                    <?php
                                    $search = strtolower($item['name'] . ' ' . $item['id'] . ' ' . $item['description']);
                                    $potionType = $key === 'potions' ? $classifyPotion($item['name']) : '';
                                    $fallback = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $item['name']), 0, 2));
                                    ?>
                                    <article class="exclusive-card exclusive-card--<?= htmlspecialchars($key) ?>"
                                             data-exclusive-card
                                             data-exclusive-search="<?= htmlspecialchars($search) ?>"
                                             <?= $potionType ? 'data-potion-type="' . htmlspecialchars($potionType) . '"' : '' ?>>
                                        <div class="exclusive-card__top">
                                            <?php $renderImage((int) $item['id'], $item['name'], $fallback ?: 'IT'); ?>
                                            <span>Item <?= (int) $item['id'] ?></span>
                                        </div>
                                        <div class="exclusive-card__body">
                                            <h3><?= htmlspecialchars($item['name']) ?></h3>
                                            <p><?= htmlspecialchars($item['description']) ?></p>
                                        </div>
                                        <?php if ($key === 'potions'): ?>
                                            <small class="exclusive-card__type"><?= htmlspecialchars(ucfirst($potionType)) ?></small>
                                        <?php endif; ?>
                                    </article>
                                <?php endforeach; ?>
                            </div>

                            <div class="exclusive-empty" data-exclusive-empty hidden>
                                <strong>No encontramos items</strong>
                                <span>Prueba con otro nombre, ID o descripcion.</span>
                            </div>

                            <?php if ($key === 'balls'): ?>
                                <div class="exclusive-related exclusive-related--balls">
                                    <div>
                                        <span>NPC Sir Elixion</span>
                                        <strong>Encuentra Balls en Mortera Country</strong>
                                        <a href="<?= getLink('capture') ?>">Ver Capture System</a>
                                    </div>
                                    <img src="/images/map1.png" alt="Ubicacion de Sir Elixion">
                                </div>
                            <?php elseif ($key === 'upgrades'): ?>
                                <a class="exclusive-related exclusive-related--link" href="<?= getLink('upgrades') ?>">
                                    <div><span>Guia completa</span><strong>Calcula tus HP y ATK Upgrades</strong></div>
                                    <i>Ver Upgrades</i>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </section>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<script>
(function () {
    var page = document.querySelector('[data-exclusive-page]');
    if (!page) return;

    var tabs = Array.prototype.slice.call(page.querySelectorAll('[data-exclusive-tab]'));
    var panels = Array.prototype.slice.call(page.querySelectorAll('[data-exclusive-panel]'));
    var search = page.querySelector('[data-exclusive-search-input]');
    var visibleOutput = page.querySelector('[data-exclusive-visible]');
    var potionFilter = 'all';

    function normalize(value) {
        return (value || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    }

    function activePanel() {
        return page.querySelector('[data-exclusive-panel].is-active');
    }

    function activeCards() {
        var panel = activePanel();
        if (!panel) return [];
        var vocationPanel = panel.querySelector('[data-vocation-panel].is-active');
        return Array.prototype.slice.call((vocationPanel || panel).querySelectorAll('[data-exclusive-card]'));
    }

    function updateFilter() {
        var query = normalize(search.value);
        var panel = activePanel();
        var cards = activeCards();
        var visible = 0;

        cards.forEach(function (card) {
            var textMatch = !query || normalize(card.getAttribute('data-exclusive-search')).indexOf(query) !== -1;
            var type = card.getAttribute('data-potion-type');
            var potionMatch = !type || potionFilter === 'all' || type === potionFilter;
            var show = textMatch && potionMatch;
            card.hidden = !show;
            if (show) visible++;
        });

        if (panel) {
            Array.prototype.slice.call(panel.querySelectorAll('[data-exclusive-empty]')).forEach(function (empty) {
                var owner = empty.parentElement;
                var isActiveOwner = !owner.hasAttribute('data-vocation-panel') || owner.classList.contains('is-active');
                empty.hidden = !(isActiveOwner && visible === 0);
            });
        }
        visibleOutput.textContent = visible;
    }

    function selectCategory(key) {
        tabs.forEach(function (button) {
            var active = button.getAttribute('data-exclusive-tab') === key;
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        panels.forEach(function (panel) {
            panel.classList.toggle('is-active', panel.getAttribute('data-exclusive-panel') === key);
        });
        search.value = '';
        potionFilter = 'all';
        Array.prototype.slice.call(page.querySelectorAll('[data-potion-filter]')).forEach(function (button) {
            button.classList.toggle('is-active', button.getAttribute('data-potion-filter') === 'all');
        });
        updateFilter();
    }

    tabs.forEach(function (button) {
        button.addEventListener('click', function () {
            selectCategory(button.getAttribute('data-exclusive-tab'));
        });
    });

    Array.prototype.slice.call(page.querySelectorAll('[data-vocation-tab]')).forEach(function (button) {
        button.addEventListener('click', function () {
            var vocation = button.getAttribute('data-vocation-tab');
            var panel = button.closest('[data-exclusive-panel]');
            Array.prototype.slice.call(panel.querySelectorAll('[data-vocation-tab]')).forEach(function (item) {
                item.classList.toggle('is-active', item === button);
            });
            Array.prototype.slice.call(panel.querySelectorAll('[data-vocation-panel]')).forEach(function (item) {
                item.classList.toggle('is-active', item.getAttribute('data-vocation-panel') === vocation);
            });
            updateFilter();
        });
    });

    Array.prototype.slice.call(page.querySelectorAll('[data-potion-filter]')).forEach(function (button) {
        button.addEventListener('click', function () {
            potionFilter = button.getAttribute('data-potion-filter');
            Array.prototype.slice.call(page.querySelectorAll('[data-potion-filter]')).forEach(function (item) {
                item.classList.toggle('is-active', item === button);
            });
            updateFilter();
        });
    });

    search.addEventListener('input', updateFilter);
    page.querySelector('[data-exclusive-search-clear]').addEventListener('click', function () {
        search.value = '';
        search.focus();
        updateFilter();
    });

    updateFilter();
}());
</script>

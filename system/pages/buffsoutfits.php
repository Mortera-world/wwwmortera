<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Buffs Outfits';

$outfits = [
    [
        'name' => 'Infernal Outfit',
        'looktype' => 2434,
        'category' => 'elemental',
        'accent' => 'fire',
        'focus' => 'Fire',
        'buffs' => ['+20% Damage', '+5 Critical Damage', '+10% Fire Damage', '+5% Fire Protection'],
    ],
    [
        'name' => 'Variocolor 2 Outfit',
        'looktype' => 2453,
        'category' => 'elemental',
        'accent' => 'fire',
        'focus' => 'Fire',
        'buffs' => ['+20% Damage', '+5 Critical Damage', '+10% Fire Damage', '+5% Fire Protection'],
    ],
    [
        'name' => 'Variocolor Outfit',
        'looktype' => 2452,
        'category' => 'elemental',
        'accent' => 'energy',
        'focus' => 'Energy',
        'buffs' => ['+20% Damage', '+5 Critical Damage', '+10% Energy Damage', '+5% Energy Protection'],
    ],
    [
        'name' => 'Dark Jester Outfit',
        'looktype' => 3637,
        'category' => 'mage',
        'accent' => 'death',
        'focus' => 'Death / Mana',
        'buffs' => ['+20% Damage', '+5 Critical Damage', '+10% Death Damage', '+5% Death Protection', '+20% Mana'],
    ],
    [
        'name' => 'Mega Kazam',
        'looktype' => 2455,
        'category' => 'ranged',
        'accent' => 'holy',
        'focus' => 'Distance / Holy',
        'buffs' => ['+25% Damage', '+8 Critical Damage', '+10% Holy Damage', '+10% Fire Damage', '+5% Holy Protection', '+10% Mana', '+15% HP', '+15 Distance'],
    ],
    [
        'name' => 'Glorious of the Hammer',
        'looktype' => 3510,
        'category' => 'melee',
        'accent' => 'physical',
        'focus' => 'Melee / Defense',
        'buffs' => ['+20% Damage', '-10% Damage Received', '+5% Physical Protection', '+5% Fire Protection', '+10% Mana', '+25% HP', '+15 Axe', '+15 Sword', '+15 Club'],
    ],
    [
        'name' => 'Poisonus Mega Kazam',
        'looktype' => 2454,
        'category' => 'mage',
        'accent' => 'earth',
        'focus' => 'Earth / Magic',
        'buffs' => ['+25% Damage', '+8 Critical Damage', '+10% Earth Damage', '+10% Healing', '+5% Holy Protection', '+20% Mana', '+15 Magic Level'],
    ],
    [
        'name' => 'Brotherhood Deathling',
        'looktype' => 3511,
        'category' => 'mage',
        'accent' => 'death',
        'focus' => 'Death / Magic',
        'buffs' => ['+25% Damage', '+20 Critical Damage', '+10% Death Damage', '+5% Death Protection', '+20% Mana', '+15 Magic Level'],
    ],
    [
        'name' => 'Snowbash',
        'looktype' => 1365,
        'category' => 'melee',
        'accent' => 'ice',
        'focus' => 'Melee / Defense',
        'buffs' => ['+20% Damage', '-10% Damage Received', '+5% Physical Protection', '+5% Fire Protection', '+10% Mana', '+25% HP', '+15 Axe', '+15 Sword', '+15 Club'],
    ],
];
?>

<link rel="stylesheet" href="/tools/library-guides.css?v=20260606">

<div class="guide-page guide-page--buffs" data-buffs-page>
    <section class="guide-hero">
        <div class="guide-hero__copy">
            <span class="guide-eyebrow">Poder que tambi&eacute;n se viste</span>
            <h1>Buffs Outfits</h1>
            <p>
                Algunos outfits no son solo cosm&eacute;ticos: mientras los llevas equipados
                agregan da&ntilde;o, protecciones, vida, mana o skills a tu personaje.
            </p>
            <div class="guide-hero__chips">
                <span>9 outfits documentados</span>
                <span>Bonos por especialidad</span>
                <span>Promociones y Goal</span>
            </div>
        </div>
        <div class="buffs-hero-orbit" aria-hidden="true">
            <div class="buffs-hero-orbit__core">BUFF</div>
            <span class="buffs-hero-orbit__item buffs-hero-orbit__item--one">DMG</span>
            <span class="buffs-hero-orbit__item buffs-hero-orbit__item--two">HP</span>
            <span class="buffs-hero-orbit__item buffs-hero-orbit__item--three">ML</span>
        </div>
    </section>

    <section class="guide-panel buffs-intro">
        <div>
            <span class="guide-kicker">C&oacute;mo funcionan</span>
            <h2>Elige el outfit seg&uacute;n tu build</h2>
            <p>
                El sistema aplica los atributos del outfit actual. Al cambiarlo, se retira
                el buff anterior y se aplica el correspondiente al nuevo look.
            </p>
        </div>
        <div class="buffs-source">
            <small>Obtenci&oacute;n general</small>
            <strong>Promociones o Goal</strong>
            <span>Todos los outfits listados comparten esta forma de obtenci&oacute;n.</span>
        </div>
    </section>

    <section class="buffs-browser">
        <div class="buffs-toolbar">
            <label class="buffs-search">
                <span>Buscar outfit o bono</span>
                <input type="search" placeholder="Ej. fire, mana, distance..." data-buffs-search>
            </label>
            <div class="buffs-filters" aria-label="Filtrar outfits">
                <button type="button" class="is-active" data-buffs-filter="all">Todos</button>
                <button type="button" data-buffs-filter="melee">Melee</button>
                <button type="button" data-buffs-filter="mage">Magic</button>
                <button type="button" data-buffs-filter="ranged">Distance</button>
                <button type="button" data-buffs-filter="elemental">Elemental</button>
            </div>
        </div>

        <div class="buffs-results">
            <span><strong data-buffs-count><?= count($outfits) ?></strong> outfits encontrados</span>
            <button type="button" data-buffs-clear>Limpiar filtros</button>
        </div>

        <div class="buffs-grid">
            <?php foreach ($outfits as $outfit): ?>
                <?php $searchText = strtolower($outfit['name'] . ' ' . $outfit['focus'] . ' ' . implode(' ', $outfit['buffs'])); ?>
                <article class="buff-card buff-card--<?= htmlspecialchars($outfit['accent']) ?>"
                         data-buff-card
                         data-category="<?= htmlspecialchars($outfit['category']) ?>"
                         data-search="<?= htmlspecialchars($searchText) ?>">
                    <div class="buff-card__visual">
                        <span class="buff-card__fallback" aria-hidden="true"><?= htmlspecialchars(strtoupper(substr($outfit['name'], 0, 1))) ?></span>
                        <img loading="lazy"
                             src="https://mortera-world.com/images/animated-outfits/animoutfit.php?id=<?= (int) $outfit['looktype'] ?>&addons=0&head=0&body=0&legs=0&feet=0"
                             alt="<?= htmlspecialchars($outfit['name']) ?>"
                             onerror="this.style.display='none'">
                        <span class="buff-card__focus"><?= htmlspecialchars($outfit['focus']) ?></span>
                    </div>
                    <div class="buff-card__body">
                        <small>Looktype <?= (int) $outfit['looktype'] ?></small>
                        <h3><?= htmlspecialchars($outfit['name']) ?></h3>
                        <div class="buff-card__tags">
                            <?php foreach ($outfit['buffs'] as $buff): ?>
                                <span><?= htmlspecialchars($buff) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="buffs-empty" data-buffs-empty hidden>
            <strong>No encontramos coincidencias</strong>
            <span>Prueba con otro nombre, elemento o atributo.</span>
        </div>
    </section>

    <section class="guide-tip">
        <span>Consejo</span>
        <p>Compara da&ntilde;o, defensa y skills: el outfit con el n&uacute;mero m&aacute;s alto no siempre es el mejor para tu vocaci&oacute;n.</p>
    </section>
</div>

<script>
(function () {
    var page = document.querySelector('[data-buffs-page]');
    if (!page) return;

    var cards = Array.prototype.slice.call(page.querySelectorAll('[data-buff-card]'));
    var filters = Array.prototype.slice.call(page.querySelectorAll('[data-buffs-filter]'));
    var search = page.querySelector('[data-buffs-search]');
    var count = page.querySelector('[data-buffs-count]');
    var empty = page.querySelector('[data-buffs-empty]');
    var activeFilter = 'all';

    function normalize(value) {
        return (value || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    }

    function update() {
        var query = normalize(search.value);
        var visible = 0;

        cards.forEach(function (card) {
            var categoryMatch = activeFilter === 'all' || card.getAttribute('data-category') === activeFilter;
            var searchMatch = !query || normalize(card.getAttribute('data-search')).indexOf(query) !== -1;
            var show = categoryMatch && searchMatch;
            card.hidden = !show;
            if (show) visible++;
        });

        count.textContent = visible;
        empty.hidden = visible !== 0;
    }

    filters.forEach(function (button) {
        button.addEventListener('click', function () {
            activeFilter = button.getAttribute('data-buffs-filter');
            filters.forEach(function (item) { item.classList.toggle('is-active', item === button); });
            update();
        });
    });

    search.addEventListener('input', update);
    page.querySelector('[data-buffs-clear]').addEventListener('click', function () {
        search.value = '';
        activeFilter = 'all';
        filters.forEach(function (item) {
            item.classList.toggle('is-active', item.getAttribute('data-buffs-filter') === 'all');
        });
        update();
        search.focus();
    });
}());
</script>

<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Creature Upgrades';
?>

<link rel="stylesheet" href="/tools/library-guides.css?v=20260606">

<div class="guide-page guide-page--upgrades" data-upgrades-page>
    <section class="guide-hero upgrades-hero">
        <div class="guide-hero__copy">
            <span class="guide-eyebrow">Mejoras permanentes para tu captura</span>
            <h1>Creature Upgrades</h1>
            <p>
                Refuerza las criaturas guardadas en tus Pok&eacute;balls. Cada item consumido
                agrega un stack permanente de HP o ATK.
            </p>
            <div class="guide-hero__chips">
                <span>+1% por stack</span>
                <span>HP y ATK independientes</span>
                <span>Store, Influenced y Fiendish</span>
            </div>
        </div>
        <div class="upgrades-hero__visual" aria-hidden="true">
            <div class="upgrade-gem upgrade-gem--hp"><span>HP</span></div>
            <div class="upgrade-link"></div>
            <div class="upgrade-gem upgrade-gem--atk"><span>ATK</span></div>
        </div>
    </section>

    <section class="upgrade-items">
        <article class="upgrade-item upgrade-item--hp">
            <div class="upgrade-item__image">
                <span aria-hidden="true">HP</span>
                <img src="https://mortera-world.com/images/items/61916.gif" alt="HP Upgrade" onerror="this.style.display='none'">
            </div>
            <div>
                <span class="guide-kicker">Item 61916</span>
                <h2>HP Upgrade</h2>
                <p>Aumenta <strong>hpUpgrade +1</strong> y suma <strong>+1% de vida m&aacute;xima final</strong> por stack.</p>
                <div class="upgrade-item__source"><span>Se obtiene en</span><strong>Store, criaturas Influenced y Fiendish</strong></div>
            </div>
        </article>

        <article class="upgrade-item upgrade-item--atk">
            <div class="upgrade-item__image">
                <span aria-hidden="true">ATK</span>
                <img src="https://mortera-world.com/images/items/61917.gif" alt="ATK Upgrade" onerror="this.style.display='none'">
            </div>
            <div>
                <span class="guide-kicker">Item 61917</span>
                <h2>ATK Upgrade</h2>
                <p>Aumenta <strong>atkUpgrade +1</strong> y suma <strong>+1% de da&ntilde;o final</strong> por stack.</p>
                <div class="upgrade-item__source"><span>Se obtiene en</span><strong>Store, criaturas Influenced y Fiendish</strong></div>
            </div>
        </article>
    </section>

    <section class="upgrade-calculator">
        <div class="guide-section-heading">
            <span class="guide-kicker">Calculadora interactiva</span>
            <h2>Proyecta tus upgrades</h2>
            <p>Introduce los valores actuales de tu criatura y mueve los stacks para ver el resultado.</p>
        </div>

        <div class="upgrade-calculator__layout">
            <div class="upgrade-controls">
                <div class="upgrade-controls__bases">
                    <label>
                        <span>HP base actual</span>
                        <input type="number" min="1" max="999999999" value="10000" data-base-hp>
                    </label>
                    <label>
                        <span>ATK base actual</span>
                        <input type="number" min="1" max="999999999" value="1000" data-base-atk>
                    </label>
                </div>

                <label class="upgrade-range upgrade-range--hp">
                    <span>HP Upgrades <output data-hp-stacks>10</output></span>
                    <input type="range" min="0" max="100" value="10" data-hp-range>
                </label>
                <label class="upgrade-range upgrade-range--atk">
                    <span>ATK Upgrades <output data-atk-stacks>10</output></span>
                    <input type="range" min="0" max="100" value="10" data-atk-range>
                </label>
            </div>

            <div class="upgrade-results">
                <article class="upgrade-result upgrade-result--hp">
                    <small>Vida m&aacute;xima proyectada</small>
                    <strong data-final-hp>11,000</strong>
                    <span data-hp-gain>+1,000 HP</span>
                    <div><i data-hp-bar></i></div>
                </article>
                <article class="upgrade-result upgrade-result--atk">
                    <small>Da&ntilde;o proyectado</small>
                    <strong data-final-atk>1,100</strong>
                    <span data-atk-gain>+100 ATK</span>
                    <div><i data-atk-bar></i></div>
                </article>
            </div>
        </div>

        <div class="upgrade-formula">
            <span>F&oacute;rmula</span>
            <code>valor final = valor actual x (1 + stacks / 100)</code>
        </div>
    </section>

    <section class="upgrade-steps">
        <article><span>1</span><div><strong>Captura una criatura</strong><small>Debe estar guardada dentro de su Pok&eacute;ball.</small></div></article>
        <article><span>2</span><div><strong>Consigue el upgrade</strong><small>HP y ATK utilizan items diferentes.</small></div></article>
        <article><span>3</span><div><strong>Aplica el item</strong><small>Cada uso consume un item y agrega +1 stack.</small></div></article>
        <article><span>4</span><div><strong>Conserva la mejora</strong><small>El stack queda registrado en la criatura capturada.</small></div></article>
    </section>

    <a class="upgrade-capture-link" href="<?= getLink('capture') ?>">
        <span>Gu&iacute;a relacionada</span>
        <strong>Conoce el Capture System completo</strong>
        <i>Ver sistema</i>
    </a>
</div>

<script>
(function () {
    var page = document.querySelector('[data-upgrades-page]');
    if (!page) return;

    var baseHp = page.querySelector('[data-base-hp]');
    var baseAtk = page.querySelector('[data-base-atk]');
    var hpRange = page.querySelector('[data-hp-range]');
    var atkRange = page.querySelector('[data-atk-range]');
    var format = new Intl.NumberFormat('en-US', { maximumFractionDigits: 0 });

    function update() {
        var hp = Math.max(1, parseFloat(baseHp.value) || 1);
        var atk = Math.max(1, parseFloat(baseAtk.value) || 1);
        var hpStacks = parseInt(hpRange.value, 10);
        var atkStacks = parseInt(atkRange.value, 10);
        var finalHp = hp * (1 + hpStacks / 100);
        var finalAtk = atk * (1 + atkStacks / 100);

        page.querySelector('[data-hp-stacks]').textContent = hpStacks;
        page.querySelector('[data-atk-stacks]').textContent = atkStacks;
        page.querySelector('[data-final-hp]').textContent = format.format(finalHp);
        page.querySelector('[data-final-atk]').textContent = format.format(finalAtk);
        page.querySelector('[data-hp-gain]').textContent = '+' + format.format(finalHp - hp) + ' HP';
        page.querySelector('[data-atk-gain]').textContent = '+' + format.format(finalAtk - atk) + ' ATK';
        page.querySelector('[data-hp-bar]').style.width = hpStacks + '%';
        page.querySelector('[data-atk-bar]').style.width = atkStacks + '%';
    }

    [baseHp, baseAtk, hpRange, atkRange].forEach(function (input) {
        input.addEventListener('input', update);
    });
    update();
}());
</script>

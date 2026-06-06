<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Reset System';
?>

<link rel="stylesheet" href="/tools/reset-page.css?v=20260606">

<div class="reset-page" id="reset-top">
    <section class="reset-hero">
        <div class="reset-hero__copy">
            <span class="reset-eyebrow">Progresi&oacute;n permanente</span>
            <h1>Reset System</h1>
            <p>
                Vuelve al nivel 8 para comenzar otro ciclo con m&aacute;s vida, mana, capacidad,
                skills y recompensas. Cada reset te acerca a la Ascension.
            </p>
            <div class="reset-command">
                <div><small>Comando dentro del juego</small><strong>!reset</strong></div>
                <button type="button" data-copy-reset><span data-copy-reset-label>Copiar</span></button>
            </div>
        </div>

        <div class="reset-hero__visual" aria-hidden="true">
            <div class="reset-scroll">
                <img src="/images/mortera/resetsystem.png" alt="">
                <div class="reset-scroll__seal"><span>+1</span><small>Reset</small></div>
            </div>
            <i class="reset-spark reset-spark--one"></i>
            <i class="reset-spark reset-spark--two"></i>
            <i class="reset-spark reset-spark--three"></i>
        </div>
    </section>

    <div class="reset-summary">
        <article><span>8</span><div><strong>Nivel base</strong><small>Regresas al nivel 8.</small></div></article>
        <article><span>+500</span><div><strong>HP y mana</strong><small>Por cada reset completado.</small></div></article>
        <article><span>+5%</span><div><strong>Capacidad</strong><small>Sobre tu capacidad actual.</small></div></article>
        <article><span>100</span><div><strong>Meta Ascension</strong><small>El siguiente gran ciclo.</small></div></article>
    </div>

    <nav class="reset-nav" aria-label="Secciones de Reset System">
        <button type="button" class="is-active" data-reset-link="eligibility">Verificador</button>
        <button type="button" data-reset-link="stages">Stages</button>
        <button type="button" data-reset-link="effects">Efectos</button>
        <button type="button" data-reset-link="skills">Skills</button>
        <button type="button" data-reset-link="projection">Proyecci&oacute;n</button>
        <button type="button" data-reset-link="rewards">Recompensas</button>
    </nav>

    <section class="reset-section" id="eligibility" data-reset-section>
        <div class="reset-heading">
            <span class="reset-heading__number">01</span>
            <div>
                <span class="reset-kicker">Comprueba tu progreso</span>
                <h2>Verificador de reset</h2>
                <p>Indica tus resets y nivel actual para saber si ya puedes usar el comando.</p>
            </div>
        </div>

        <div class="reset-eligibility">
            <div class="reset-eligibility__controls">
                <label>
                    <span>Resets actuales</span>
                    <input type="number" min="0" max="100" value="0" data-current-resets>
                </label>
                <label>
                    <span>Nivel actual</span>
                    <input type="number" min="1" max="99999" value="3000" data-current-level>
                </label>

                <div class="reset-condition-list">
                    <label>
                        <input type="checkbox" data-reset-condition>
                        <span></span>
                        <div><strong>Sin Red Skull</strong><small>Red skull bloquea el comando.</small></div>
                    </label>
                    <label>
                        <input type="checkbox" data-reset-condition>
                        <span></span>
                        <div><strong>Dentro de PZ</strong><small>Debes estar en Protection Zone.</small></div>
                    </label>
                    <label>
                        <input type="checkbox" data-reset-condition>
                        <span></span>
                        <div><strong>Sin Battle</strong><small>No puedes tener infight activo.</small></div>
                    </label>
                </div>
            </div>

            <div class="reset-eligibility__result" data-eligibility-result>
                <span class="reset-status-pill" data-eligibility-pill>Revisando</span>
                <small>Nivel requerido para el siguiente reset</small>
                <strong data-required-level>3,000</strong>
                <div class="reset-level-progress">
                    <div><span data-current-level-label>Nivel 3,000</span><span data-progress-percent>100%</span></div>
                    <i><span data-level-progress-bar></span></i>
                </div>
                <h3 data-eligibility-title>Completa las condiciones</h3>
                <p data-eligibility-message>Marca PZ, Battle y Red Skull para confirmar tu estado.</p>
            </div>
        </div>
    </section>

    <section class="reset-section" id="stages" data-reset-section>
        <div class="reset-heading">
            <span class="reset-heading__number">02</span>
            <div>
                <span class="reset-kicker">Cada ciclo exige m&aacute;s</span>
                <h2>Stages de nivel requerido</h2>
                <p>Selecciona un stage para explorar el requisito del siguiente reset.</p>
            </div>
        </div>

        <div class="reset-stage-track">
            <button type="button" data-stage-max="40" data-stage-level="3000" class="is-active"><span>0-40</span><strong>Lv. 3,000</strong></button>
            <button type="button" data-stage-max="50" data-stage-level="5000"><span>41-50</span><strong>Lv. 5,000</strong></button>
            <button type="button" data-stage-max="60" data-stage-level="8000"><span>51-60</span><strong>Lv. 8,000</strong></button>
            <button type="button" data-stage-max="70" data-stage-level="10000"><span>61-70</span><strong>Lv. 10,000</strong></button>
            <button type="button" data-stage-max="80" data-stage-level="12000"><span>71-80</span><strong>Lv. 12,000</strong></button>
            <button type="button" data-stage-max="90" data-stage-level="15000"><span>81-90</span><strong>Lv. 15,000</strong></button>
            <button type="button" data-stage-max="100" data-stage-level="20000"><span>91-100</span><strong>Lv. 20,000</strong></button>
        </div>

        <div class="reset-stage-detail">
            <div class="reset-stage-detail__number"><span data-stage-display-level>3,000</span><small>nivel requerido</small></div>
            <div>
                <span class="reset-kicker" data-stage-display-range>Resets 0 a 40</span>
                <h3 data-stage-display-title>Primeros ciclos</h3>
                <p data-stage-display-copy>Mientras tengas 40 resets o menos, necesitas nivel 3,000 para continuar.</p>
            </div>
            <div class="reset-stage-detail__bar"><span data-stage-bar></span></div>
        </div>

        <div class="reset-stage-table">
            <div><span>Hasta 40</span><strong>3,000</strong></div>
            <div><span>Hasta 50</span><strong>5,000</strong></div>
            <div><span>Hasta 60</span><strong>8,000</strong></div>
            <div><span>Hasta 70</span><strong>10,000</strong></div>
            <div><span>Hasta 80</span><strong>12,000</strong></div>
            <div><span>Hasta 90</span><strong>15,000</strong></div>
            <div><span>Hasta 100</span><strong>20,000</strong></div>
        </div>
    </section>

    <section class="reset-section" id="effects" data-reset-section>
        <div class="reset-heading">
            <span class="reset-heading__number">03</span>
            <div>
                <span class="reset-kicker">Un nuevo comienzo</span>
                <h2>Qu&eacute; ocurre al resetear</h2>
                <p>El nivel vuelve al inicio, pero las mejoras se quedan contigo.</p>
            </div>
        </div>

        <div class="reset-cycle">
            <article>
                <span class="reset-cycle__tag">Antes</span>
                <h3 data-cycle-stage>Stage inicial</h3>
                <strong data-cycle-level>Lv. 3,000</strong>
                <p>Alcanza el nivel requerido y cumple las condiciones.</p>
            </article>
            <div class="reset-cycle__action"><span>!reset</span><i></i></div>
            <article class="reset-cycle__after">
                <span class="reset-cycle__tag">Despu&eacute;s</span>
                <h3>Nuevo ciclo</h3>
                <strong>Lv. 8</strong>
                <p>Tu contador aumenta y conservas todas las mejoras.</p>
            </article>
        </div>

        <div class="reset-effect-grid">
            <article><span>+1</span><h3>Reset</h3><p>El contador de resets aumenta en uno.</p></article>
            <article><span>8</span><h3>Nivel base</h3><p>Tu personaje regresa al nivel 8.</p></article>
            <article><span>+500</span><h3>Max Health</h3><p>Aumento permanente por reset.</p></article>
            <article><span>+500</span><h3>Max Mana</h3><p>Aumento permanente por reset.</p></article>
            <article><span>+5%</span><h3>Capacidad</h3><p>Calculado sobre tu capacidad actual.</p></article>
            <article><span class="reset-firework">&#10022;</span><h3>Firework Red</h3><p>Efecto visual al completar el reset.</p></article>
        </div>
    </section>

    <section class="reset-section" id="skills" data-reset-section>
        <div class="reset-heading">
            <span class="reset-heading__number">04</span>
            <div>
                <span class="reset-kicker">Mejora constante</span>
                <h2>Skills por reset</h2>
                <p>Cada habilidad recibe +1, con una excepci&oacute;n para Fist.</p>
            </div>
        </div>

        <div class="reset-skill-grid">
            <article class="reset-skill-card reset-skill-card--limited">
                <span>+1</span><strong>Fist</strong><small>Solo mientras Fist sea menor que 150.</small>
            </article>
            <article><span>+1</span><strong>Club</strong><small>Siempre</small></article>
            <article><span>+1</span><strong>Sword</strong><small>Siempre</small></article>
            <article><span>+1</span><strong>Axe</strong><small>Siempre</small></article>
            <article><span>+1</span><strong>Distance</strong><small>Siempre</small></article>
            <article><span>+1</span><strong>Shielding</strong><small>Siempre</small></article>
            <article><span>+1</span><strong>Fishing</strong><small>Siempre</small></article>
            <article class="reset-skill-card--special"><span>+1</span><strong>Critical Damage</strong><small>Siempre</small></article>
            <article class="reset-skill-card--special"><span>+1</span><strong>Life Leech Amount</strong><small>Siempre</small></article>
            <article class="reset-skill-card--special"><span>+1</span><strong>Mana Leech Amount</strong><small>Siempre</small></article>
            <article class="reset-skill-card--special"><span>+1</span><strong>Critical Chance</strong><small>Siempre</small></article>
        </div>

        <div class="reset-fist-calculator">
            <label>
                <span>Fist actual</span>
                <input type="range" min="10" max="170" value="100" data-fist-skill>
            </label>
            <div><small>Valor actual</small><strong data-fist-current>100</strong></div>
            <div><small>Despu&eacute;s del reset</small><strong data-fist-next>101</strong></div>
            <p data-fist-message>Tu Fist todav&iacute;a puede aumentar con resets.</p>
        </div>
    </section>

    <section class="reset-section reset-projection" id="projection" data-reset-section>
        <div class="reset-heading">
            <span class="reset-heading__number">05</span>
            <div>
                <span class="reset-kicker">Proyecta tu personaje</span>
                <h2>Simulador de progreso</h2>
                <p>Calcula las mejoras acumuladas durante varios resets.</p>
            </div>
        </div>

        <div class="reset-projection__controls">
            <label>
                <span>Cantidad de resets <output data-projection-resets>10</output></span>
                <input type="range" min="1" max="100" value="10" data-projection-range>
            </label>
            <label>
                <span>Capacidad inicial</span>
                <input type="number" min="1" max="999999" value="1000" data-base-capacity>
            </label>
        </div>

        <div class="reset-projection__results">
            <article><small>HP permanente</small><strong data-projection-hp>+5,000</strong><span>+500 por reset</span></article>
            <article><small>Mana permanente</small><strong data-projection-mana>+5,000</strong><span>+500 por reset</span></article>
            <article><small>Capacidad proyectada</small><strong data-projection-capacity>1,629</strong><span data-projection-capacity-gain>+629 acumulado</span></article>
            <article><small>Skills generales</small><strong data-projection-skills>+10</strong><span>En cada skill sin l&iacute;mite especial</span></article>
            <article><small>Reset Coins</small><strong data-projection-reset-coins>10</strong><span>Una por reset</span></article>
            <article><small>Red Diamond Coins</small><strong data-projection-red-coins>100</strong><span>Diez por reset</span></article>
        </div>

        <div class="reset-projection__note">
            La capacidad aumenta 5% sobre su valor actual en cada ciclo, por eso el resultado
            es compuesto. HP, mana, skills y monedas aumentan de forma lineal.
        </div>
    </section>

    <section class="reset-section" id="rewards" data-reset-section>
        <div class="reset-heading">
            <span class="reset-heading__number">06</span>
            <div>
                <span class="reset-kicker">Recompensa inmediata</span>
                <h2>Items por reset</h2>
                <p>Recibes ambos items autom&aacute;ticamente al completar cada ciclo.</p>
            </div>
        </div>

        <div class="reset-rewards">
            <article>
                <div class="reset-reward-image">
                    <span>RC</span>
                    <img src="https://mortera-world.com/images/items/37317.gif" alt="Reset Coin" loading="lazy">
                </div>
                <span class="reset-reward-quantity">x1</span>
                <div><span class="reset-kicker">Por cada reset</span><h3>Reset Coin</h3><p>Moneda principal ligada al sistema de resets.</p></div>
            </article>
            <article>
                <div class="reset-reward-image reset-reward-image--red">
                    <span>RD</span>
                    <img src="https://mortera-world.com/images/items/61761.gif" alt="Red Diamond Coin" loading="lazy">
                </div>
                <span class="reset-reward-quantity">x10</span>
                <div><span class="reset-kicker">Por cada reset</span><h3>Red Diamond Coin</h3><p>Diez monedas especiales entregadas autom&aacute;ticamente.</p></div>
            </article>
        </div>

        <div class="reset-ascension-callout">
            <div class="reset-ascension-callout__count"><span>100</span><small>resets</small></div>
            <div>
                <span class="reset-kicker">El siguiente paso</span>
                <h3>Desbloquea Ascension</h3>
                <p>Cuando alcances 100 resets, puedes comenzar un renacimiento mucho m&aacute;s poderoso.</p>
            </div>
            <a href="<?= getLink('ascension'); ?>">Ver Ascension</a>
        </div>

        <div class="reset-final-tip">
            <strong>&iquest;El comando no funciona?</strong>
            <span>Revisa PZ, battle, red skull y luego confirma tu nivel requerido en la tabla de stages.</span>
            <button type="button" data-reset-link="eligibility">Comprobar ahora</button>
        </div>
    </section>
</div>

<script>
(function () {
    var page = document.querySelector('.reset-page');
    if (!page) {
        return;
    }

    var links = page.querySelectorAll('[data-reset-link]');
    var sections = page.querySelectorAll('[data-reset-section]');
    links.forEach(function (button) {
        button.addEventListener('click', function () {
            var target = document.getElementById(button.getAttribute('data-reset-link'));
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
                        button.getAttribute('data-reset-link') === entry.target.id
                    );
                });
            });
        }, { rootMargin: '-20% 0px -65%', threshold: 0 });
        sections.forEach(function (section) { observer.observe(section); });
    }

    var copyButton = page.querySelector('[data-copy-reset]');
    copyButton.addEventListener('click', function () {
        var label = page.querySelector('[data-copy-reset-label]');
        var finish = function () {
            label.textContent = 'Copiado';
            window.setTimeout(function () { label.textContent = 'Copiar'; }, 1500);
        };
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText('!reset').then(finish);
        } else {
            finish();
        }
    });

    var stages = [
        { max: 40, level: 3000, range: 'Resets 0 a 40', title: 'Primeros ciclos', copy: 'Mientras tengas 40 resets o menos, necesitas nivel 3,000 para continuar.' },
        { max: 50, level: 5000, range: 'Resets 41 a 50', title: 'Progresi\u00f3n creciente', copy: 'El requisito sube a nivel 5,000 durante este tramo.' },
        { max: 60, level: 8000, range: 'Resets 51 a 60', title: 'Preparaci\u00f3n avanzada', copy: 'Necesitas nivel 8,000; conviene preparar set y supplies.' },
        { max: 70, level: 10000, range: 'Resets 61 a 70', title: 'Progresi\u00f3n media', copy: 'El siguiente reset requiere alcanzar nivel 10,000.' },
        { max: 80, level: 12000, range: 'Resets 71 a 80', title: 'Progresi\u00f3n alta', copy: 'El requisito aumenta a nivel 12,000.' },
        { max: 90, level: 15000, range: 'Resets 81 a 90', title: 'Farmeo intensivo', copy: 'El ritmo se vuelve m\u00e1s pesado con nivel 15,000 requerido.' },
        { max: 100, level: 20000, range: 'Resets 91 a 100', title: 'Fase de endgame', copy: 'El tramo final exige nivel 20,000 para cada reset.' }
    ];

    function stageForResets(resets) {
        for (var i = 0; i < stages.length; i += 1) {
            if (resets <= stages[i].max) {
                return stages[i];
            }
        }
        return stages[stages.length - 1];
    }

    var currentResets = page.querySelector('[data-current-resets]');
    var currentLevel = page.querySelector('[data-current-level]');
    var conditions = page.querySelectorAll('[data-reset-condition]');

    function format(value) {
        return Math.round(value).toLocaleString('en-US');
    }

    function updateEligibility() {
        var resets = Math.max(0, parseInt(currentResets.value, 10) || 0);
        var level = Math.max(0, parseInt(currentLevel.value, 10) || 0);
        var stage = stageForResets(resets);
        var conditionsReady = Array.prototype.every.call(conditions, function (item) {
            return item.checked;
        });
        var levelReady = level >= stage.level;
        var progress = Math.min(100, (level / stage.level) * 100);
        var ready = conditionsReady && levelReady;

        page.querySelector('[data-required-level]').textContent = format(stage.level);
        page.querySelector('[data-current-level-label]').textContent = 'Nivel ' + format(level);
        page.querySelector('[data-progress-percent]').textContent = Math.floor(progress) + '%';
        page.querySelector('[data-level-progress-bar]').style.width = progress + '%';
        page.querySelector('[data-cycle-level]').textContent = 'Lv. ' + format(stage.level);
        page.querySelector('[data-cycle-stage]').textContent = stage.title;

        var result = page.querySelector('[data-eligibility-result]');
        result.classList.toggle('is-ready', ready);
        page.querySelector('[data-eligibility-pill]').textContent = ready ? 'Listo' : 'Pendiente';
        page.querySelector('[data-eligibility-title]').textContent = ready
            ? 'Puedes usar !reset'
            : (levelReady ? 'Completa las condiciones' : 'A\u00fan falta nivel');
        page.querySelector('[data-eligibility-message]').textContent = ready
            ? 'Tu personaje cumple nivel, PZ, battle y red skull.'
            : (!levelReady
                ? 'Necesitas ' + format(stage.level - level) + ' niveles adicionales.'
                : 'Marca las tres condiciones para confirmar tu estado.');
    }

    currentResets.addEventListener('input', updateEligibility);
    currentLevel.addEventListener('input', updateEligibility);
    conditions.forEach(function (item) { item.addEventListener('change', updateEligibility); });

    var stageButtons = page.querySelectorAll('[data-stage-level]');
    var stageTitles = ['Primeros ciclos', 'Progresi\u00f3n creciente', 'Preparaci\u00f3n avanzada', 'Progresi\u00f3n media', 'Progresi\u00f3n alta', 'Farmeo intensivo', 'Fase de endgame'];
    var stageCopies = [
        'Mientras tengas 40 resets o menos, necesitas nivel 3,000 para continuar.',
        'El requisito sube a nivel 5,000 durante este tramo.',
        'Necesitas nivel 8,000; conviene preparar set y supplies.',
        'El siguiente reset requiere alcanzar nivel 10,000.',
        'El requisito aumenta a nivel 12,000.',
        'El ritmo se vuelve m\u00e1s pesado con nivel 15,000 requerido.',
        'El tramo final exige nivel 20,000 para cada reset.'
    ];

    stageButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            stageButtons.forEach(function (item) { item.classList.toggle('is-active', item === button); });
            var level = parseInt(button.getAttribute('data-stage-level'), 10);
            var previousMax = index === 0 ? 0 : parseInt(stageButtons[index - 1].getAttribute('data-stage-max'), 10) + 1;
            var max = parseInt(button.getAttribute('data-stage-max'), 10);
            page.querySelector('[data-stage-display-level]').textContent = format(level);
            page.querySelector('[data-stage-display-range]').textContent = 'Resets ' + previousMax + ' a ' + max;
            page.querySelector('[data-stage-display-title]').textContent = stageTitles[index];
            page.querySelector('[data-stage-display-copy]').textContent = stageCopies[index];
            page.querySelector('[data-stage-bar]').style.width = (((index + 1) / stageButtons.length) * 100) + '%';
        });
    });

    var fistRange = page.querySelector('[data-fist-skill]');
    function updateFist() {
        var fist = parseInt(fistRange.value, 10);
        var next = fist < 150 ? fist + 1 : fist;
        page.querySelector('[data-fist-current]').textContent = fist;
        page.querySelector('[data-fist-next]').textContent = next;
        page.querySelector('[data-fist-message]').textContent = fist < 150
            ? 'Tu Fist todav\u00eda puede aumentar con resets.'
            : 'Fist ya no aumenta porque alcanz\u00f3 150 o m\u00e1s.';
    }
    fistRange.addEventListener('input', updateFist);

    var projectionRange = page.querySelector('[data-projection-range]');
    var baseCapacity = page.querySelector('[data-base-capacity]');
    function updateProjection() {
        var resets = parseInt(projectionRange.value, 10);
        var base = Math.max(1, parseFloat(baseCapacity.value) || 1);
        var projectedCapacity = base * Math.pow(1.05, resets);

        page.querySelector('[data-projection-resets]').textContent = resets;
        page.querySelector('[data-projection-hp]').textContent = '+' + format(resets * 500);
        page.querySelector('[data-projection-mana]').textContent = '+' + format(resets * 500);
        page.querySelector('[data-projection-capacity]').textContent = format(projectedCapacity);
        page.querySelector('[data-projection-capacity-gain]').textContent =
            '+' + format(projectedCapacity - base) + ' acumulado';
        page.querySelector('[data-projection-skills]').textContent = '+' + resets;
        page.querySelector('[data-projection-reset-coins]').textContent = format(resets);
        page.querySelector('[data-projection-red-coins]').textContent = format(resets * 10);
    }
    projectionRange.addEventListener('input', updateProjection);
    baseCapacity.addEventListener('input', updateProjection);

    updateEligibility();
    updateFist();
    updateProjection();
}());
</script>

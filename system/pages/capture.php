<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Capture System';
?>

<link rel="stylesheet" href="/tools/capture-page.css?v=20260606">

<div class="capture-page" id="capture-top">
    <section class="capture-hero">
        <div class="capture-hero__copy">
            <span class="capture-eyebrow">Captura, invoca y evoluciona</span>
            <h1>Capture System</h1>
            <p>
                Convierte criaturas en compa&ntilde;eros persistentes. Cada Pok&eacute;ball conserva
                su vida, nivel, experiencia y upgrades para acompa&ntilde;arte en una progresi&oacute;n
                que no termina al guardarla.
            </p>
            <div class="capture-hero__tags">
                <span>4 tipos de Pok&eacute;ball</span>
                <span>1 summon m&aacute;ximo</span>
                <span>Nivel m&aacute;ximo 100000</span>
            </div>
        </div>

        <div class="capture-orbit" aria-hidden="true">
            <div class="capture-orbit__line"></div>
            <div class="capture-orbit__ball">
                <span></span>
            </div>
            <i class="capture-orbit__dot capture-orbit__dot--one"></i>
            <i class="capture-orbit__dot capture-orbit__dot--two"></i>
            <i class="capture-orbit__dot capture-orbit__dot--three"></i>
        </div>
    </section>

    <div class="capture-summary">
        <article>
            <span>01</span>
            <div><strong>Captura</strong><small>Lanza una ball a un monstruo v&aacute;lido.</small></div>
        </article>
        <article>
            <span>02</span>
            <div><strong>Invoca</strong><small>Usa la filled ball para llamar a tu criatura.</small></div>
        </article>
        <article>
            <span>03</span>
            <div><strong>Entrena</strong><small>Gana experiencia y aumenta sus stats.</small></div>
        </article>
        <article>
            <span>04</span>
            <div><strong>Mejora</strong><small>Aplica upgrades permanentes de HP y ATK.</small></div>
        </article>
    </div>

    <nav class="capture-nav" aria-label="Secciones de Capture System">
        <button type="button" class="is-active" data-capture-link="balls">Pok&eacute;balls</button>
        <button type="button" data-capture-link="calculator">Calculador</button>
        <button type="button" data-capture-link="process">Captura</button>
        <button type="button" data-capture-link="filled">Filled Ball</button>
        <button type="button" data-capture-link="summon">Summon</button>
        <button type="button" data-capture-link="progression">Progresi&oacute;n</button>
        <button type="button" data-capture-link="states">Estados</button>
    </nav>

    <section class="capture-section" id="balls" data-capture-section>
        <div class="capture-heading">
            <span class="capture-heading__number">01</span>
            <div>
                <span class="capture-kicker">Elige tu herramienta</span>
                <h2>Tipos de Pok&eacute;balls</h2>
                <p>Cada ball tiene una probabilidad base y un efecto visual distinto al lanzarla.</p>
            </div>
        </div>

        <div class="capture-ball-grid">
            <article class="capture-ball-card capture-ball-card--basic">
                <div class="capture-ball-card__visual">
                    <div class="capture-css-ball"><i></i></div>
                    <img src="https://mortera-world.com/images/items/61587.gif" alt="Basic Pokeball" loading="lazy">
                </div>
                <span class="capture-ball-card__rate">1%</span>
                <h3>Basic Pok&eacute;ball</h3>
                <p>Para criaturas comunes. Su chance se multiplica por Bestiary Stars.</p>
                <div class="capture-ball-card__meta"><span>Magic Blue</span><span>Rate x1</span></div>
                <small>Sir Elixion y Store</small>
            </article>

            <article class="capture-ball-card capture-ball-card--great">
                <div class="capture-ball-card__visual">
                    <div class="capture-css-ball"><i></i></div>
                    <img src="https://mortera-world.com/images/items/61588.gif" alt="Great Pokeball" loading="lazy">
                </div>
                <span class="capture-ball-card__rate">2%</span>
                <h3>Great Pok&eacute;ball</h3>
                <p>Ideal para criaturas intermedias. Su chance se multiplica por Bestiary Stars.</p>
                <div class="capture-ball-card__meta"><span>Magic Green</span><span>Rate x2</span></div>
                <small>Sir Elixion y Store</small>
            </article>

            <article class="capture-ball-card capture-ball-card--ultra">
                <div class="capture-ball-card__visual">
                    <div class="capture-css-ball"><i></i></div>
                    <img src="https://mortera-world.com/images/items/61589.gif" alt="Ultra Pokeball" loading="lazy">
                </div>
                <span class="capture-ball-card__rate">4%</span>
                <h3>Ultra Pok&eacute;ball</h3>
                <p>Creada para objetivos dif&iacute;ciles. Su chance se multiplica por Bestiary Stars.</p>
                <div class="capture-ball-card__meta"><span>Magic Red</span><span>Rate x4</span></div>
                <small>Sir Elixion y Store</small>
            </article>

            <article class="capture-ball-card capture-ball-card--master">
                <div class="capture-ball-card__visual">
                    <div class="capture-css-ball"><i></i></div>
                    <img src="https://mortera-world.com/images/items/61590.gif" alt="Master Pokeball" loading="lazy">
                </div>
                <span class="capture-ball-card__rate">100%</span>
                <h3>Master Pok&eacute;ball</h3>
                <p>Captura garantizada. Ignora Bestiary Stars y el l&iacute;mite de captura de bosses.</p>
                <div class="capture-ball-card__meta"><span>Teleport</span><span>Garantizada</span></div>
                <small>Store</small>
            </article>
        </div>
    </section>

    <section class="capture-section capture-calculator" id="calculator" data-capture-section>
        <div class="capture-heading">
            <span class="capture-heading__number">02</span>
            <div>
                <span class="capture-kicker">Conoce tus probabilidades</span>
                <h2>Calculador de captura</h2>
                <p>Selecciona la ball, las estrellas del objetivo y si se trata de un boss.</p>
            </div>
        </div>

        <div class="capture-calculator__layout">
            <div class="capture-calculator__controls">
                <fieldset>
                    <legend>Pok&eacute;ball</legend>
                    <div class="capture-choice-grid" data-ball-choices>
                        <button type="button" data-ball="basic" data-rate="0.01" class="is-active">Basic <span>1%</span></button>
                        <button type="button" data-ball="great" data-rate="0.02">Great <span>2%</span></button>
                        <button type="button" data-ball="ultra" data-rate="0.04">Ultra <span>4%</span></button>
                        <button type="button" data-ball="master" data-rate="1">Master <span>100%</span></button>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Bestiary Stars</legend>
                    <div class="capture-star-picker" data-star-picker>
                        <button type="button" data-stars="1" data-multiplier="1" class="is-active" aria-label="1 estrella">&#9733;</button>
                        <button type="button" data-stars="2" data-multiplier="0.7" aria-label="2 estrellas">&#9733;</button>
                        <button type="button" data-stars="3" data-multiplier="0.5" aria-label="3 estrellas">&#9733;</button>
                        <button type="button" data-stars="4" data-multiplier="0.3" aria-label="4 estrellas">&#9733;</button>
                        <button type="button" data-stars="5" data-multiplier="0.1" aria-label="5 estrellas">&#9733;</button>
                    </div>
                    <small data-star-description>1 estrella: multiplicador x1.0</small>
                </fieldset>

                <label class="capture-boss-toggle">
                    <input type="checkbox" data-boss-toggle>
                    <span></span>
                    <div>
                        <strong>El objetivo es un Boss</strong>
                        <small>La chance normal no puede superar 5%.</small>
                    </div>
                </label>
            </div>

            <div class="capture-calculator__result">
                <span class="capture-calculator__label">Chance final</span>
                <strong data-chance-result>1.00%</strong>
                <div class="capture-chance-ring" style="--chance: 1" data-chance-ring>
                    <span data-chance-ring-label>1%</span>
                </div>
                <p data-chance-formula>1% base &times; 1.0 por estrellas</p>
                <div class="capture-attempts">
                    <span>Promedio estad&iacute;stico</span>
                    <strong data-average-attempts>~100 lanzamientos</strong>
                </div>
            </div>
        </div>

        <div class="capture-star-table">
            <div><span>1&#9733;</span><strong>x1.0</strong><small>Ultra: 4%</small></div>
            <div><span>2&#9733;</span><strong>x0.7</strong><small>Ultra: 2.8%</small></div>
            <div><span>3&#9733;</span><strong>x0.5</strong><small>Ultra: 2%</small></div>
            <div><span>4&#9733;</span><strong>x0.3</strong><small>Ultra: 1.2%</small></div>
            <div><span>5&#9733;</span><strong>x0.1</strong><small>Ultra: 0.4%</small></div>
        </div>

        <div class="capture-formula">
            <strong>Chance final</strong>
            <span>=</span>
            <code>chance base &times; multiplicador de estrellas</code>
            <small>Master Pok&eacute;ball siempre conserva el 100%.</small>
        </div>
    </section>

    <section class="capture-section" id="process" data-capture-section>
        <div class="capture-heading">
            <span class="capture-heading__number">03</span>
            <div>
                <span class="capture-kicker">De objetivo a compa&ntilde;ero</span>
                <h2>Proceso de captura</h2>
                <p>Avanza por cada paso para entender qu&eacute; ocurre al lanzar una Pok&eacute;ball.</p>
            </div>
        </div>

        <div class="capture-process" data-capture-process>
            <div class="capture-process__steps">
                <button type="button" class="is-active" data-process-step="0"><span>1</span>Objetivo</button>
                <button type="button" data-process-step="1"><span>2</span>Registro</button>
                <button type="button" data-process-step="2"><span>3</span>C&aacute;lculo</button>
                <button type="button" data-process-step="3"><span>4</span>Consumo</button>
                <button type="button" data-process-step="4"><span>5</span>Resultado</button>
                <button type="button" data-process-step="5"><span>6</span>Fallo</button>
            </div>
            <div class="capture-process__panel">
                <span data-process-count>Paso 1 de 6</span>
                <h3 data-process-title>Elige un monstruo v&aacute;lido</h3>
                <p data-process-text>
                    El objetivo no puede ser un player, un summon ni una criatura inv&aacute;lida.
                </p>
                <div class="capture-process__actions">
                    <button type="button" data-process-prev disabled>Anterior</button>
                    <button type="button" data-process-next>Siguiente</button>
                </div>
            </div>
        </div>

        <div class="capture-warning">
            <strong>La Pok&eacute;ball siempre se consume.</strong>
            <span>Si la captura falla, existe un 50% de probabilidad de que la criatura huya y desaparezca.</span>
        </div>
    </section>

    <section class="capture-section" id="filled" data-capture-section>
        <div class="capture-heading">
            <span class="capture-heading__number">04</span>
            <div>
                <span class="capture-kicker">Persistencia completa</span>
                <h2>Qu&eacute; guarda una Filled Pok&eacute;ball</h2>
                <p>La criatura conserva su identidad y progreso incluso despu&eacute;s de guardarla.</p>
            </div>
        </div>

        <div class="capture-filled-layout">
            <div class="capture-filled-card">
                <div class="capture-filled-card__top">
                    <div class="capture-mini-ball"><span></span></div>
                    <div>
                        <small>Filled Pok&eacute;ball</small>
                        <h3>Creature [Lv 1]</h3>
                    </div>
                    <span class="capture-status capture-status--available">Available</span>
                </div>
                <div class="capture-filled-card__health">
                    <div><span>Health</span><strong>100 / 100</strong></div>
                    <i><span></span></i>
                </div>
                <div class="capture-filled-card__stats">
                    <div><small>EXP</small><strong>0 / 100</strong></div>
                    <div><small>HP Upgrade</small><strong>+0</strong></div>
                    <div><small>ATK Upgrade</small><strong>+0</strong></div>
                </div>
            </div>

            <div class="capture-data-grid">
                <article><span>01</span><div><strong>Criatura</strong><small>Nombre de la criatura capturada.</small></div></article>
                <article><span>02</span><div><strong>Vida actual</strong><small>Se conserva al invocar y guardar.</small></div></article>
                <article><span>03</span><div><strong>Vida m&aacute;xima base</strong><small>HP original, antes del escalado.</small></div></article>
                <article><span>04</span><div><strong>Vida m&aacute;xima</strong><small>HP escalado por nivel y upgrades.</small></div></article>
                <article><span>05</span><div><strong>Nivel y experiencia</strong><small>Comienza en nivel 1 con 0 EXP.</small></div></article>
                <article><span>06</span><div><strong>HP / ATK upgrades</strong><small>Stacks permanentes de mejora.</small></div></article>
                <article><span>07</span><div><strong>Disponibilidad</strong><small>Indica si est&aacute; lista para invocar.</small></div></article>
                <article><span>08</span><div><strong>Cooldown</strong><small>Tiempo de recuperaci&oacute;n si muri&oacute;.</small></div></article>
                <article><span>09</span><div><strong>summonedId</strong><small>ID mientras la criatura est&aacute; invocada.</small></div></article>
            </div>
        </div>
    </section>

    <section class="capture-section" id="summon" data-capture-section>
        <div class="capture-heading">
            <span class="capture-heading__number">05</span>
            <div>
                <span class="capture-kicker">Un solo toque</span>
                <h2>Invocar y guardar</h2>
                <p>La filled ball funciona como toggle: un uso invoca y el siguiente guarda.</p>
            </div>
        </div>

        <div class="capture-summon-demo" data-summon-demo>
            <div class="capture-summon-scene">
                <div class="capture-trainer">
                    <span></span>
                    <small>Player</small>
                </div>
                <div class="capture-summon-line"></div>
                <div class="capture-creature" data-demo-creature>
                    <div><span></span><i></i></div>
                    <strong>Creature [Lv 1]</strong>
                    <small data-demo-creature-state>Guardada en la ball</small>
                </div>
            </div>
            <div class="capture-summon-controls">
                <span class="capture-status capture-status--available" data-demo-status>Available</span>
                <h3 data-demo-title>Criatura guardada</h3>
                <p data-demo-copy>Usa la Pok&eacute;ball para invocarla en una de las 8 casillas libres a tu alrededor.</p>
                <button type="button" data-summon-toggle>Invocar criatura</button>
            </div>
        </div>

        <div class="capture-rule-grid">
            <article><strong>1 summon m&aacute;ximo</strong><p>No puedes tener dos criaturas invocadas al mismo tiempo.</p></article>
            <article><strong>8 casillas cercanas</strong><p>Busca una posici&oacute;n libre alrededor del player. Sin espacio, falla.</p></article>
            <article><strong>Vida persistente</strong><p>Al guardarla conserva su vida actual para la pr&oacute;xima invocaci&oacute;n.</p></article>
            <article><strong>Nombre con nivel</strong><p>La criatura aparece como <b>Nombre [Lv X]</b>.</p></article>
        </div>

        <div class="capture-cooldown">
            <div class="capture-cooldown__clock"><span>30</span><small>min</small></div>
            <div>
                <span class="capture-kicker">Si tu summon muere</span>
                <h3>Tiempo de recuperaci&oacute;n</h3>
                <p>
                    La ball pasa a <strong>Recovering</strong>, la vida queda en 0 y no puede
                    invocarse durante 30 minutos. Al terminar vuelve a <strong>Available</strong>
                    con la vida restaurada al 100%.
                </p>
            </div>
        </div>
    </section>

    <section class="capture-section" id="progression" data-capture-section>
        <div class="capture-heading">
            <span class="capture-heading__number">06</span>
            <div>
                <span class="capture-kicker">Entrena sin l&iacute;mites</span>
                <h2>Niveles y upgrades</h2>
                <p>Proyecta el crecimiento de una criatura usando nivel y stacks de mejora.</p>
            </div>
        </div>

        <div class="capture-growth">
            <div class="capture-growth__controls">
                <label>
                    <span>Nivel de la criatura <output data-level-output>1</output></span>
                    <input type="range" min="1" max="100" value="1" data-level-range>
                </label>
                <label>
                    <span>HP Upgrades <output data-hp-output>0</output></span>
                    <input type="range" min="0" max="50" value="0" data-hp-range>
                </label>
                <label>
                    <span>ATK Upgrades <output data-atk-output>0</output></span>
                    <input type="range" min="0" max="50" value="0" data-atk-range>
                </label>
                <p>La proyecci&oacute;n usa una criatura de ejemplo con 1,000 HP base y 100 de da&ntilde;o base.</p>
            </div>

            <div class="capture-growth__results">
                <article>
                    <small>EXP para el siguiente nivel</small>
                    <strong data-exp-required>100</strong>
                    <span>100 &times; nivel actual</span>
                </article>
                <article>
                    <small>Vida m&aacute;xima proyectada</small>
                    <strong data-health-projection>1,050</strong>
                    <span>+5% por nivel y +1% por HP upgrade</span>
                </article>
                <article>
                    <small>Da&ntilde;o proyectado</small>
                    <strong data-damage-projection>101</strong>
                    <span>+1% por nivel y +1% por ATK upgrade</span>
                </article>
            </div>
        </div>

        <div class="capture-upgrades">
            <article>
                <div class="capture-upgrade-image">
                    <img src="https://mortera-world.com/images/items/61916.gif" alt="HP Upgrade" loading="lazy">
                    <span>HP</span>
                </div>
                <div>
                    <span class="capture-kicker">Item</span>
                    <h3>HP Upgrade</h3>
                    <p>Consume un item y suma <strong>hpUpgrade +1</strong>: +1% de vida m&aacute;xima final por stack.</p>
                    <small>Se obtiene en Store o derrotando criaturas influenced y fiendish.</small>
                </div>
            </article>
            <article>
                <div class="capture-upgrade-image">
                    <img src="https://mortera-world.com/images/items/61917.gif" alt="ATK Upgrade" loading="lazy">
                    <span>ATK</span>
                </div>
                <div>
                    <span class="capture-kicker">Item</span>
                    <h3>ATK Upgrade</h3>
                    <p>Consume un item y suma <strong>atkUpgrade +1</strong>: +1% de da&ntilde;o final por stack.</p>
                    <small>Se obtiene en Store o derrotando criaturas influenced y fiendish.</small>
                </div>
            </article>
        </div>

        <div class="capture-level-rules">
            <div><strong>EXP obtenida</strong><span>Es igual a la experiencia del monstruo derrotado por ti o tu summon.</span></div>
            <div><strong>Escalado de vida</strong><span>+5% por nivel aplicado sobre la vida base.</span></div>
            <div><strong>Escalado de da&ntilde;o</strong><span>+1% por nivel aplicado como multiplicador al da&ntilde;o.</span></div>
            <div><strong>Nivel m&aacute;ximo</strong><span>MAX_LEVEL = 100000.</span></div>
        </div>
    </section>

    <section class="capture-section" id="states" data-capture-section>
        <div class="capture-heading">
            <span class="capture-heading__number">07</span>
            <div>
                <span class="capture-kicker">Lee tu Pok&eacute;ball</span>
                <h2>Estados visibles</h2>
                <p>La descripci&oacute;n te permite saber inmediatamente si puedes usar tu criatura.</p>
            </div>
        </div>

        <div class="capture-state-grid">
            <article class="capture-state-card capture-state-card--available">
                <span class="capture-status capture-status--available">Available</span>
                <h3>Lista para invocar</h3>
                <p>La criatura est&aacute; guardada, recuperada y disponible para salir.</p>
            </article>
            <article class="capture-state-card capture-state-card--summoned">
                <span class="capture-status capture-status--summoned">Currently summoned</span>
                <h3>Actualmente invocada</h3>
                <p>La criatura est&aacute; afuera. Usa la misma ball para volver a guardarla.</p>
            </article>
            <article class="capture-state-card capture-state-card--recovering">
                <span class="capture-status capture-status--recovering">Recovering</span>
                <h3>En recuperaci&oacute;n</h3>
                <p>La criatura muri&oacute;. La descripci&oacute;n muestra los minutos restantes.</p>
            </article>
        </div>

        <div class="capture-tip">
            <div class="capture-mini-ball"><span></span></div>
            <div>
                <strong>Tip de progresi&oacute;n</strong>
                <p>
                    Revisa la descripci&oacute;n de cada ball para comparar criatura, vida, nivel,
                    experiencia, upgrades y estado antes de elegir tu compa&ntilde;ero.
                </p>
            </div>
            <button type="button" data-capture-link="calculator">Calcular captura</button>
        </div>
    </section>
</div>

<script>
(function () {
    var page = document.querySelector('.capture-page');
    if (!page) {
        return;
    }

    var navLinks = page.querySelectorAll('[data-capture-link]');
    var sections = page.querySelectorAll('[data-capture-section]');

    navLinks.forEach(function (button) {
        button.addEventListener('click', function () {
            var target = document.getElementById(button.getAttribute('data-capture-link'));
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
                navLinks.forEach(function (button) {
                    button.classList.toggle(
                        'is-active',
                        button.getAttribute('data-capture-link') === entry.target.id
                    );
                });
            });
        }, { rootMargin: '-20% 0px -65%', threshold: 0 });

        sections.forEach(function (section) {
            observer.observe(section);
        });
    }

    var selectedRate = 0.01;
    var selectedBall = 'basic';
    var starMultiplier = 1;
    var selectedStars = 1;
    var bossToggle = page.querySelector('[data-boss-toggle]');

    function updateChance() {
        var isMaster = selectedBall === 'master';
        var chance = isMaster ? 1 : selectedRate * starMultiplier;
        var bossLimited = false;

        if (!isMaster && bossToggle.checked && chance > 0.05) {
            chance = 0.05;
            bossLimited = true;
        }

        var percent = chance * 100;
        var decimals = percent < 1 ? 2 : (percent % 1 === 0 ? 0 : 1);
        var display = percent.toFixed(decimals) + '%';
        var average = Math.max(1, Math.ceil(1 / chance));

        page.querySelector('[data-chance-result]').textContent = display;
        page.querySelector('[data-chance-ring-label]').textContent = display;
        page.querySelector('[data-chance-ring]').style.setProperty('--chance', Math.min(100, percent));
        page.querySelector('[data-average-attempts]').textContent =
            isMaster ? 'Captura garantizada' : '~' + average + ' lanzamientos';

        var formula = isMaster
            ? 'Master Pok\u00e9ball ignora estrellas y boss cap'
            : (selectedRate * 100) + '% base \u00d7 ' + starMultiplier.toFixed(1) + ' por estrellas';
        if (bossLimited) {
            formula += ' \u00b7 limitado a 5% por Boss';
        }
        page.querySelector('[data-chance-formula]').textContent = formula;
    }

    page.querySelectorAll('[data-ball]').forEach(function (button) {
        button.addEventListener('click', function () {
            selectedBall = button.getAttribute('data-ball');
            selectedRate = parseFloat(button.getAttribute('data-rate'));
            page.querySelectorAll('[data-ball]').forEach(function (item) {
                item.classList.toggle('is-active', item === button);
            });
            updateChance();
        });
    });

    page.querySelectorAll('[data-stars]').forEach(function (button) {
        button.addEventListener('click', function () {
            selectedStars = parseInt(button.getAttribute('data-stars'), 10);
            starMultiplier = parseFloat(button.getAttribute('data-multiplier'));
            page.querySelectorAll('[data-stars]').forEach(function (item) {
                item.classList.toggle(
                    'is-active',
                    parseInt(item.getAttribute('data-stars'), 10) <= selectedStars
                );
            });
            page.querySelector('[data-star-description]').textContent =
                selectedStars + (selectedStars === 1 ? ' estrella' : ' estrellas') +
                ': multiplicador x' + starMultiplier.toFixed(1);
            updateChance();
        });
    });

    bossToggle.addEventListener('change', updateChance);

    var processData = [
        ['Elige un monstruo v\u00e1lido', 'El objetivo no puede ser un player, un summon ni una criatura inv\u00e1lida.'],
        ['Se registra tu intento', 'El sistema cuenta cu\u00e1ntas Pok\u00e9balls has lanzado a esa criatura usando su raceId.'],
        ['Se calcula la chance final', 'La probabilidad base se combina con Bestiary Stars y, si corresponde, con el l\u00edmite de Boss.'],
        ['La Pok\u00e9ball se consume', 'El item desaparece tanto si la captura tiene \u00e9xito como si falla.'],
        ['Captura completada', 'Recibes una filled Pok\u00e9ball con la criatura dentro y el monstruo se elimina del mapa.'],
        ['Si el lanzamiento falla', 'La criatura permanece o tiene 50% de probabilidad de huir y desaparecer.']
    ];
    var processIndex = 0;
    var processButtons = page.querySelectorAll('[data-process-step]');
    var previousButton = page.querySelector('[data-process-prev]');
    var nextButton = page.querySelector('[data-process-next]');

    function showProcessStep(index) {
        processIndex = Math.max(0, Math.min(processData.length - 1, index));
        processButtons.forEach(function (button, buttonIndex) {
            button.classList.toggle('is-active', buttonIndex === processIndex);
            button.classList.toggle('is-complete', buttonIndex < processIndex);
        });
        page.querySelector('[data-process-count]').textContent =
            'Paso ' + (processIndex + 1) + ' de ' + processData.length;
        page.querySelector('[data-process-title]').textContent = processData[processIndex][0];
        page.querySelector('[data-process-text]').textContent = processData[processIndex][1];
        previousButton.disabled = processIndex === 0;
        nextButton.disabled = processIndex === processData.length - 1;
        nextButton.textContent = processIndex === processData.length - 2 ? 'Ver resultado' : 'Siguiente';
    }

    processButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            showProcessStep(parseInt(button.getAttribute('data-process-step'), 10));
        });
    });
    previousButton.addEventListener('click', function () { showProcessStep(processIndex - 1); });
    nextButton.addEventListener('click', function () { showProcessStep(processIndex + 1); });

    var summoned = false;
    var summonToggle = page.querySelector('[data-summon-toggle]');
    summonToggle.addEventListener('click', function () {
        summoned = !summoned;
        page.querySelector('[data-summon-demo]').classList.toggle('is-summoned', summoned);
        page.querySelector('[data-demo-title]').textContent =
            summoned ? 'Criatura invocada' : 'Criatura guardada';
        page.querySelector('[data-demo-copy]').textContent = summoned
            ? 'Usa nuevamente la misma Pok\u00e9ball para guardar la criatura con su vida actual.'
            : 'Usa la Pok\u00e9ball para invocarla en una de las 8 casillas libres a tu alrededor.';
        page.querySelector('[data-demo-creature-state]').textContent =
            summoned ? 'Siguiendo al player' : 'Guardada en la ball';
        summonToggle.textContent = summoned ? 'Guardar criatura' : 'Invocar criatura';

        var status = page.querySelector('[data-demo-status]');
        status.textContent = summoned ? 'Currently summoned' : 'Available';
        status.className = 'capture-status ' +
            (summoned ? 'capture-status--summoned' : 'capture-status--available');
    });

    var levelRange = page.querySelector('[data-level-range]');
    var hpRange = page.querySelector('[data-hp-range]');
    var atkRange = page.querySelector('[data-atk-range]');

    function formatNumber(value) {
        return Math.round(value).toLocaleString('en-US');
    }

    function updateGrowth() {
        var level = parseInt(levelRange.value, 10);
        var hpUpgrades = parseInt(hpRange.value, 10);
        var atkUpgrades = parseInt(atkRange.value, 10);
        var health = 1000 * (1 + (level * 0.05)) * (1 + (hpUpgrades * 0.01));
        var damage = 100 * (1 + (level * 0.01)) * (1 + (atkUpgrades * 0.01));

        page.querySelector('[data-level-output]').textContent = level;
        page.querySelector('[data-hp-output]').textContent = hpUpgrades;
        page.querySelector('[data-atk-output]').textContent = atkUpgrades;
        page.querySelector('[data-exp-required]').textContent = formatNumber(100 * level);
        page.querySelector('[data-health-projection]').textContent = formatNumber(health);
        page.querySelector('[data-damage-projection]').textContent = formatNumber(damage);
    }

    levelRange.addEventListener('input', updateGrowth);
    hpRange.addEventListener('input', updateGrowth);
    atkRange.addEventListener('input', updateGrowth);

    updateChance();
    showProcessStep(0);
    updateGrowth();
}());
</script>

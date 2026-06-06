<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Ascension';
?>

<link rel="stylesheet" href="/tools/ascension-page.css?v=20260606">

<div class="ascension-page" id="ascension-top">
    <section class="ascension-hero">
        <div class="ascension-hero__content">
            <span class="ascension-eyebrow">Sistema de progresi&oacute;n avanzada</span>
            <h1>Ascension</h1>
            <p class="ascension-lead">
                Renace con mayor poder. Reinicia tus resets y vuelve al nivel base a cambio de
                mejoras permanentes, resistencias y recompensas exclusivas.
            </p>

            <div class="ascension-command">
                <span>Comando dentro del juego</span>
                <strong>!ascension</strong>
                <button type="button" data-copy-command aria-label="Copiar comando !ascension">
                    <span data-copy-label>Copiar</span>
                </button>
            </div>
        </div>

        <div class="ascension-emblem" aria-hidden="true">
            <div class="ascension-emblem__ring ascension-emblem__ring--outer"></div>
            <div class="ascension-emblem__ring ascension-emblem__ring--inner"></div>
            <div class="ascension-emblem__core">
                <span>100</span>
                <small>resets</small>
            </div>
            <i class="ascension-spark ascension-spark--one"></i>
            <i class="ascension-spark ascension-spark--two"></i>
            <i class="ascension-spark ascension-spark--three"></i>
        </div>
    </section>

    <div class="ascension-highlights" aria-label="Resumen de Ascension">
        <div>
            <span class="ascension-highlights__icon">R</span>
            <strong>100 resets</strong>
            <small>Requisito m&iacute;nimo</small>
        </div>
        <div>
            <span class="ascension-highlights__icon">8</span>
            <strong>Nivel base</strong>
            <small>Nuevo comienzo</small>
        </div>
        <div>
            <span class="ascension-highlights__icon">+</span>
            <strong>25% HP y mana</strong>
            <small>Mejora permanente</small>
        </div>
        <div>
            <span class="ascension-highlights__icon">S</span>
            <strong>Skills mejorados</strong>
            <small>Bonos de combate</small>
        </div>
    </div>

    <nav class="ascension-nav" aria-label="Secciones de Ascension">
        <button type="button" class="is-active" data-ascension-link="requirements">Requisitos</button>
        <button type="button" data-ascension-link="transformation">Transformaci&oacute;n</button>
        <button type="button" data-ascension-link="bonuses">Bonificaciones</button>
        <button type="button" data-ascension-link="rewards">Recompensas</button>
        <button type="button" data-ascension-link="simulator">Simulador</button>
        <button type="button" data-ascension-link="faq">Preguntas</button>
    </nav>

    <section class="ascension-section" id="requirements" data-ascension-section>
        <div class="ascension-section__heading">
            <span class="ascension-section__number">01</span>
            <div>
                <span class="ascension-kicker">Antes de comenzar</span>
                <h2>Requisitos para ascender</h2>
                <p>Marca cada condici&oacute;n para comprobar si tu personaje est&aacute; listo.</p>
            </div>
        </div>

        <div class="ascension-requirements">
            <label class="ascension-check">
                <input type="checkbox" data-ascension-check>
                <span class="ascension-check__box"></span>
                <span>
                    <strong>100 resets o m&aacute;s</strong>
                    <small>Necesitas al menos 100 resets acumulados.</small>
                </span>
            </label>
            <label class="ascension-check">
                <input type="checkbox" data-ascension-check>
                <span class="ascension-check__box"></span>
                <span>
                    <strong>Sin Red Skull</strong>
                    <small>Un personaje con red skull no puede ascender.</small>
                </span>
            </label>
            <label class="ascension-check">
                <input type="checkbox" data-ascension-check>
                <span class="ascension-check__box"></span>
                <span>
                    <strong>Dentro de Protection Zone</strong>
                    <small>Debes encontrarte dentro de una zona protegida.</small>
                </span>
            </label>
            <label class="ascension-check">
                <input type="checkbox" data-ascension-check>
                <span class="ascension-check__box"></span>
                <span>
                    <strong>Sin Battle</strong>
                    <small>No puedes tener la condici&oacute;n infight activa.</small>
                </span>
            </label>
        </div>

        <div class="ascension-readiness" data-readiness>
            <div class="ascension-readiness__meter"><span data-readiness-bar></span></div>
            <div>
                <strong data-readiness-title>Completa los 4 requisitos</strong>
                <small data-readiness-text>0 de 4 condiciones confirmadas</small>
            </div>
        </div>
    </section>

    <section class="ascension-section" id="transformation" data-ascension-section>
        <div class="ascension-section__heading">
            <span class="ascension-section__number">02</span>
            <div>
                <span class="ascension-kicker">El renacimiento</span>
                <h2>Qu&eacute; cambia al completar Ascension</h2>
                <p>Parte de tu progreso vuelve al inicio, pero el poder obtenido permanece.</p>
            </div>
        </div>

        <div class="ascension-journey">
            <article class="ascension-state ascension-state--before">
                <span class="ascension-state__tag">Antes</span>
                <h3>Fin de un ciclo</h3>
                <div class="ascension-state__value">100+</div>
                <p>Resets acumulados y personaje preparado.</p>
            </article>

            <div class="ascension-journey__arrow" aria-hidden="true">
                <span>Ascender</span>
                <i></i>
            </div>

            <article class="ascension-state ascension-state--after">
                <span class="ascension-state__tag">Despu&eacute;s</span>
                <h3>Nuevo comienzo</h3>
                <div class="ascension-state__value">Lv. 8</div>
                <p>0 resets y mejoras permanentes.</p>
            </article>
        </div>

        <div class="ascension-effect-grid">
            <article>
                <span class="ascension-effect-grid__symbol">0</span>
                <h3>Resets reiniciados</h3>
                <p>Tus resets vuelven a <strong>0</strong>.</p>
            </article>
            <article>
                <span class="ascension-effect-grid__symbol">8</span>
                <h3>Nivel base</h3>
                <p>Tu personaje vuelve al <strong>nivel 8</strong>.</p>
            </article>
            <article>
                <span class="ascension-effect-grid__symbol">HP</span>
                <h3>Vida m&aacute;xima +25%</h3>
                <p>Se multiplica por <strong>1.25</strong> y se redondea hacia abajo.</p>
            </article>
            <article>
                <span class="ascension-effect-grid__symbol">MP</span>
                <h3>Mana m&aacute;ximo +25%</h3>
                <p>Se multiplica por <strong>1.25</strong> y se redondea hacia abajo.</p>
            </article>
        </div>

        <div class="ascension-note">
            La vida y el mana actuales se ajustan al nuevo m&aacute;ximo. Al finalizar ver&aacute;s un
            efecto visual.
        </div>
    </section>

    <section class="ascension-section" id="bonuses" data-ascension-section>
        <div class="ascension-section__heading">
            <span class="ascension-section__number">03</span>
            <div>
                <span class="ascension-kicker">Poder permanente</span>
                <h2>Bonificaciones de Ascension</h2>
                <p>Explora los aumentos de skills y la protecci&oacute;n elemental.</p>
            </div>
        </div>

        <div class="ascension-tabs" data-ascension-tabs>
            <div class="ascension-tabs__buttons" role="tablist">
                <button type="button" class="is-active" role="tab" aria-selected="true" data-ascension-tab="skills">
                    Skills
                </button>
                <button type="button" role="tab" aria-selected="false" data-ascension-tab="protection">
                    Protecciones
                </button>
            </div>

            <div class="ascension-tab-panel is-active" role="tabpanel" data-ascension-panel="skills">
                <div class="ascension-bonus-grid">
                    <article><span>+25</span><strong>Club</strong><small>Incremento fijo</small></article>
                    <article><span>+25</span><strong>Sword</strong><small>Incremento fijo</small></article>
                    <article><span>+25</span><strong>Axe</strong><small>Incremento fijo</small></article>
                    <article><span>+25</span><strong>Distance</strong><small>Incremento fijo</small></article>
                    <article><span>+25</span><strong>Shielding</strong><small>Incremento fijo</small></article>
                    <article><span>+25</span><strong>Fishing</strong><small>Incremento fijo</small></article>
                    <article class="ascension-bonus-grid__major"><span>+500</span><strong>Critical Damage</strong><small>Incremento alto</small></article>
                    <article class="ascension-bonus-grid__major"><span>+500</span><strong>Life Leech Amount</strong><small>Incremento alto</small></article>
                    <article class="ascension-bonus-grid__major"><span>+500</span><strong>Mana Leech Amount</strong><small>Incremento alto</small></article>
                    <article class="ascension-bonus-grid__critical"><span>+100</span><strong>Critical Chance</strong><small>Incremento medio</small></article>
                </div>
            </div>

            <div class="ascension-tab-panel" role="tabpanel" data-ascension-panel="protection" hidden>
                <div class="ascension-protection-intro">
                    <strong>+5 por Ascension</strong>
                    <span>Cada protecci&oacute;n tiene un m&aacute;ximo de 30.</span>
                </div>
                <div class="ascension-protection-grid">
                    <?php
                    $protections = [
                        'Fire', 'Ice', 'Earth', 'Energy', 'Holy', 'Death',
                        'Physical', 'Lifedrain', 'Manadrain', 'Drown', 'Agony'
                    ];
                    foreach ($protections as $protection):
                    ?>
                        <article>
                            <div><strong><?= $protection; ?></strong><span>+5 / 30</span></div>
                            <div class="ascension-protection-bar"><span></span></div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="ascension-section" id="rewards" data-ascension-section>
        <div class="ascension-section__heading">
            <span class="ascension-section__number">04</span>
            <div>
                <span class="ascension-kicker">Bot&iacute;n exclusivo</span>
                <h2>Recompensas de Ascension</h2>
                <p>Items, monedas y cosm&eacute;ticos para celebrar tu nuevo ciclo.</p>
            </div>
        </div>

        <div class="ascension-rewards">
            <article class="ascension-reward">
                <div class="ascension-reward__image">
                    <img src="https://mortera-world.com/images/items/61877.gif" alt="Legendary Box" loading="lazy">
                </div>
                <span class="ascension-reward__quantity">x1</span>
                <h3>Legendary Box</h3>
                <p>Caja de recompensa legendaria.</p>
            </article>
            <article class="ascension-reward">
                <div class="ascension-reward__image">
                    <img src="https://mortera-world.com/images/items/61922.gif" alt="Tier Upgrade 100%" loading="lazy">
                </div>
                <span class="ascension-reward__quantity">x5</span>
                <h3>Tier Upgrade 100%</h3>
                <p>Mejoras de tier con &eacute;xito garantizado.</p>
            </article>
            <article class="ascension-reward">
                <div class="ascension-reward__image">
                    <img src="https://mortera-world.com/images/items/37317.gif" alt="Reset Coins" loading="lazy">
                </div>
                <span class="ascension-reward__quantity">x100</span>
                <h3>Reset Coins</h3>
                <p>Monedas para continuar tu progresi&oacute;n.</p>
            </article>
            <article class="ascension-reward">
                <div class="ascension-reward__image">
                    <img src="https://mortera-world.com/images/items/44782.gif" alt="Red Diamond Coins" loading="lazy">
                </div>
                <span class="ascension-reward__quantity">x100</span>
                <h3>Red Diamond Coins</h3>
                <p>Moneda especial de Mortera.</p>
            </article>
        </div>

        <div class="ascension-cosmetics">
            <div class="ascension-cosmetics__copy">
                <span class="ascension-kicker">Colecci&oacute;n exclusiva</span>
                <h3>Crimson Ascension</h3>
                <p>
                    Desbloquea el outfit exclusivo con sus variantes y el cosm&eacute;tico de montura
                    de Ascension.
                </p>
                <span class="ascension-cosmetics__badge">Recompensa &uacute;nica</span>
            </div>
            <div class="ascension-outfits">
                <figure>
                    <img src="https://mortera-world.com/images/animated-outfits/animoutfit.php?id=2450&amp;addons=0&amp;head=0&amp;body=0&amp;legs=0&amp;feet=0" alt="Crimson Ascension outfit masculino" loading="lazy">
                    <figcaption>Outfit</figcaption>
                </figure>
                <figure>
                    <img src="https://mortera-world.com/images/animated-outfits/animoutfit.php?id=2451&amp;addons=0&amp;head=0&amp;body=0&amp;legs=0&amp;feet=0" alt="Crimson Ascension outfit femenino" loading="lazy">
                    <figcaption>Outfit</figcaption>
                </figure>
            </div>
        </div>
    </section>

    <section class="ascension-section ascension-simulator" id="simulator" data-ascension-section>
        <div class="ascension-section__heading">
            <span class="ascension-section__number">05</span>
            <div>
                <span class="ascension-kicker">Proyecta tu poder</span>
                <h2>Simulador de Ascensions</h2>
                <p>Visualiza las bonificaciones acumuladas despu&eacute;s de varios ciclos.</p>
            </div>
        </div>

        <div class="ascension-simulator__control">
            <label for="ascension-count">Cantidad de Ascensions</label>
            <div>
                <input id="ascension-count" type="range" min="1" max="10" value="1" data-ascension-range>
                <output for="ascension-count" data-ascension-output>1</output>
            </div>
        </div>

        <div class="ascension-simulator__results" aria-live="polite">
            <article>
                <small>Multiplicador de HP / mana</small>
                <strong data-sim-vitals>x1.25</strong>
                <span>Bonificaci&oacute;n compuesta</span>
            </article>
            <article>
                <small>Skills principales</small>
                <strong data-sim-skills>+25</strong>
                <span>Club, sword, axe y m&aacute;s</span>
            </article>
            <article>
                <small>Leech y critical damage</small>
                <strong data-sim-advanced>+500</strong>
                <span>Por cada ciclo completado</span>
            </article>
            <article>
                <small>Protecci&oacute;n elemental</small>
                <strong data-sim-protection>+5</strong>
                <span data-sim-protection-note>25 puntos hasta el m&aacute;ximo</span>
            </article>
        </div>

        <p class="ascension-simulator__disclaimer">
            La vida y el mana usan un aumento compuesto de 25% por ciclo. Las protecciones se
            detienen al alcanzar su m&aacute;ximo de 30.
        </p>
    </section>

    <section class="ascension-section" id="faq" data-ascension-section>
        <div class="ascension-section__heading">
            <span class="ascension-section__number">06</span>
            <div>
                <span class="ascension-kicker">Dudas comunes</span>
                <h2>Preguntas frecuentes</h2>
                <p>Lo esencial antes de escribir el comando.</p>
            </div>
        </div>

        <div class="ascension-faq">
            <details>
                <summary>&iquest;Por qu&eacute; vuelvo al nivel 8?<span></span></summary>
                <p>
                    Ascension funciona como un reborn: reinicia el nivel para repetir la
                    progresi&oacute;n, pero ahora con mejores estad&iacute;sticas permanentes.
                </p>
            </details>
            <details>
                <summary>&iquest;Pierdo todo mi progreso?<span></span></summary>
                <p>
                    No. Se reinician el nivel y los resets. Conservas las mejoras de vida, mana,
                    skills y protecciones obtenidas con Ascension.
                </p>
            </details>
            <details>
                <summary>&iquest;Cu&aacute;ndo conviene ascender?<span></span></summary>
                <p>
                    Cuando alcanzas los 100 resets y quieres dar un salto importante de poder
                    para continuar hacia el endgame.
                </p>
            </details>
            <details>
                <summary>&iquest;Por qu&eacute; no me deja usar el comando?<span></span></summary>
                <p>
                    Revisa que tengas 100 resets, est&eacute;s dentro de PZ, no tengas battle activo
                    y tu personaje no tenga red skull.
                </p>
            </details>
        </div>
    </section>

    <div class="ascension-final-callout">
        <div>
            <span>Cuando cumplas todos los requisitos</span>
            <strong>Escribe <code>!ascension</code> dentro del juego</strong>
        </div>
        <button type="button" data-ascension-link="requirements">Revisar requisitos</button>
    </div>
</div>

<script>
(function () {
    var page = document.querySelector('.ascension-page');
    if (!page) {
        return;
    }

    var links = page.querySelectorAll('[data-ascension-link]');
    var sections = page.querySelectorAll('[data-ascension-section]');

    links.forEach(function (button) {
        button.addEventListener('click', function () {
            var target = document.getElementById(button.getAttribute('data-ascension-link'));
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
                        button.getAttribute('data-ascension-link') === entry.target.id
                    );
                });
            });
        }, { rootMargin: '-20% 0px -65%', threshold: 0 });

        sections.forEach(function (section) {
            observer.observe(section);
        });
    }

    var copyButton = page.querySelector('[data-copy-command]');
    if (copyButton) {
        copyButton.addEventListener('click', function () {
            var label = copyButton.querySelector('[data-copy-label]');
            var finish = function () {
                label.textContent = 'Copiado';
                copyButton.classList.add('is-copied');
                window.setTimeout(function () {
                    label.textContent = 'Copiar';
                    copyButton.classList.remove('is-copied');
                }, 1600);
            };

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText('!ascension').then(finish);
            } else {
                finish();
            }
        });
    }

    var checks = page.querySelectorAll('[data-ascension-check]');
    var readiness = page.querySelector('[data-readiness]');
    var readinessBar = page.querySelector('[data-readiness-bar]');
    var readinessTitle = page.querySelector('[data-readiness-title]');
    var readinessText = page.querySelector('[data-readiness-text]');

    function updateReadiness() {
        var completed = Array.prototype.filter.call(checks, function (check) {
            return check.checked;
        }).length;
        var percentage = (completed / checks.length) * 100;

        readinessBar.style.width = percentage + '%';
        readinessText.textContent = completed + ' de ' + checks.length + ' condiciones confirmadas';
        readiness.classList.toggle('is-ready', completed === checks.length);
        readinessTitle.textContent = completed === checks.length
            ? 'Tu personaje est\u00e1 listo para ascender'
            : 'Completa los 4 requisitos';
    }

    checks.forEach(function (check) {
        check.addEventListener('change', updateReadiness);
    });

    page.querySelectorAll('[data-ascension-tab]').forEach(function (button) {
        button.addEventListener('click', function () {
            var tabName = button.getAttribute('data-ascension-tab');
            page.querySelectorAll('[data-ascension-tab]').forEach(function (tabButton) {
                var isActive = tabButton === button;
                tabButton.classList.toggle('is-active', isActive);
                tabButton.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });
            page.querySelectorAll('[data-ascension-panel]').forEach(function (panel) {
                var isActive = panel.getAttribute('data-ascension-panel') === tabName;
                panel.classList.toggle('is-active', isActive);
                panel.hidden = !isActive;
            });
        });
    });

    var range = page.querySelector('[data-ascension-range]');
    var output = page.querySelector('[data-ascension-output]');
    var vitals = page.querySelector('[data-sim-vitals]');
    var skills = page.querySelector('[data-sim-skills]');
    var advanced = page.querySelector('[data-sim-advanced]');
    var protection = page.querySelector('[data-sim-protection]');
    var protectionNote = page.querySelector('[data-sim-protection-note]');

    function updateSimulator() {
        var count = parseInt(range.value, 10);
        var protectionValue = Math.min(30, count * 5);
        var remaining = Math.max(0, 30 - protectionValue);

        output.value = count;
        output.textContent = count;
        vitals.textContent = 'x' + Math.pow(1.25, count).toFixed(2);
        skills.textContent = '+' + (count * 25);
        advanced.textContent = '+' + (count * 500);
        protection.textContent = '+' + protectionValue;
        protectionNote.textContent = remaining > 0
            ? remaining + ' puntos hasta el m\u00e1ximo'
            : 'M\u00e1ximo alcanzado';
    }

    range.addEventListener('input', updateSimulator);
    updateReadiness();
    updateSimulator();
}());
</script>

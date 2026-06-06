<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Fist System';
?>

<link rel="stylesheet" href="/tools/library-guides.css?v=20260606">

<div class="guide-page guide-page--fist" data-fist-page>
    <section class="guide-hero fist-hero">
        <div class="guide-hero__copy">
            <span class="guide-eyebrow">Golpea antes, golpea m&aacute;s</span>
            <h1>Fist System</h1>
            <p>
                La regla es directa: mientras m&aacute;s Fist Skill tengas, m&aacute;s r&aacute;pido
                atacar&aacute; tu personaje.
            </p>
            <div class="guide-hero__chips">
                <span>Entrena en trainers</span>
                <span>Usa exercise dummy</span>
                <span>Exercise Fist: 8,000 cargas</span>
            </div>
        </div>
        <div class="fist-hero__visual" aria-hidden="true">
            <i></i><i></i><i></i>
            <div class="fist-icon"><img src="/images/fist.gif" alt=""></div>
        </div>
    </section>

    <section class="guide-panel fist-rule">
        <div>
            <span class="guide-kicker">Regla principal</span>
            <h2>Fist controla tu ritmo de ataque</h2>
            <p>
                Cada punto mejora la velocidad del personaje. La Wikia no publica un tiempo
                exacto en milisegundos, por eso el indicador inferior representa el progreso
                de forma visual, no una cifra de combate exacta.
            </p>
        </div>
        <div class="fist-rule__badge">
            <img src="/images/fist.gif" alt="Fist Skill">
            <strong data-fist-value>50</strong>
            <small>Fist actual</small>
        </div>
    </section>

    <section class="fist-simulator">
        <div class="fist-simulator__header">
            <div>
                <span class="guide-kicker">Prueba el progreso</span>
                <h2>Visualizador de velocidad</h2>
            </div>
            <span class="fist-level-pill" data-fist-tier>Ritmo en desarrollo</span>
        </div>

        <label class="fist-slider">
            <span>Fist Skill <output data-fist-output>50</output></span>
            <input type="range" min="10" max="150" value="50" data-fist-range>
        </label>

        <div class="fist-speed">
            <div class="fist-speed__arena">
                <span class="fist-speed__pulse" data-fist-pulse></span>
                <div class="fist-speed__hand"><img src="/images/fist.gif" alt=""></div>
                <div class="fist-speed__target"></div>
            </div>
            <div class="fist-speed__info">
                <small>Progreso visual</small>
                <strong data-fist-percent>29%</strong>
                <div><span data-fist-bar></span></div>
                <p data-fist-message>Ya notas una mejora, pero todav&iacute;a tienes mucho margen para acelerar tus ataques.</p>
            </div>
        </div>
    </section>

    <section class="fist-training">
        <div class="guide-section-heading">
            <span class="guide-kicker">Formas de subir Fist</span>
            <h2>Elige tu entrenamiento</h2>
        </div>

        <div class="fist-training__grid">
            <article>
                <span class="fist-training__number">01</span>
                <h3>Trainers</h3>
                <p>Entrena directamente golpeando dentro de las zonas preparadas para skilling.</p>
                <small>M&eacute;todo constante</small>
            </article>
            <article>
                <span class="fist-training__number">02</span>
                <h3>Exercise Dummy</h3>
                <p>Usa los dummies de ejercicio para desarrollar la skill de forma c&oacute;moda.</p>
                <small>Entrenamiento asistido</small>
            </article>
            <article class="fist-training__featured">
                <div class="fist-training__item">
                    <span aria-hidden="true">FIST</span>
                    <img src="https://mortera-world.com/images/items/44905.gif" alt="Exercise Fist" onerror="this.style.display='none'">
                </div>
                <span class="fist-training__number">03</span>
                <h3>Exercise Fist</h3>
                <p>La mejor herramienta dedicada para subir Fist. Tiene <strong>8,000 cargas</strong> y se obtiene solamente mediante Store.</p>
                <small>Mejor opci&oacute;n documentada</small>
            </article>
            <article>
                <span class="fist-training__number">04</span>
                <h3>Reset System</h3>
                <p>Cada reset suma +1 Fist mientras la skill se encuentre por debajo de 150.</p>
                <a href="<?= getLink('resetsystem') ?>">Ver Reset System</a>
            </article>
        </div>
    </section>

    <section class="guide-tip">
        <span>Resumen</span>
        <p>Entrena Fist de forma continua y comb&iacute;nalo con resets: cuanto mayor sea la skill, m&aacute;s r&aacute;pido atacar&aacute; tu personaje.</p>
    </section>
</div>

<script>
(function () {
    var page = document.querySelector('[data-fist-page]');
    if (!page) return;

    var range = page.querySelector('[data-fist-range]');
    var pulse = page.querySelector('[data-fist-pulse]');

    function update() {
        var value = parseInt(range.value, 10);
        var percent = Math.round(((value - 10) / 140) * 100);
        var tier;
        var message;

        if (value < 50) {
            tier = 'Ritmo inicial';
            message = 'Est\u00e1s construyendo la base. Trainers y dummies te ayudar\u00e1n a ganar velocidad.';
        } else if (value < 100) {
            tier = 'Ritmo en desarrollo';
            message = 'Ya notas una mejora, pero todav\u00eda tienes mucho margen para acelerar tus ataques.';
        } else if (value < 150) {
            tier = 'Ritmo avanzado';
            message = 'Tu Fist ya representa una mejora importante en la frecuencia de ataque.';
        } else {
            tier = 'Fist 150';
            message = 'Llegaste al l\u00edmite donde los resets dejan de sumar +1 Fist.';
        }

        page.querySelector('[data-fist-value]').textContent = value;
        page.querySelector('[data-fist-output]').textContent = value;
        page.querySelector('[data-fist-percent]').textContent = percent + '%';
        page.querySelector('[data-fist-bar]').style.width = percent + '%';
        page.querySelector('[data-fist-tier]').textContent = tier;
        page.querySelector('[data-fist-message]').textContent = message;
        pulse.style.animationDuration = (1.15 - (percent * 0.0065)).toFixed(2) + 's';
    }

    range.addEventListener('input', update);
    update();
}());
</script>

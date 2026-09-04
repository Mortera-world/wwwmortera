<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Echo Raid';

$phases = [
    [
        'title' => 'Caza una criatura',
        'label' => 'Origen',
        'description' => 'Derrota una criatura hostil elegible. La raid copia exactamente el tipo y nombre de ese monstruo.',
        'detail' => 'No cuentan summons, criaturas no hostiles ni Reward Bosses. Actualmente no hay monstruos adicionales en la lista de exclusiones.',
    ],
    [
        'title' => 'Encuentra el Echo Raid',
        'label' => 'Hallazgo',
        'description' => 'Existe una probabilidad de 0.05%, aproximadamente 1 entre 2,000 muertes elegibles, de que aparezca el objeto Echo Raid.',
        'detail' => 'El echo raid aparece en la posicion donde murio la criatura y queda vinculado a esa especie.',
    ],
    [
        'title' => 'Activalo a tiempo',
        'label' => 'Activacion',
        'description' => 'El Echo Raid permanece solamente 5 minutos. Para despertarlo debes caminar sobre el objeto antes de que desaparezca.',
        'detail' => 'No puede activarse en Protection Zone, dentro de una house ni demasiado cerca de otra Echo Raid activa.',
    ],
    [
        'title' => 'Resiste la invasion',
        'label' => 'Raid',
        'description' => 'La invasion dura 10 minutos y crea oleadas de versiones potenciadas de la criatura original alrededor del punto de activacion.',
        'detail' => 'Debes permanecer cerca. Si no hay jugadores dentro de 18 casillas cuando llega una nueva oleada, la raid termina.',
    ],
];

$units = [
    'echo' => [
        'name' => 'Echo',
        'subtitle' => 'La copia potenciada',
        'mark' => 'E',
        'description' => 'La unidad principal de cada oleada. Conserva la identidad, ataques y loot de la criatura que origino la raid.',
        'stats' => [
            ['Vida', 'x10'],
            ['Dano', 'x25'],
            ['Experiencia', 'x25'],
            ['Por oleada', 'Hasta 8'],
        ],
        'facts' => [
            'Usa el mismo tipo de monstruo que genero el objeto.',
            'Su nombre cambia a "Echo of [criatura]".',
            'Conserva el loot original del monstruo.',
            'No activa scripts originales de quests o bosses al morir.',
        ],
    ],
    'guardian' => [
        'name' => 'Echo Guardian',
        'subtitle' => 'La aparicion excepcional',
        'mark' => 'G',
        'description' => 'Una version mucho mas fuerte que puede aparecer una sola vez durante la raid.',
        'stats' => [
            ['Vida', 'x20'],
            ['Dano', 'x50'],
            ['Experiencia', 'x50'],
            ['Chance por ola', '0.1%'],
        ],
        'facts' => [
            'Solo puede aparecer un Guardian por Echo Raid.',
            'Tiene aproximadamente 5% de probabilidad acumulada durante una raid completa y activa.',
            'Su nombre cambia a "Echo Guardian of [criatura]".',
            'Puede soltar tanto items vip como ultimatums aunque raramente.',
        ],
    ],
];
?>

<link rel="stylesheet" href="/tools/echo-raid-page.css?v=20260613">

<div class="echo-page" data-echo-page>
    <section class="echo-hero" id="echo-top">
        <div class="echo-hero__noise" aria-hidden="true"></div>
        <div class="echo-hero__copy">
            <span class="echo-eyebrow"><i></i> Sistema dinamico de invasiones</span>
            <h1>Echo<br><em>Raid</em></h1>
            <p>
                Una muerte cualquiera puede abrir una grieta. Activa el eco antes de que
                desaparezca y enfrenta versiones extremas de la criatura que acabas de derrotar.
            </p>
            <div class="echo-hero__actions">
                <button type="button" data-echo-scroll="echo-flow">Descubrir el sistema <span>&darr;</span></button>
                <div><strong>Item 16092</strong><span>Pisalo para activar la raid</span></div>
            </div>
        </div>

        <div class="echo-hero__visual">
            <div class="echo-rift" aria-hidden="true">
                <i></i><i></i><i></i>
                <span>ER</span>
            </div>
            <div class="echo-item">
                <span>Echo Raid</span>
                <div>
                    <b>ER</b>
                    <img src="https://mortera-world.com/images/items/16092.gif"
                         alt="Echo Raid"
                         onerror="this.style.display='none'">
                </div>
                <strong>5 minutos para activarlo</strong>
            </div>
        </div>

        <div class="echo-hero__metrics">
            <article><strong>0.05%</strong><span>Probabilidad de aparicion</span></article>
            <article><strong>5 min</strong><span>Vida del objeto</span></article>
            <article><strong>10 min</strong><span>Duracion de la raid</span></article>
            <article><strong>16</strong><span>Monstruos vivos maximos</span></article>
        </div>
    </section>

    <nav class="echo-nav" aria-label="Secciones de Echo Raid">
        <button type="button" class="is-active" data-echo-scroll="echo-flow">Como inicia</button>
        <button type="button" data-echo-scroll="echo-waves">Oleadas</button>
        <button type="button" data-echo-scroll="echo-units">Echo vs Guardian</button>
        <button type="button" data-echo-scroll="echo-rules">Reglas</button>
        <button type="button" data-echo-scroll="echo-loot">Loot</button>
        <button type="button" data-echo-scroll="echo-faq">Preguntas</button>
    </nav>

    <section class="echo-section echo-flow" id="echo-flow" data-echo-section>
        <div class="echo-heading">
            <span>01</span>
            <div>
                <small>De una muerte a una invasion</small>
                <h2>Como nace un Echo Raid</h2>
                <p>Selecciona una etapa para ver el recorrido completo desde la caceria hasta la invasion.</p>
            </div>
        </div>

        <div class="echo-phase">
            <div class="echo-phase__nav" role="tablist" aria-label="Etapas de Echo Raid">
                <?php foreach ($phases as $index => $phase): ?>
                    <button type="button"
                            class="<?= $index === 0 ? 'is-active' : '' ?>"
                            data-phase-button="<?= $index ?>"
                            role="tab"
                            aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                        <span>0<?= $index + 1 ?></span>
                        <div><strong><?= htmlspecialchars($phase['label']) ?></strong><small><?= htmlspecialchars($phase['title']) ?></small></div>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="echo-phase__panels">
                <?php foreach ($phases as $index => $phase): ?>
                    <article class="<?= $index === 0 ? 'is-active' : '' ?>" data-phase-panel="<?= $index ?>" role="tabpanel">
                        <span>Etapa 0<?= $index + 1 ?></span>
                        <h3><?= htmlspecialchars($phase['title']) ?></h3>
                        <p><?= htmlspecialchars($phase['description']) ?></p>
                        <div><i></i><strong><?= htmlspecialchars($phase['detail']) ?></strong></div>
                        <b aria-hidden="true">0<?= $index + 1 ?></b>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="echo-section echo-waves" id="echo-waves" data-echo-section>
        <div class="echo-heading echo-heading--light">
            <span>02</span>
            <div>
                <small>Diez minutos de presion constante</small>
                <h2>El ritmo de las oleadas</h2>
                <p>La raid se adapta a la cantidad de enemigos que siguen vivos y nunca supera sus limites de seguridad.</p>
            </div>
        </div>

        <div class="echo-wave-board">
            <div class="echo-wave-board__timeline">
                <div><span>00:00</span><strong>Activacion</strong><small>La primera oleada aparece inmediatamente.</small></div>
                <i></i>
                <div><span>Cada 12 s</span><strong>Nueva oleada</strong><small>Hasta 8 Echoes buscan posiciones libres.</small></div>
                <i></i>
                <div><span>10:00</span><strong>Cierre</strong><small>La grieta desaparece y retira unidades restantes.</small></div>
            </div>

            <div class="echo-wave-board__limits">
                <article>
                    <span>8</span>
                    <div><strong>Echoes por oleada</strong><p>Se crean solamente los que caben dentro del limite de enemigos vivos.</p></div>
                </article>
                <article>
                    <span>16</span>
                    <div><strong>Maximo simultaneo</strong><p>Si hay 16 unidades vivas, la siguiente oleada espera a que liberes espacio.</p></div>
                </article>
                <article>
                    <span>6</span>
                    <div><strong>Radio de aparicion</strong><p>Los monstruos intentan aparecer dentro de seis casillas del punto central.</p></div>
                </article>
                <article>
                    <span>18</span>
                    <div><strong>Radio de presencia</strong><p>Debe existir al menos un jugador cerca para que la raid siga activa.</p></div>
                </article>
            </div>
        </div>
    </section>

    <section class="echo-section echo-units" id="echo-units" data-echo-section>
        <div class="echo-heading">
            <span>03</span>
            <div>
                <small>Dos niveles de amenaza</small>
                <h2>Echo vs Echo Guardian</h2>
                <p>Cambia entre las unidades para comparar sus multiplicadores y comportamiento.</p>
            </div>
        </div>

        <div class="echo-unit-switch" role="tablist" aria-label="Comparar unidades Echo Raid">
            <?php foreach ($units as $key => $unit): ?>
                <button type="button"
                        class="<?= $key === 'echo' ? 'is-active' : '' ?>"
                        data-unit-button="<?= htmlspecialchars($key) ?>"
                        role="tab"
                        aria-selected="<?= $key === 'echo' ? 'true' : 'false' ?>">
                    <span><?= htmlspecialchars($unit['mark']) ?></span>
                    <div><strong><?= htmlspecialchars($unit['name']) ?></strong><small><?= htmlspecialchars($unit['subtitle']) ?></small></div>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="echo-unit-stage">
            <?php foreach ($units as $key => $unit): ?>
                <article class="echo-unit-card echo-unit-card--<?= htmlspecialchars($key) ?> <?= $key === 'echo' ? 'is-active' : '' ?>"
                         data-unit-panel="<?= htmlspecialchars($key) ?>"
                         role="tabpanel">
                    <div class="echo-unit-card__portrait">
                        <span><?= htmlspecialchars($unit['mark']) ?></span>
                        <i></i><i></i>
                    </div>
                    <div class="echo-unit-card__content">
                        <span><?= htmlspecialchars($unit['subtitle']) ?></span>
                        <h3><?= htmlspecialchars($unit['name']) ?></h3>
                        <p><?= htmlspecialchars($unit['description']) ?></p>

                        <div class="echo-unit-card__stats">
                            <?php foreach ($unit['stats'] as $stat): ?>
                                <div><small><?= htmlspecialchars($stat[0]) ?></small><strong><?= $stat[1] ?></strong></div>
                            <?php endforeach; ?>
                        </div>

                        <ul>
                            <?php foreach ($unit['facts'] as $fact): ?>
                                <li><i></i><span><?= htmlspecialchars($fact) ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="echo-section echo-rules" id="echo-rules" data-echo-section>
        <div class="echo-heading echo-heading--light">
            <span>04</span>
            <div>
                <small>Donde y cuando puede despertar</small>
                <h2>Reglas de activacion</h2>
                <p>El sistema protege el mapa y evita que varias grietas ocupen la misma zona.</p>
            </div>
        </div>

        <div class="echo-rule-grid">
            <article><span>01</span><div><strong>Fuera de zonas protegidas</strong><p>No puede activarse dentro de Protection Zone ni en tiles pertenecientes a una house.</p></div></article>
            <article><span>02</span><div><strong>Separacion de 20 casillas</strong><p>No aparece ni se activa otro Echo Raid demasiado cerca de un objeto pendiente o una raid existente.</p></div></article>
            <article><span>03</span><div><strong>Jugador cercano</strong><p>Cada oleada confirma que haya un jugador dentro de 18 casillas. Sin jugadores, la raid se cancela.</p></div></article>
            <article><span>04</span><div><strong>Capacidad global</strong><p>El servidor permite hasta 30 raids activas y 30 objetos Echo Raid pendientes al mismo tiempo.</p></div></article>
            <article><span>05</span><div><strong>Posicion valida</strong><p>Cada criatura busca una casilla caminable, visible y libre dentro del radio de aparicion.</p></div></article>
            <article><span>06</span><div><strong>Una oportunidad breve</strong><p>Si nadie pisa el objeto dentro de sus 5 minutos de vida, desaparece sin iniciar la invasion.</p></div></article>
        </div>
    </section>

    <section class="echo-section echo-loot" id="echo-loot" data-echo-section>
        <div class="echo-heading">
            <span>05</span>
            <div>
                <small>Riesgo alto, progreso acelerado</small>
                <h2>Experiencia y loot</h2>
                <p>Las copias mantienen las recompensas naturales del monstruo y multiplican fuertemente la experiencia.</p>
            </div>
        </div>

        <div class="echo-reward-layout">
            <div class="echo-reward-main">
                <div class="echo-reward-main__icon"><span>XP</span><i></i></div>
                <div>
                    <span>Multiplicadores de experiencia</span>
                    <h3><em>x25</em> Echo &nbsp; <em>x50</em> Guardian</h3>
                    <p>La experiencia final respeta el limite maximo seguro configurado por el sistema.</p>
                </div>
            </div>

            <div class="echo-loot-cards">
                <article>
                    <span>Loot original</span>
                    <strong>Activo</strong>
                    <p>Cada copia puede soltar el loot normal de la criatura que fue duplicada.</p>
                </article>
                <article>
                    <span>Loot adicional</span>
                    <strong>Preparado</strong>
                    <p>Las criaturas de echo puedel solar tibia coins, red diamond coins e incluso Mystical Fragment y Sun Essences</p>
                </article>
                <article>
                    <span>Proteccion de quests</span>
                    <strong>Activada</strong>
                    <p>Los eventos originales de la criatura se retiran para evitar que una copia dispare muertes de quest o boss.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="echo-section echo-strategy" data-echo-section>
        <div class="echo-heading echo-heading--light">
            <span>06</span>
            <div>
                <small>Preparacion practica</small>
                <h2>Antes de pisar la grieta</h2>
                <p>Estas recomendaciones se desprenden directamente del comportamiento del sistema.</p>
            </div>
        </div>

        <div class="echo-strategy__list">
            <article><span>01</span><div><strong>Libera espacio alrededor</strong><p>Activa el objeto en una zona amplia y caminable para que las oleadas encuentren posiciones validas.</p></div></article>
            <article><span>02</span><div><strong>No abandones el centro</strong><p>Alejarte mas de 18 casillas puede hacer que la raid termine en la siguiente comprobacion.</p></div></article>
            <article><span>03</span><div><strong>Elimina antes de acumular</strong><p>Con 16 enemigos vivos no entraran nuevos Echoes, pero tampoco avanzaras al ritmo potencial de la raid.</p></div></article>
            <article><span>04</span><div><strong>Preparate para el Guardian</strong><p>Es raro, aparece una sola vez y duplica los multiplicadores del Echo normal.</p></div></article>
        </div>
    </section>

    <section class="echo-section echo-faq" id="echo-faq" data-echo-section>
        <div class="echo-heading">
            <span>07</span>
            <div>
                <small>Respuestas directas</small>
                <h2>Preguntas frecuentes</h2>
            </div>
        </div>

        <div class="echo-faq__list">
            <details open>
                <summary><strong>&iquest;Que monstruos pueden crear un Echo Raid?</strong><i></i></summary>
                <p>Cualquier criatura hostil elegible, sin master, con vida y experiencia, siempre que no sea Reward Boss. La lista manual de exclusiones esta vacia.</p>
            </details>
            <details>
                <summary><strong>&iquest;La raid siempre crea un Guardian?</strong><i></i></summary>
                <p>No. Cada oleada tiene 0.1% de probabilidad y solo puede aparecer uno. Durante una raid completa la posibilidad aproximada es de 5%.</p>
            </details>
            <details>
                <summary><strong>&iquest;Que ocurre si me alejo?</strong><i></i></summary>
                <p>Si no queda ningun jugador dentro del rango de 18 casillas al comprobar una oleada, la raid termina y elimina los Echoes restantes.</p>
            </details>
            <details>
                <summary><strong>&iquest;Puedo guardar el objeto para despues?</strong><i></i></summary>
                <p>No. El objeto se crea en el suelo y desaparece automaticamente despues de 5 minutos.</p>
            </details>
            <details>
                <summary><strong>&iquest;Los Echoes dan el mismo loot?</strong><i></i></summary>
                <p>Conservan el loot original. Tambien existe soporte para loot adicional, aunque actualmente no hay recompensas extra configuradas.</p>
            </details>
        </div>
    </section>
</div>

<script>
(function () {
    var page = document.querySelector('[data-echo-page]');
    if (!page) return;

    Array.prototype.forEach.call(page.querySelectorAll('[data-echo-scroll]'), function (button) {
        button.addEventListener('click', function () {
            var id = button.getAttribute('data-echo-scroll');
            var target = page.querySelector('#' + id);
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    var phaseButtons = Array.prototype.slice.call(page.querySelectorAll('[data-phase-button]'));
    var phasePanels = Array.prototype.slice.call(page.querySelectorAll('[data-phase-panel]'));
    phaseButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var key = button.getAttribute('data-phase-button');
            phaseButtons.forEach(function (item) {
                var active = item === button;
                item.classList.toggle('is-active', active);
                item.setAttribute('aria-selected', active ? 'true' : 'false');
            });
            phasePanels.forEach(function (panel) {
                panel.classList.toggle('is-active', panel.getAttribute('data-phase-panel') === key);
            });
        });
    });

    var unitButtons = Array.prototype.slice.call(page.querySelectorAll('[data-unit-button]'));
    var unitPanels = Array.prototype.slice.call(page.querySelectorAll('[data-unit-panel]'));
    unitButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var key = button.getAttribute('data-unit-button');
            unitButtons.forEach(function (item) {
                var active = item === button;
                item.classList.toggle('is-active', active);
                item.setAttribute('aria-selected', active ? 'true' : 'false');
            });
            unitPanels.forEach(function (panel) {
                panel.classList.toggle('is-active', panel.getAttribute('data-unit-panel') === key);
            });
        });
    });

    var sections = Array.prototype.slice.call(page.querySelectorAll('[data-echo-section]'));
    var navButtons = Array.prototype.slice.call(page.querySelectorAll('.echo-nav [data-echo-scroll]'));
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                navButtons.forEach(function (button) {
                    button.classList.toggle('is-active', button.getAttribute('data-echo-scroll') === entry.target.id);
                });
            });
        }, { rootMargin: '-30% 0px -60% 0px', threshold: 0 });
        sections.forEach(function (section) { observer.observe(section); });
    }
}());
</script>

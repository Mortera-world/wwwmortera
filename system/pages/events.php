<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Eventos';

$events = [
    'firestorm' => [
        'name' => 'Firestorm',
        'subtitle' => 'El suelo deja de ser seguro',
        'mark' => 'F',
        'theme' => 'fire',
        'type' => 'Supervivencia',
        'summary' => 'Esquiva las advertencias, evita las llamas y permanece en la arena hasta ser el ultimo jugador en pie.',
        'cycle' => '60 min',
        'portal' => '30 min',
        'wait' => '15 min',
        'minimum' => 5,
        'reward' => 100,
        'rewardId' => 22118,
        'arena' => '21 x 22',
        'dangerRate' => '2 seg',
        'dangerLabel' => 'Nueva llama',
        'elimination' => 'Teleport al templo',
        'cover' => '/images/mortera/events/firestorm-cover.jpg',
        'images' => [
            ['/images/mortera/events/firestorm-arena.jpg', 'Arena del Firestorm'],
            ['/images/mortera/events/firestorm-portal.jpg', 'Portal de entrada'],
            ['/images/mortera/events/firestorm-winner.jpg', 'Ganador del evento'],
        ],
        'timeline' => [
            [
                'title' => 'Aparece el portal',
                'short' => 'Apertura',
                'description' => 'Tras 60 minutos del inicio del servidor o del ciclo anterior, aparece un portal en el cuarto de eventos. Si nadie participa, desaparece al terminar su ventana.',
            ],
            [
                'title' => 'Entra a la sala',
                'short' => 'Registro',
                'description' => 'Necesitas todas las Bless configuradas. El primer jugador que entra activa la cuenta regresiva real de 15 minutos para reunir participantes.',
            ],
            [
                'title' => 'Comienza la tormenta',
                'short' => 'Combate',
                'description' => 'Los jugadores son enviados a posiciones aleatorias. Cada 2 segundos se marca una casilla y, entre 0.5 y 1 segundo despues, cae una llama.',
            ],
            [
                'title' => 'Sobrevive hasta el final',
                'short' => 'Victoria',
                'description' => 'Pisar fuego o recibir la llama te elimina y te envia al templo. El ultimo jugador dentro de la arena recibe la recompensa.',
            ],
        ],
        'rules' => [
            ['Bless obligatoria', 'Sin todas las Bless requeridas, el portal rechaza tu entrada.'],
            ['Minimo 5 jugadores', 'Si no se alcanza el minimo al terminar la espera, el evento se cancela.'],
            ['Una sola oportunidad', 'Una llama te elimina inmediatamente de la ronda y no puedes volver.'],
            ['Ultimo superviviente', 'Si todos son eliminados, la ronda termina sin ganador.'],
        ],
        'tips' => [
            ['Mira antes de moverte', 'La casilla peligrosa muestra una advertencia antes de encenderse.'],
            ['Evita las esquinas', 'Conforme se acumula el fuego, las rutas de escape se reducen.'],
            ['Sigue en movimiento', 'Quedarte quieto facilita que una llama cierre tu salida.'],
        ],
    ],
    'zombie' => [
        'name' => 'Zombie Event',
        'subtitle' => 'Cada caida fortalece la horda',
        'mark' => 'Z',
        'theme' => 'zombie',
        'type' => 'Apocalipsis',
        'summary' => 'Sobrevive sin spells ni PvP mientras la arena genera zombies y cada jugador derrotado se convierte en una nueva amenaza.',
        'cycle' => '90 min',
        'portal' => '30 min',
        'wait' => '15 min',
        'minimum' => 5,
        'reward' => 100,
        'rewardId' => 22118,
        'arena' => '17 x 17',
        'dangerRate' => '7 seg',
        'dangerLabel' => 'Nuevo zombie',
        'elimination' => 'Muerte del jugador',
        'cover' => '/images/mortera/events/zombie-cover.jpg',
        'images' => [
            ['/images/mortera/events/zombie-arena.jpg', 'Arena del Zombie Event'],
            ['/images/mortera/events/zombie-portal.jpg', 'Portal de entrada'],
            ['/images/mortera/events/zombie-winner.jpg', 'Ultimo superviviente'],
        ],
        'timeline' => [
            [
                'title' => 'Aparece el portal',
                'short' => 'Apertura',
                'description' => 'El portal aparece en el cuarto de eventos despues de 90 minutos. Permanece disponible hasta 30 minutos si nadie inicia la ronda.',
            ],
            [
                'title' => 'Reune supervivientes',
                'short' => 'Registro',
                'description' => 'La entrada exige Bless. El primer participante activa una espera real de 15 minutos y se necesitan al menos 5 jugadores.',
            ],
            [
                'title' => 'Empieza el apocalipsis',
                'short' => 'Horda',
                'description' => 'El primer zombie aparece 3 segundos despues del inicio y luego surge uno nuevo cada 7 segundos en una posicion aleatoria.',
            ],
            [
                'title' => 'La horda crece',
                'short' => 'Victoria',
                'description' => 'Cuando un jugador muere, aparece otro zombie en su posicion. El ultimo jugador vivo gana; si no queda nadie, no hay recompensa.',
            ],
        ],
        'rules' => [
            ['Spells bloqueados', 'No se puede lanzar ningun spell mientras estes dentro de la arena.'],
            ['PvP desactivado', 'Los jugadores no pueden atacarse entre si dentro del evento.'],
            ['Minimo 5 jugadores', 'La ronda se cancela si no se alcanza el minimo al terminar la espera.'],
            ['La muerte alimenta la horda', 'Cada participante eliminado genera un zombie adicional casi de inmediato.'],
        ],
        'tips' => [
            ['Controla la distancia', 'Los Event Zombies atacan a rango corto y se enfocan principalmente en el objetivo mas cercano.'],
            ['Administra tu vida', 'Cada golpe puede quitar entre 1% y 10% de tu vida maxima.'],
            ['No confies en eliminarlos rapido', 'Tienen 10,000 HP y 99% de resistencia a todos los tipos de dano configurados.'],
        ],
        'monster' => [
            'name' => 'Event Zombie',
            'looktype' => 311,
            'health' => '10,000',
            'speed' => 150,
            'damage' => '1% - 10% de HP maximo',
            'resistance' => '99%',
        ],
    ],
];
?>

<link rel="stylesheet" href="/tools/events-page.css?v=20260608">

<div class="events-page" data-events-page>
    <section class="events-hero">
        <div class="events-hero__grid" aria-hidden="true"></div>
        <div class="events-hero__copy">
            <span class="events-eyebrow"><i></i> Calendario de desafios de Mortera</span>
            <h1>Eventos<br><em>de supervivencia</em></h1>
            <p>
                Portales temporales, arenas dinamicas y una sola meta: ser el ultimo en pie.
                Conoce cada regla antes de entrar.
            </p>
            <div class="events-hero__stats">
                <div><strong>2</strong><span>eventos activos</span></div>
                <div><strong>5</strong><span>jugadores minimo</span></div>
                <div><strong>100 TC</strong><span>premio por victoria</span></div>
            </div>
        </div>

        <div class="events-hero__visual" aria-hidden="true">
            <div class="events-duel events-duel--fire">
                <span>F</span><strong>Firestorm</strong><i></i>
            </div>
            <div class="events-duel events-duel--zombie">
                <span>Z</span><strong>Zombie</strong><i></i>
            </div>
            <div class="events-hero__core"><span>VS</span></div>
            <i class="events-orbit events-orbit--one"></i>
            <i class="events-orbit events-orbit--two"></i>
        </div>
    </section>

    <nav class="events-tabs" role="tablist" aria-label="Seleccionar evento">
        <?php foreach ($events as $key => $event): ?>
            <button type="button"
                    class="<?= $key === 'firestorm' ? 'is-active' : '' ?>"
                    data-event-tab="<?= htmlspecialchars($key) ?>"
                    role="tab"
                    aria-selected="<?= $key === 'firestorm' ? 'true' : 'false' ?>">
                <span class="events-tabs__mark events-tabs__mark--<?= htmlspecialchars($event['theme']) ?>"><?= htmlspecialchars($event['mark']) ?></span>
                <div>
                    <strong><?= htmlspecialchars($event['name']) ?></strong>
                    <small><?= htmlspecialchars($event['type']) ?></small>
                </div>
                <em>Activo</em>
            </button>
        <?php endforeach; ?>
        <button type="button"
                data-event-tab="future"
                role="tab"
                aria-selected="false">
            <span class="events-tabs__mark events-tabs__mark--future">+</span>
            <div>
                <strong>Proximos eventos</strong>
                <small>Espacio preparado</small>
            </div>
            <em>Futuro</em>
        </button>
    </nav>

    <?php foreach ($events as $key => $event): ?>
        <section class="event-panel event-panel--<?= htmlspecialchars($event['theme']) ?> <?= $key === 'firestorm' ? 'is-active' : '' ?>"
                 data-event-panel="<?= htmlspecialchars($key) ?>"
                 role="tabpanel">
            <header class="event-overview">
                <div class="event-cover event-image-slot">
                    <img src="<?= htmlspecialchars($event['cover']) ?>"
                         alt="<?= htmlspecialchars($event['name']) ?>"
                         onload="this.parentElement.classList.add('has-image')"
                         onerror="this.style.display='none'">
                    <div>
                        <span>Espacio para imagen principal</span>
                        <strong><?= htmlspecialchars($event['name']) ?></strong>
                        <small>Formato recomendado: 1400 x 700 px</small>
                    </div>
                    <i aria-hidden="true"><?= htmlspecialchars($event['mark']) ?></i>
                </div>

                <div class="event-overview__copy">
                    <div class="event-status"><i></i> Evento activo</div>
                    <span><?= htmlspecialchars($event['type']) ?></span>
                    <h2><?= htmlspecialchars($event['name']) ?></h2>
                    <h3><?= htmlspecialchars($event['subtitle']) ?></h3>
                    <p><?= htmlspecialchars($event['summary']) ?></p>
                    <div class="event-quickfacts">
                        <div><small>Ciclo</small><strong><?= htmlspecialchars($event['cycle']) ?></strong></div>
                        <div><small>Portal</small><strong><?= htmlspecialchars($event['portal']) ?></strong></div>
                        <div><small>Espera</small><strong><?= htmlspecialchars($event['wait']) ?></strong></div>
                        <div><small>Minimo</small><strong><?= (int) $event['minimum'] ?> jugadores</strong></div>
                    </div>
                </div>
            </header>

            <div class="event-reward-strip">
                <div class="event-reward-strip__icon">
                    <img src="/images/icons/coins.png" alt="Tibia Coins">
                </div>
                <div>
                    <span>Recompensa del ganador</span>
                    <strong><?= (int) $event['reward'] ?> Tibia Coins</strong>
                </div>
                <p>Se entrega automaticamente al ultimo jugador que permanece dentro de la arena.</p>
            </div>

            <section class="event-section event-section--timeline">
                <div class="event-section__heading">
                    <div>
                        <span>Flujo del evento</span>
                        <h2>Como funciona la ronda</h2>
                    </div>
                    <p>Selecciona cada etapa para revisar que ocurre desde la apertura del portal hasta la victoria.</p>
                </div>

                <div class="event-timeline" data-event-timeline>
                    <div class="event-timeline__nav">
                        <?php foreach ($event['timeline'] as $index => $stage): ?>
                            <button type="button"
                                    class="<?= $index === 0 ? 'is-active' : '' ?>"
                                    data-stage-button="<?= $index ?>">
                                <span>0<?= $index + 1 ?></span>
                                <div><strong><?= htmlspecialchars($stage['short']) ?></strong><small><?= htmlspecialchars($stage['title']) ?></small></div>
                            </button>
                        <?php endforeach; ?>
                    </div>
                    <div class="event-timeline__detail">
                        <?php foreach ($event['timeline'] as $index => $stage): ?>
                            <article class="<?= $index === 0 ? 'is-active' : '' ?>" data-stage-panel="<?= $index ?>">
                                <span>Etapa 0<?= $index + 1 ?></span>
                                <h3><?= htmlspecialchars($stage['title']) ?></h3>
                                <p><?= htmlspecialchars($stage['description']) ?></p>
                                <i aria-hidden="true">0<?= $index + 1 ?></i>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="event-section event-section--rules">
                <div class="event-section__heading">
                    <div>
                        <span>Antes de entrar</span>
                        <h2>Reglas esenciales</h2>
                    </div>
                    <p>Estas condiciones son aplicadas directamente por el evento dentro del servidor.</p>
                </div>

                <div class="event-rules">
                    <?php foreach ($event['rules'] as $index => $rule): ?>
                        <article>
                            <span>0<?= $index + 1 ?></span>
                            <div><strong><?= htmlspecialchars($rule[0]) ?></strong><p><?= htmlspecialchars($rule[1]) ?></p></div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="event-data">
                <div class="event-data__metrics">
                    <div class="event-section__heading">
                        <div><span>Datos de arena</span><h2>Ritmo del peligro</h2></div>
                    </div>
                    <div class="event-metrics">
                        <article><small>Arena</small><strong><?= htmlspecialchars($event['arena']) ?></strong><span>casillas de combate</span></article>
                        <article><small><?= htmlspecialchars($event['dangerLabel']) ?></small><strong><?= htmlspecialchars($event['dangerRate']) ?></strong><span>durante la ronda</span></article>
                        <article><small>Eliminacion</small><strong><?= htmlspecialchars($event['elimination']) ?></strong><span>al perder la ronda</span></article>
                    </div>

                    <?php if (!empty($event['monster'])): ?>
                        <div class="event-monster">
                            <div class="event-monster__avatar">
                                <span>Z</span>
                                <img src="/images/library/zombie.gif" alt="Event Zombie">
                            </div>
                            <div class="event-monster__title">
                                <span>Enemigo del evento</span>
                                <h3><?= htmlspecialchars($event['monster']['name']) ?></h3>
                            </div>
                            <div class="event-monster__stats">
                                <div><small>HP</small><strong><?= htmlspecialchars($event['monster']['health']) ?></strong></div>
                                <div><small>Velocidad</small><strong><?= (int) $event['monster']['speed'] ?></strong></div>
                                <div><small>Golpe</small><strong><?= htmlspecialchars($event['monster']['damage']) ?></strong></div>
                                <div><small>Resistencia</small><strong><?= htmlspecialchars($event['monster']['resistance']) ?></strong></div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <aside class="event-checker" data-event-checker data-minimum="<?= (int) $event['minimum'] ?>">
                    <span>Verificador de entrada</span>
                    <h3>&iquest;La ronda puede comenzar?</h3>
                    <label>
                        <span>Jugadores esperando</span>
                        <output data-player-output><?= (int) $event['minimum'] ?></output>
                        <input type="range" min="0" max="30" value="<?= (int) $event['minimum'] ?>" data-player-range>
                        <i><b data-player-progress></b></i>
                    </label>
                    <label class="event-checker__bless">
                        <input type="checkbox" data-bless-check>
                        <i></i>
                        <span><strong>Tengo todas las Bless</strong><small>Requisito individual de entrada.</small></span>
                    </label>
                    <div class="event-checker__result" data-checker-result>
                        <strong data-checker-title>Confirma tus Bless</strong>
                        <p data-checker-message>Hay suficientes jugadores, pero aun debes marcar el requisito personal.</p>
                    </div>
                </aside>
            </section>

            <section class="event-section event-section--tips">
                <div class="event-section__heading">
                    <div><span>Estrategia</span><h2>Consejos para sobrevivir</h2></div>
                    <p>Abre cada recomendacion y prepara tu forma de jugar antes de cruzar el portal.</p>
                </div>
                <div class="event-tips">
                    <?php foreach ($event['tips'] as $index => $tip): ?>
                        <details <?= $index === 0 ? 'open' : '' ?>>
                            <summary><span>0<?= $index + 1 ?></span><strong><?= htmlspecialchars($tip[0]) ?></strong><i></i></summary>
                            <p><?= htmlspecialchars($tip[1]) ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="event-gallery">
                <div class="event-section__heading">
                    <div><span>Galeria preparada</span><h2>Imagenes del evento</h2></div>
                    <p>Estos espacios ya tienen rutas asignadas. Cuando agregues las imagenes, apareceran automaticamente.</p>
                </div>
                <div class="event-gallery__grid">
                    <?php foreach ($event['images'] as $imageIndex => $image): ?>
                        <div class="event-image-slot event-gallery__slot">
                            <img src="<?= htmlspecialchars($image[0]) ?>"
                                 alt="<?= htmlspecialchars($image[1]) ?>"
                                 onload="this.parentElement.classList.add('has-image')"
                                 onerror="this.style.display='none'">
                            <div>
                                <span>Imagen 0<?= $imageIndex + 1 ?></span>
                                <strong><?= htmlspecialchars($image[1]) ?></strong>
                                <small>Espacio reservado</small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </section>
    <?php endforeach; ?>

    <section class="event-panel event-panel--future" data-event-panel="future" role="tabpanel">
        <header class="future-events__hero">
            <span>Calendario en expansion</span>
            <h2>Proximos<br><em>eventos</em></h2>
            <p>
                La estructura ya esta lista para crecer. Cada evento futuro puede tener su propia
                identidad, reglas, linea de tiempo, recompensa, verificador y galeria.
            </p>
        </header>

        <div class="future-events__slots">
            <?php foreach (['Nuevo evento', 'Nuevo desafio', 'Evento especial'] as $index => $slot): ?>
                <article>
                    <span>0<?= $index + 1 ?></span>
                    <div class="future-events__image"><i>+</i><small>Imagen futura</small></div>
                    <strong><?= htmlspecialchars($slot) ?></strong>
                    <p>Espacio disponible para una nueva pesta&ntilde;a de evento.</p>
                    <em>Proximamente</em>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="future-events__template">
            <div><span>01</span><strong>Identidad</strong><small>Nombre, color e imagen</small></div>
            <div><span>02</span><strong>Mecanica</strong><small>Reglas y etapas</small></div>
            <div><span>03</span><strong>Recompensa</strong><small>Items y ganador</small></div>
            <div><span>04</span><strong>Galeria</strong><small>Capturas y arena</small></div>
        </div>
    </section>

    <div class="events-toast" data-events-toast role="status" aria-live="polite"></div>
</div>

<script>
(function () {
    var page = document.querySelector('[data-events-page]');
    if (!page) return;

    var tabs = Array.prototype.slice.call(page.querySelectorAll('[data-event-tab]'));
    var panels = Array.prototype.slice.call(page.querySelectorAll('[data-event-panel]'));

    function selectEvent(key, updateHash) {
        var exists = panels.some(function (panel) {
            return panel.getAttribute('data-event-panel') === key;
        });
        if (!exists) key = 'firestorm';

        tabs.forEach(function (button) {
            var active = button.getAttribute('data-event-tab') === key;
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        panels.forEach(function (panel) {
            panel.classList.toggle('is-active', panel.getAttribute('data-event-panel') === key);
        });

        if (updateHash && window.history && window.history.replaceState) {
            window.history.replaceState(null, '', '#event-' + key);
        }
    }

    tabs.forEach(function (button) {
        button.addEventListener('click', function () {
            selectEvent(button.getAttribute('data-event-tab'), true);
            page.querySelector('.events-tabs').scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    Array.prototype.forEach.call(page.querySelectorAll('[data-event-timeline]'), function (timeline) {
        var buttons = Array.prototype.slice.call(timeline.querySelectorAll('[data-stage-button]'));
        var stages = Array.prototype.slice.call(timeline.querySelectorAll('[data-stage-panel]'));
        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                var key = button.getAttribute('data-stage-button');
                buttons.forEach(function (item) { item.classList.toggle('is-active', item === button); });
                stages.forEach(function (stage) {
                    stage.classList.toggle('is-active', stage.getAttribute('data-stage-panel') === key);
                });
            });
        });
    });

    Array.prototype.forEach.call(page.querySelectorAll('[data-event-checker]'), function (checker) {
        var minimum = Number(checker.getAttribute('data-minimum')) || 5;
        var range = checker.querySelector('[data-player-range]');
        var output = checker.querySelector('[data-player-output]');
        var progress = checker.querySelector('[data-player-progress]');
        var bless = checker.querySelector('[data-bless-check]');
        var result = checker.querySelector('[data-checker-result]');
        var title = checker.querySelector('[data-checker-title]');
        var message = checker.querySelector('[data-checker-message]');

        function update() {
            var players = Number(range.value) || 0;
            var enough = players >= minimum;
            var ready = enough && bless.checked;
            output.textContent = players;
            progress.style.width = Math.min(100, (players / minimum) * 100) + '%';
            result.classList.toggle('is-ready', ready);
            result.classList.toggle('is-warning', !ready);

            if (!enough) {
                var missing = minimum - players;
                title.textContent = 'Faltan ' + missing + (missing === 1 ? ' jugador' : ' jugadores');
                message.textContent = 'La ronda sera cancelada si no se alcanza el minimo de ' + minimum + '.';
            } else if (!bless.checked) {
                title.textContent = 'Confirma tus Bless';
                message.textContent = 'El grupo esta completo, pero el portal revisara tus Bless antes de dejarte entrar.';
            } else {
                title.textContent = 'Listo para entrar';
                message.textContent = 'Se cumple el minimo y tu requisito personal esta confirmado.';
            }
        }

        range.addEventListener('input', update);
        bless.addEventListener('change', update);
        update();
    });

    var hash = window.location.hash.replace('#event-', '');
    selectEvent(hash || 'firestorm', false);
}());
</script>

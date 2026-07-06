<?php
/** Pagina y punto de entrada AJAX de Loteria Mexicana Online. */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Loteria Mexicana Online';

require_once SYSTEM . 'loteria-service.php';
require_once SYSTEM . 'loteria-api.php';
$loteriaConfig = require SYSTEM . 'loteria-config.php';
$loteriaCatalog = require SYSTEM . 'loteria-catalog.php';

$loteriaAccountId = ($logged && isset($account_logged) && $account_logged->isLoaded())
    ? (int)$account_logged->getId()
    : 0;
$loteriaDisplayName = $loteriaAccountId > 0 ? 'Cuenta #' . $loteriaAccountId : 'Invitado';
if ($loteriaAccountId > 0 && defined('USE_ACCOUNT_NAME') && USE_ACCOUNT_NAME) {
    try {
        $loteriaDisplayName = (string)$account_logged->getName();
    } catch (Throwable $ignored) {
        // El ID sigue siendo una etiqueta segura si el esquema no expone nombre.
    }
}

$loteriaTables = [
    'loteria_rooms', 'loteria_room_players', 'loteria_card_offers',
    'loteria_player_cards', 'loteria_drawn_cards', 'loteria_winners',
    'loteria_coin_ledger', 'loteria_room_presence', 'loteria_game_history',
    'loteria_winner_history',
];
$loteriaCheckSchema = static function () use ($db, $loteriaTables): bool {
    foreach ($loteriaTables as $loteriaTable) {
        if (!$db->hasTable($loteriaTable)) {
            return false;
        }
    }
    return $db->hasColumn('loteria_rooms', 'victory_mode')
        && $db->hasColumn('loteria_rooms', 'empty_since');
};

$loteriaReady = $loteriaCheckSchema();
if (!$loteriaReady) {
    // MyAAC conserva resultados negativos de hasTable/hasColumn hasta una hora.
    // Revalidarlos aqui permite usar una migracion recien importada sin esperar.
    $db->revalidateCache();
    $loteriaReady = $loteriaCheckSchema();
}
$loteriaBaseInstalled = $db->hasTable('loteria_rooms');

if (isset($_GET['loteria_action'])) {
    if (!$loteriaReady) {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(503);
        echo json_encode([
            'ok' => false,
            'error' => $loteriaBaseInstalled
                ? 'El modulo necesita la actualizacion loteria-upgrade-v2.sql.'
                : 'El modulo aun no esta instalado. Importa loteria-install.sql.',
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }
    $loteriaService = new LoteriaService($db, $loteriaConfig, $loteriaCatalog);
    LoteriaApi::dispatch(
        $loteriaService,
        (bool)$logged,
        $loteriaAccountId,
        $loteriaDisplayName
    );
    exit;
}

$loteriaPageUrl = !empty($config['friendly_urls'])
    ? getLink('loteria')
    : BASE_URL . '?subtopic=loteria';
$loteriaApiSeparator = strpos($loteriaPageUrl, '?') === false ? '?' : '&';
$loteriaApiUrl = $loteriaPageUrl . $loteriaApiSeparator . 'loteria_action=';
$loteriaAssetBase = (defined('BASE_DIR') ? rtrim(BASE_DIR, '/') : '');
?>
<link rel="stylesheet" href="<?= htmlspecialchars($loteriaAssetBase . '/tools/loteria.css?v=20260706f', ENT_QUOTES, 'UTF-8') ?>">

<?php if (!$logged): ?>
    <section class="loteria-gate">
        <span class="loteria-gate__eyebrow">54 barajas · 3 ganadores</span>
        <h1>Loteria Mexicana Online</h1>
        <p>Inicia sesion con tu cuenta de MyAAC para crear salas, comprar cartas y recibir premios en Tibia Coins transferibles.</p>
        <a class="loteria-button loteria-button--primary" href="<?= htmlspecialchars(getLink('account/manage'), ENT_QUOTES, 'UTF-8') ?>">Iniciar sesion</a>
    </section>
<?php elseif (!$loteriaReady): ?>
    <section class="loteria-gate loteria-gate--warning">
        <span class="loteria-gate__eyebrow">Falta un paso</span>
        <h1><?= $loteriaBaseInstalled ? 'La Loteria necesita una actualizacion' : 'El modulo esta listo, pero faltan sus tablas' ?></h1>
        <p>Importa el archivo <strong><?= $loteriaBaseInstalled ? 'loteria-upgrade-v2.sql' : 'loteria-install.sql' ?></strong> en la base de datos que usa MyAAC y vuelve a cargar esta pagina.</p>
    </section>
<?php else: ?>
    <?php
    $loteriaBootstrap = [
        'apiUrl' => $loteriaApiUrl,
        'pageUrl' => $loteriaPageUrl,
        'csrf' => LoteriaApi::csrfToken(),
        'pollInterval' => (int)$loteriaConfig['poll_interval_ms'],
        'lobbyPollInterval' => (int)$loteriaConfig['lobby_poll_interval_ms'],
        'price' => $loteriaConfig['price'],
        'speed' => $loteriaConfig['speed'],
        'players' => $loteriaConfig['players'],
        'cardsPerPlayer' => (int)$loteriaConfig['cards']['per_player'],
        'victoryModes' => $loteriaConfig['victory_modes'],
        'accountName' => $loteriaDisplayName,
        'introAudio' => $loteriaAssetBase . '/'
            . trim($loteriaConfig['assets']['audio_base_url'], '/') . '/'
            . rawurlencode($loteriaConfig['intro']['audio_file']),
    ];
    ?>
    <script type="application/json" id="loteria-bootstrap"><?= json_encode($loteriaBootstrap, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?></script>

    <main class="loteria-app" id="loteria-app" aria-live="polite">
        <header class="loteria-hero">
            <div>
                <span class="loteria-hero__kicker">La mesa esta servida</span>
                <h1>Loteria Mexicana</h1>
                <p>Escoge tu carta, escucha cada baraja y completa las dieciseis casillas.</p>
            </div>
            <div class="loteria-balance" title="Saldo disponible">
                <span>Mi saldo</span>
                <strong id="loteria-balance">—</strong>
                <small>Tibia Coins</small>
            </div>
        </header>

        <section id="loteria-lobby" class="loteria-view">
            <div class="loteria-toolbar">
                <div>
                    <span class="loteria-section-kicker">Mesas disponibles</span>
                    <h2>Salas de juego</h2>
                </div>
                <div class="loteria-toolbar__actions">
                    <button class="loteria-button loteria-button--ghost" type="button" id="loteria-refresh">Actualizar</button>
                    <button class="loteria-button loteria-button--primary" type="button" id="loteria-open-create">Crear sala</button>
                </div>
            </div>
            <div class="loteria-room-grid" id="loteria-room-list">
                <div class="loteria-loading">Buscando salas…</div>
            </div>
        </section>

        <section id="loteria-room" class="loteria-view" hidden>
            <div class="loteria-room-nav">
                <button class="loteria-button loteria-button--ghost" type="button" id="loteria-back">← Volver a salas</button>
                <div class="loteria-room-actions">
                    <button class="loteria-button loteria-button--ghost" type="button" id="loteria-edit" hidden>Editar sala</button>
                    <button class="loteria-button loteria-button--danger" type="button" id="loteria-delete" hidden>Eliminar sala</button>
                    <button class="loteria-button loteria-button--sound" type="button" id="loteria-sound" aria-pressed="true">🔊 Sonido activo</button>
                </div>
            </div>

            <div class="loteria-room-heading">
                <div>
                    <span class="loteria-status" id="loteria-room-status">—</span>
                    <h2 id="loteria-room-name">Sala</h2>
                    <p id="loteria-room-meta">—</p>
                </div>
                <div class="loteria-pot">
                    <span>Pozo actual</span>
                    <strong id="loteria-pot">0</strong>
                    <small>Tibia Coins</small>
                </div>
            </div>

            <div class="loteria-finished-notice" id="loteria-finished-notice" hidden>
                La partida termino, los premios fueron entregados y la sala temporal fue eliminada.
            </div>

            <div class="loteria-game-layout">
                <aside class="loteria-caller-column">
                    <section class="loteria-current-panel" id="loteria-current-panel">
                        <span class="loteria-section-kicker">Baraja actual</span>
                        <div id="loteria-current" class="loteria-current-empty">
                            <strong>Esperando el inicio</strong>
                            <span>El creador comenzara cuando haya suficientes jugadores.</span>
                        </div>
                    </section>

                    <button class="loteria-button loteria-button--start" type="button" id="loteria-start" hidden>Iniciar partida</button>
                </aside>

                <div class="loteria-player-zone">
                    <section class="loteria-history-panel loteria-history-strip-panel">
                        <div class="loteria-panel-title loteria-history-title">
                            <div>
                                <span class="loteria-section-kicker">Historial</span>
                                <h3>Barajas cantadas <span id="loteria-draw-count">0 / 54</span></h3>
                            </div>
                            <button class="loteria-button loteria-button--ghost loteria-button--compact" type="button" id="loteria-history-open" disabled>Ver todas</button>
                        </div>
                        <div class="loteria-draw-history" id="loteria-draw-history">
                            <p class="loteria-empty-copy">Todavia no ha salido ninguna baraja.</p>
                        </div>
                    </section>

                    <section class="loteria-buy-panel" id="loteria-buy-panel" hidden>
                        <div class="loteria-panel-title">
                            <div>
                                <span class="loteria-section-kicker">Tu eleccion</span>
                                <h3>Escoge hasta <?= (int)$loteriaConfig['cards']['per_player'] ?> cartas</h3>
                            </div>
                            <div class="loteria-selection-total" id="loteria-selection-total">0 seleccionadas</div>
                        </div>
                        <div class="loteria-offers" id="loteria-offers"></div>
                        <button class="loteria-button loteria-button--buy" type="button" id="loteria-buy" disabled>Comprar seleccionadas</button>
                    </section>

                    <section class="loteria-my-cards-panel">
                        <div class="loteria-panel-title">
                            <div>
                                <span class="loteria-section-kicker">Tu mesa</span>
                                <h3>Mis cartas</h3>
                            </div>
                            <div class="loteria-card-header-actions">
                                <span class="loteria-help">Solo puedes marcar barajas ya cantadas</span>
                                <div class="loteria-card-nav" id="loteria-card-nav" hidden>
                                    <button type="button" class="loteria-card-nav__button" id="loteria-card-prev" aria-label="Carta anterior">‹</button>
                                    <strong id="loteria-card-position">Carta 1 de 2</strong>
                                    <button type="button" class="loteria-card-nav__button" id="loteria-card-next" aria-label="Carta siguiente">›</button>
                                </div>
                            </div>
                        </div>
                        <div class="loteria-my-cards" id="loteria-my-cards">
                            <p class="loteria-empty-copy">Aun no has comprado cartas en esta sala.</p>
                        </div>
                    </section>

                    <div class="loteria-room-details">
                        <section class="loteria-side-card">
                            <div class="loteria-side-title">
                                <h3>Jugadores</h3>
                                <span id="loteria-player-count">0</span>
                            </div>
                            <ol class="loteria-player-list" id="loteria-player-list"></ol>
                        </section>

                        <section class="loteria-side-card loteria-winners-card">
                            <div class="loteria-side-title">
                                <h3>Ganadores</h3>
                                <span>60 · 25 · 15%</span>
                            </div>
                            <ol class="loteria-winner-list" id="loteria-winner-list"></ol>
                        </section>
                    </div>
                </div>
            </div>
        </section>

        <dialog class="loteria-dialog" id="loteria-create-dialog">
            <form method="dialog" id="loteria-create-form">
                <div class="loteria-dialog__head">
                    <div>
                        <span class="loteria-section-kicker">Nueva mesa</span>
                        <h2>Crear una sala</h2>
                    </div>
                    <button type="button" class="loteria-dialog__close" id="loteria-close-create" aria-label="Cerrar">×</button>
                </div>
                <label>
                    Nombre de la sala
                    <input type="text" name="name" maxlength="<?= (int)$loteriaConfig['room_name_max_length'] ?>" required placeholder="Ej. Noche de Loteria">
                </label>
                <div class="loteria-form-grid">
                    <label>
                        Precio por carta (TC)
                        <input type="number" name="card_price" min="<?= (int)$loteriaConfig['price']['min'] ?>" max="<?= (int)$loteriaConfig['price']['max'] ?>" value="<?= max((int)$loteriaConfig['price']['min'], min(50, (int)$loteriaConfig['price']['max'])) ?>" required>
                    </label>
                    <label>
                        Maximo de jugadores
                        <input type="number" name="max_players" min="<?= (int)$loteriaConfig['players']['min_to_start'] ?>" max="<?= (int)$loteriaConfig['players']['max_allowed'] ?>" value="<?= (int)$loteriaConfig['players']['default_max'] ?>" required>
                    </label>
                </div>
                <label>
                    Velocidad del cantor
                    <select name="speed_seconds" required>
                        <?php foreach ($loteriaConfig['speed']['presets'] as $label => $seconds): ?>
                            <option value="<?= (int)$seconds ?>"<?= $label === 'Normal' ? ' selected' : '' ?>><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?> · <?= (int)$seconds ?> segundos</option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>
                    Modo de victoria
                    <select name="victory_mode" required>
                        <?php foreach ($loteriaConfig['victory_modes'] as $modeValue => $modeLabel): ?>
                            <option value="<?= htmlspecialchars($modeValue, ENT_QUOTES, 'UTF-8') ?>"<?= $modeValue === $loteriaConfig['win_condition'] ? ' selected' : '' ?>><?= htmlspecialchars($modeLabel, ENT_QUOTES, 'UTF-8') ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <p class="loteria-form-note">El creador participa comprando una carta igual que los demas. Se necesitan al menos tres jugadores para comenzar.</p>
                <button class="loteria-button loteria-button--primary loteria-button--wide" type="submit">Crear y entrar</button>
            </form>
        </dialog>

        <dialog class="loteria-dialog" id="loteria-edit-dialog">
            <form method="dialog" id="loteria-edit-form">
                <div class="loteria-dialog__head">
                    <div>
                        <span class="loteria-section-kicker">Configuracion</span>
                        <h2>Editar sala</h2>
                    </div>
                    <button type="button" class="loteria-dialog__close" id="loteria-close-edit" aria-label="Cerrar">×</button>
                </div>
                <label>
                    Nombre de la sala
                    <input type="text" name="name" maxlength="<?= (int)$loteriaConfig['room_name_max_length'] ?>" required>
                </label>
                <div class="loteria-form-grid">
                    <label>
                        Precio por carta (TC)
                        <input type="number" name="card_price" min="<?= (int)$loteriaConfig['price']['min'] ?>" max="<?= (int)$loteriaConfig['price']['max'] ?>" required>
                    </label>
                    <label>
                        Maximo de jugadores
                        <input type="number" name="max_players" min="<?= (int)$loteriaConfig['players']['min_to_start'] ?>" max="<?= (int)$loteriaConfig['players']['max_allowed'] ?>" required>
                    </label>
                </div>
                <label>
                    Velocidad del cantor
                    <select name="speed_seconds" required>
                        <?php foreach ($loteriaConfig['speed']['presets'] as $label => $seconds): ?>
                            <option value="<?= (int)$seconds ?>"><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?> · <?= (int)$seconds ?> segundos</option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>
                    Modo de victoria
                    <select name="victory_mode" required>
                        <?php foreach ($loteriaConfig['victory_modes'] as $modeValue => $modeLabel): ?>
                            <option value="<?= htmlspecialchars($modeValue, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($modeLabel, ENT_QUOTES, 'UTF-8') ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <p class="loteria-form-note">Solo puede editarse antes de iniciar. Cambiar el precio no altera compras que ya fueron cobradas.</p>
                <button class="loteria-button loteria-button--primary loteria-button--wide" type="submit">Guardar cambios</button>
            </form>
        </dialog>

        <dialog class="loteria-dialog loteria-history-dialog" id="loteria-history-dialog">
            <div class="loteria-history-dialog__content">
                <div class="loteria-dialog__head">
                    <div>
                        <span class="loteria-section-kicker">Historial completo</span>
                        <h2>Barajas cantadas</h2>
                        <small id="loteria-history-popup-count">0 barajas</small>
                    </div>
                    <button type="button" class="loteria-dialog__close" id="loteria-history-close" aria-label="Cerrar">×</button>
                </div>
                <div class="loteria-history-popup-grid" id="loteria-history-popup-grid">
                    <p class="loteria-empty-copy">Todavia no ha salido ninguna baraja.</p>
                </div>
            </div>
        </dialog>

        <div class="loteria-toast" id="loteria-toast" role="status" hidden></div>
    </main>
    <script src="<?= htmlspecialchars($loteriaAssetBase . '/tools/loteria.js?v=20260706g', ENT_QUOTES, 'UTF-8') ?>" defer></script>
<?php endif; ?>

<?php
/**
 * Download Client
 *
 * @package   MyAAC
 */
defined('MYAAC') or die('Direct access not allowed!');

$title = 'Download Client';
$getpage_download = $_GET['step'] ?? '';

echo '<link rel="stylesheet" href="/tools/simple-page.css?v=20260531">';

function downloadClientEscape($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$clients = [
    [
        'image' => 'images/tibiaclient.png',
        'title' => 'Mortera Launcher',
        'description' => 'La forma recomendada para jugar. Descarga, instala y mantiene tu cliente actualizado.',
        'tags' => ['Mortera Client 14.12', 'Launcher', 'Auto update'],
        'version' => '14.12',
        'requires' => 'Windows 7 / 8 / 10 / 11',
        'requirements' => "OS:\nWindows 7 o superior (64-bit)\nRAM:\n2 GB minimo\nStorage:\n300 MB libres\nSetup:\nExtrae el ZIP y abre MorteraLauncher.",
        'size' => 'Launcher 1.27 MB / Cliente 300 MB',
        'instructions' => 'Extrae el archivo MW.zip en una carpeta de tu preferencia. No modifiques los archivos internos. Abre MorteraLauncher y comenzara a descargar el cliente; despues se actualizara automaticamente cuando haya cambios.',
        'button' => 'Download Launcher',
        'url' => 'https://www.mediafire.com/file/bfst0jq72axe0tn/MW.zip/file',
    ],
    [
        'image' => 'images/tibiaclient.png',
        'title' => 'Mortera ZIP',
        'description' => 'Cliente completo en ZIP para extraer y ejecutar manualmente.',
        'tags' => ['Mortera Client 14.12', 'ZIP', 'Manual'],
        'version' => '14.12 - Act: 14/09/2025',
        'requires' => 'Windows 7 / 8 / 10 / 11',
        'requirements' => "OS:\nWindows 7 o superior (64-bit)\nRAM:\n2 GB minimo\nStorage:\n300 MB libres\nSetup:\nExtrae el ZIP y ejecuta Bin/client.exe.",
        'size' => 'ZIP 300 MB',
        'instructions' => 'Descarga el archivo ZIP, extraelo en un lugar de tu preferencia, abre la carpeta Bin y ejecuta client.exe.',
        'button' => 'Download ZIP',
        'url' => 'https://www.mediafire.com/file/p9v0f268fdu7dzw/mortera13.zip/file',
    ],
    [
        'image' => 'images/tibiaclient.png',
        'title' => 'Mortera OTC',
        'description' => 'Cliente alternativo liviano para jugar con OTC.',
        'tags' => ['Mortera OTC', 'Alternative', 'Portable'],
        'version' => '14.12 - Act: 14/09/2025',
        'requires' => 'Windows 7 / 8 / 10 / 11',
        'requirements' => "OS:\nWindows 7 o superior (64-bit)\nRAM:\n2 GB minimo\nStorage:\n250 MB libres\nSetup:\nExtrae el ZIP antes de jugar.",
        'size' => 'OTC 250 MB',
        'instructions' => 'Descarga, extrae y juega. Si el cliente se cierra, desactiva la opcion de optimizar FPS.',
        'button' => 'Download OTC',
        'url' => 'https://www.mediafire.com/file/h7l256apfvkn2yt/morteraotc.zip/file',
    ],
];

if (empty($getpage_download)) {
    ?>
    <div class="download-client-page">
        <div class="download-client-divider"><span></span></div>

        <section class="download-client-list">
            <?php foreach ($clients as $index => $client): ?>
                <?php if ($index == 1): ?>
                    <details class="download-client-strip-details">
                        <summary>Standalone Downloads</summary>
                        <div>
                            <p>Contenido pendiente.</p>
                        </div>
                    </details>
                <?php endif; ?>

                <article class="download-client-card">
                    <div class="download-client-media">
                        <img src="<?= downloadClientEscape($client['image']); ?>"
                             alt="<?= downloadClientEscape($client['title']); ?>">
                    </div>

                    <div class="download-client-content">
                        <h2><?= downloadClientEscape($client['title']); ?></h2>
                        <p><?= downloadClientEscape($client['description']); ?></p>

                        <div class="download-client-tags">
                            <?php foreach ($client['tags'] as $tag): ?>
                                <span><?= downloadClientEscape($tag); ?></span>
                            <?php endforeach; ?>
                        </div>

                        <div class="download-client-meta">
                            <span><b>Size:</b> <?= downloadClientEscape($client['size']); ?></span>
                            <span><b>Version:</b> <?= downloadClientEscape($client['version']); ?></span>
                            <span class="download-client-hover">
                                <b>Requires:</b> <?= downloadClientEscape($client['requires']); ?>
                                <span class="download-client-popup">
                                    <strong>Requirements - <?= downloadClientEscape($client['title']); ?></strong>
                                    <?= nl2br(downloadClientEscape($client['requirements'])); ?>
                                </span>
                            </span>
                            <span class="download-client-hover">
                                <b>Instrucciones</b>
                                <span class="download-client-popup">
                                    <strong>Instrucciones - <?= downloadClientEscape($client['title']); ?></strong>
                                    <?= downloadClientEscape($client['instructions']); ?>
                                </span>
                            </span>
                        </div>

                        <a class="download-client-button"
                           href="<?= downloadClientEscape($client['url']); ?>"
                           target="_blank"
                           rel="noopener noreferrer">
                            <?= downloadClientEscape($client['button']); ?>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>

            <details class="download-client-strip-details">
                <summary>Having trouble? Click here for help</summary>
                <div>
            <p><strong>Windows:</strong></p>
            <ul>
                <li>If Windows SmartScreen blocks the installer, click "More info" → "Run anyway".</li>
                <li>Install <a href="https://aka.ms/vs/16/release/vc_redist.x86.exe">Microsoft Visual C++ Redistributable</a> if the client won't start.</li>
                <li>Run the launcher as <strong>Administrator</strong> if downloads fail.</li>
            </ul>
        </div>
            </details>
        </section>
    </div>
    <?php
}

if (($_GET['subtopic'] ?? '') == 'downloadclient' && $getpage_download == 'downloadagreement') {
    ?>
    <div class="download-client-page">
        <section class="download-client-hero">
            <span>Download Client</span>
            <h1>Acuerdo de descarga</h1>
            <p>Lee las condiciones antes de descargar el cliente.</p>
        </section>

        <section class="download-client-note download-client-agreement">
            <h2>Tibia Service Agreement</h2>
            <p>This agreement describes the terms on which CipSoft GmbH offers you access to an account for being able to play the online role playing game "Tibia". By creating an account or downloading the client software you accept the terms and conditions below.</p>
            <p>You agree that the use of the software is at your sole risk. We provide the software, the game, and all other services "as is". We disclaim all warranties or conditions of any kind.</p>
            <p>We are not liable for any lost profits or special, incidental or consequential damages arising out of or in connection with the game.</p>

            <form action="?subtopic=downloadclient" method="post">
                <button class="download-client-button" type="submit">I agree</button>
            </form>
        </section>
    </div>
    <?php
}

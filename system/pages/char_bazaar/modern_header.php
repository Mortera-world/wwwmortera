<?php
defined('MYAAC') or die('Direct access not allowed!');

if (!defined('BAZAAR_MODERN_ASSETS_LOADED')) {
    define('BAZAAR_MODERN_ASSETS_LOADED', true);
    echo '<link rel="stylesheet" href="tools/bazaar-modern.css">';
}

$bazaarSubtopic = $_GET['subtopic'] ?? '';
$bazaarTabs = [
    'currentcharactertrades' => 'Current Auctions',
    'pastcharactertrades' => 'Auction History',
    'ownbids' => 'My Bids',
    'owncharactertrades' => 'My Auctions',
    'createcharacterauction' => 'Create Auction',
];
?>
<section class="bazaar-modern-header">
    <div>
        <span class="bazaar-modern-kicker">Character Bazaar</span>
        <h1><?= htmlspecialchars($title ?? 'Character Bazaar', ENT_QUOTES) ?></h1>
        <p>Compra, vende y administra personajes con una vista mas limpia y facil de leer.</p>
    </div>
    <nav class="bazaar-modern-tabs" aria-label="Character Bazaar navigation">
        <?php foreach ($bazaarTabs as $tabSubtopic => $tabLabel) { ?>
            <a class="<?= $bazaarSubtopic === $tabSubtopic ? 'is-active' : '' ?>" href="?subtopic=<?= $tabSubtopic ?>">
                <?= $tabLabel ?>
            </a>
        <?php } ?>
    </nav>
</section>

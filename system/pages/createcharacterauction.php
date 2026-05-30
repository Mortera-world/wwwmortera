<style>
    form {
        display: block;
        margin-top: 0;
        margin-block-end: 0;
    }

    .CVIcon.CVIconObject img {
        width: 32px;
        height: 32px;
    }

    .CharacterDetailsBlock .ShowMoreOrLess a {
        cursor: pointer;
    }

    .CollapsedBlock .TableContent tr:last-child {
        display: table-row;
        text-align: center;
    }
</style>

<?php
/**
 *
 * Char Bazaar
 *
 */

defined('MYAAC') or die('Direct access not allowed!');
$title = 'Create Auction';

require SYSTEM . 'pages/char_bazaar/modern_header.php';

if ($logged) {
    require SYSTEM . 'pages/char_bazaar/coins_balance.php';
} else {
    if (!empty($errors))
        $twig->display('error_box.html.twig', array('errors' => $errors));

    $twig->display('account.login.html.twig', array(
        'redirect' => isset($_REQUEST['redirect']) ? $_REQUEST['redirect'] : null,
        'account' => USE_ACCOUNT_NAME ? 'Name' : 'Number',
        'account_login_by' => getAccountLoginByLabel(),
        'error' => isset($errors[0]) ? $errors[0] : null
    ));
    return;
}

/* CHAR BAZAAR CONFIG ~ USING IN STEPS, DO NOT REMOVE! */
$charbazaar_create = $config['bazaar_create'];
$charbazaar_tax = $config['bazaar_tax'];
$charbazaar_bid = $config['bazaar_bid'];
$charbazaar_newacc = $config['bazaar_accountid'];
/* CHAR BAZAAR CONFIG END */

$getAuctionStep = $_GET['step'] ?? null;

/* REDIRECT TO STEP 1 */
$allowedSteps = ['1', '2', '3', '4', 'confirm'];
if ($getAuctionStep === null || !in_array((string)$getAuctionStep, $allowedSteps, true)) {
    header('Location: ' . BASE_URL . '?subtopic=createcharacterauction&step=1');
}
/* REDIRECT TO STEP 1 END */

/* STEP 01 START */
if ($getAuctionStep == 1) {
    require SYSTEM . 'pages/char_bazaar/create_step1.php';
}
/* STEP 01 END */

/* STEP 02 START */
if ($getAuctionStep == 2) {
    require SYSTEM . 'pages/char_bazaar/create_step2.php';
}
/* STEP 02 END */

/* STEP 03 START */
if ($getAuctionStep == 3) {
    require SYSTEM . 'pages/char_bazaar/create_step3.php';
}
/* STEP 03 END */

/* STEP 03 START */
if ($getAuctionStep == 4) {
    require SYSTEM . 'pages/char_bazaar/create_step4.php';
}
/* STEP 04 END */

/* STEP CONFIRM START */
if ($getAuctionStep == 'confirm') {
    /* CADASTRAR AUCTION */
    if (isset($_POST['auction_confirm']) && isset($_POST['auction_price']) && isset($_POST['auction_days']) && isset($_POST['auction_character'])) {
        $auction_price = (int) $_POST['auction_price'];
        $auction_days = (int) $_POST['auction_days'];
        $auction_character = (int) $_POST['auction_character'];
        $auctionId = null;
        $auctionError = null;

        if ($auction_price <= 0) {
            $auctionError = 'The auction price must be greater than 0.';
        } elseif ($auction_days < 1 || $auction_days > 28) {
            $auctionError = 'The auction duration must be between 1 and 28 days.';
        } elseif ($auction_character <= 0) {
            $auctionError = 'Invalid character selected.';
        }

        if ($auctionError === null) {
            $characterStatement = $db->prepare('SELECT `id`, `account_id` FROM `players` WHERE `id` = :player LIMIT 1');
            $characterStatement->execute([':player' => $auction_character]);
            $getCharacter = $characterStatement->fetch(PDO::FETCH_ASSOC);

            if (!$getCharacter || (int) $getCharacter['account_id'] !== (int) $account_logged->getId()) {
                $auctionError = 'This character does not belong to your account.';
            }
        }

        if ($auctionError === null) {
            $accountStatement = $db->prepare('SELECT `id`, `coins_transferable` FROM `accounts` WHERE `id` = :account LIMIT 1');
            $accountStatement->execute([':account' => (int) $account_logged->getId()]);
            $getAccount = $accountStatement->fetch(PDO::FETCH_ASSOC);

            $availableCoins = (int) ($getAccount['coins_transferable'] ?? 0);
            if ($availableCoins < (int) $charbazaar_create) {
                $auctionError = 'You do not have enough transferable coins to create this auction.';
            }
        }

        if ($auctionError === null) {
            $date_start = date('Y-m-d H:i:s');
            $date_end = date('Y-m-d H:i:s', strtotime('+' . $auction_days . ' days'));

            try {
                $db->beginTransaction();

                $updateAccountCoins = $db->prepare(
                    'UPDATE `accounts` SET `coins_transferable` = `coins_transferable` - :cost ' .
                    'WHERE `id` = :account AND `coins_transferable` >= :cost'
                );
                $updateAccountCoins->execute([
                    ':cost' => (int) $charbazaar_create,
                    ':account' => (int) $account_logged->getId(),
                ]);

                if ($updateAccountCoins->rowCount() === 0) {
                    throw new RuntimeException('You do not have enough transferable coins to create this auction.');
                }

                $insertAuction = $db->prepare(
                    'INSERT INTO `myaac_charbazaar` ' .
                    '(`account_old`, `account_new`, `player_id`, `price`, `date_end`, `date_start`, `bid_account`, `bid_price`, `status`) ' .
                    'VALUES (:account_old, :account_new, :player_id, :price, :date_end, :date_start, 0, 0, 0)'
                );
                $insertAuction->execute([
                    ':account_old' => (int) $getCharacter['account_id'],
                    ':account_new' => (int) $charbazaar_newacc,
                    ':player_id' => (int) $getCharacter['id'],
                    ':price' => $auction_price,
                    ':date_end' => $date_end,
                    ':date_start' => $date_start,
                ]);

                $auctionId = (int) $db->lastInsertId();
                if ($auctionId <= 0) {
                    throw new RuntimeException('The auction could not be registered.');
                }

                $updateCharacter = $db->prepare(
                    'UPDATE `players` SET `account_id` = :bazaar_account WHERE `id` = :player AND `account_id` = :old_account'
                );
                $updateCharacter->execute([
                    ':bazaar_account' => (int) $charbazaar_newacc,
                    ':player' => (int) $getCharacter['id'],
                    ':old_account' => (int) $getCharacter['account_id'],
                ]);

                if ($updateCharacter->rowCount() === 0) {
                    throw new RuntimeException('The character could not be moved to the bazaar account.');
                }

                $db->commit();
            } catch (Exception $exception) {
                if ($db->inTransaction()) {
                    $db->rollBack();
                }

                $auctionId = null;
                $auctionError = $exception->getMessage();
            }
        }
        /* REGISTER AUCTION END */
        ?>
        <div class="TableContainer">
            <div class="CaptionContainer">
                <div class="CaptionInnerContainer">
                    <span class="CaptionEdgeLeftTop"
                          style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                    <span class="CaptionEdgeRightTop"
                          style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                    <span class="CaptionBorderTop"
                          style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                    <span class="CaptionVerticalLeft"
                          style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                    <div class="Text"><?= $auctionId ? 'Auction created' : 'Auction not created' ?></div>
                    <span class="CaptionVerticalRight"
                          style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-vertical.gif);"></span>
                    <span class="CaptionBorderBottom"
                          style="background-image:url(<?= $template_path; ?>/images/global/content/table-headline-border.gif);"></span>
                    <span class="CaptionEdgeLeftBottom"
                          style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                    <span class="CaptionEdgeRightBottom"
                          style="background-image:url(<?= $template_path; ?>/images/global/content/box-frame-edge.gif);"></span>
                </div>
            </div>
            <table class="Table5" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td>
                        <div class="InnerTableContainer">
                            <table style="width:100%;">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="TableContentContainer">
                                            <table class="TableContent" style="border:1px solid #faf0d7;" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td style="font-weight:normal;">
                                                        <?php if ($auctionId) { ?>
                                                            <img src="<?= $template_path; ?>/images/charactertrade/confirm.gif">
                                                        <?php } else { ?>
                                                            <img src="<?= $template_path; ?>/images/charactertrade/icon_no.png">
                                                        <?php } ?>
                                                    </td>
                                                    <td style="font-weight:bold; font-size: 24px;">
                                                        <?= $auctionId ? 'Auction created' : htmlspecialchars($auctionError ?? 'The auction could not be created.', ENT_QUOTES) ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $auctionId ? '?subtopic=currentcharactertrades&details=' . (int) $auctionId : '?subtopic=createcharacterauction&step=1' ?>">
                                                            <div class="BigButton"
                                                                 style="background-image:url(<?= $template_path; ?>/images/global/buttons/<?= $auctionId ? 'sbutton_green.gif' : 'sbutton.gif' ?>)">
                                                                <div onmouseover="MouseOverBigButton(this);"
                                                                     onmouseout="MouseOutBigButton(this);">
                                                                    <div class="BigButtonOver"
                                                                         style="background-image: url(<?= $template_path; ?>/images/global/buttons/<?= $auctionId ? 'sbutton_green_over.gif' : 'sbutton_over.gif' ?>); visibility: hidden;"></div>
                                                                    <input name="auction_confirm" class="BigButtonText"
                                                                           type="button" value="<?= $auctionId ? 'View auction' : 'Back' ?>"></div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
    /* CADASTRAR AUCTION END */
}
/* STEP CONFIRM END */
?>

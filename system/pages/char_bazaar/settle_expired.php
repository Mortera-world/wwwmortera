<?php
defined('MYAAC') or die('Direct access not allowed!');

if (!function_exists('charBazaarSettleExpiredAuctions')) {
    function charBazaarSettleExpiredAuctions(PDO $db, int $charbazaarTax): void
    {
        static $alreadySettled = false;
        if ($alreadySettled) {
            return;
        }
        $alreadySettled = true;

        $expiredStatement = $db->query(
            'SELECT `id` FROM `myaac_charbazaar` ' .
            'WHERE `status` = 0 AND `date_end` <= NOW() ORDER BY `date_end` ASC'
        );
        $expiredAuctionIds = $expiredStatement ? $expiredStatement->fetchAll(PDO::FETCH_COLUMN) : [];
        if (!$expiredAuctionIds) {
            return;
        }

        foreach ($expiredAuctionIds as $auctionId) {
            try {
                $db->beginTransaction();

                $auctionStatement = $db->prepare(
                    'SELECT `id`, `account_old`, `account_new`, `player_id`, `price`, `status` ' .
                    'FROM `myaac_charbazaar` WHERE `id` = :id FOR UPDATE'
                );
                $auctionStatement->execute([':id' => (int) $auctionId]);
                $auction = $auctionStatement->fetch(PDO::FETCH_ASSOC);

                if (!$auction || (int) $auction['status'] !== 0) {
                    $db->commit();
                    continue;
                }

                $bidStatement = $db->prepare(
                    'SELECT `id`, `account_id`, `bid` FROM `myaac_charbazaar_bid` ' .
                    'WHERE `auction_id` = :auction ORDER BY `bid` DESC, `id` DESC LIMIT 1 FOR UPDATE'
                );
                $bidStatement->execute([':auction' => (int) $auction['id']]);
                $winningBid = $bidStatement->fetch(PDO::FETCH_ASSOC);

                $hasWinner = $winningBid && (int) $winningBid['account_id'] > 0 && (int) $winningBid['bid'] > 0;
                if ($hasWinner) {
                    $winnerAccount = (int) $winningBid['account_id'];
                    $winningAmount = (int) $winningBid['bid'];
                    $sellerCoins = (int) round($winningAmount - (($winningAmount / 100) * $charbazaarTax));
                    if ($sellerCoins < 0) {
                        $sellerCoins = 0;
                    }

                    $updateAuction = $db->prepare(
                        'UPDATE `myaac_charbazaar` ' .
                        'SET `status` = 1, `account_new` = :winner, `bid_account` = :winner, `bid_price` = :bid, `price` = :bid ' .
                        'WHERE `id` = :id AND `status` = 0'
                    );
                    $updateAuction->execute([
                        ':winner' => $winnerAccount,
                        ':bid' => $winningAmount,
                        ':id' => (int) $auction['id'],
                    ]);

                    $updateSellerCoins = $db->prepare(
                        'UPDATE `accounts` SET `coins_transferable` = `coins_transferable` + :coins WHERE `id` = :seller'
                    );
                    $updateSellerCoins->execute([
                        ':coins' => $sellerCoins,
                        ':seller' => (int) $auction['account_old'],
                    ]);

                    $updatePlayer = $db->prepare('UPDATE `players` SET `account_id` = :account WHERE `id` = :player');
                    $updatePlayer->execute([
                        ':account' => $winnerAccount,
                        ':player' => (int) $auction['player_id'],
                    ]);
                } else {
                    $updateAuction = $db->prepare(
                        'UPDATE `myaac_charbazaar` ' .
                        'SET `status` = 2, `account_new` = :seller, `bid_account` = 0, `bid_price` = 0 ' .
                        'WHERE `id` = :id AND `status` = 0'
                    );
                    $updateAuction->execute([
                        ':seller' => (int) $auction['account_old'],
                        ':id' => (int) $auction['id'],
                    ]);

                    $updatePlayer = $db->prepare('UPDATE `players` SET `account_id` = :account WHERE `id` = :player');
                    $updatePlayer->execute([
                        ':account' => (int) $auction['account_old'],
                        ':player' => (int) $auction['player_id'],
                    ]);

                    $deleteBids = $db->prepare('DELETE FROM `myaac_charbazaar_bid` WHERE `auction_id` = :auction');
                    $deleteBids->execute([':auction' => (int) $auction['id']]);
                }

                $db->commit();
            } catch (Exception $exception) {
                if ($db->inTransaction()) {
                    $db->rollBack();
                }
            }
        }
    }
}

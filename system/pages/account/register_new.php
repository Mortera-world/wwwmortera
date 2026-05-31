<?php
/**
 * Register Account New
 *
 * @package   MyAAC
 */
defined('MYAAC') or die('Direct access not allowed!');

$errors = [];
$generatedRecoveryKey = '';
$showForm = true;
$needCoins = (int) ($config['generate_new_reckey_price'] ?? 0);
$coinName = 'transferable Tibia Coins';
$coins = (int) $account_logged->getCustomField('coins_transferable');
$currentRecoveryKey = (string) $account_logged->getCustomField('key');
$canGenerate = true;

if (!$config['generate_new_reckey']) {
    $errors[] = 'Buying a new recovery key is disabled on this server.';
    $canGenerate = false;
} elseif ($currentRecoveryKey === '') {
    $errors[] = 'Your account is not registered yet. Register it first to receive your first recovery key.';
    $canGenerate = false;
} elseif ($needCoins <= 0) {
    $errors[] = 'The recovery key price is not configured correctly.';
    $canGenerate = false;
}

if (isset($_POST['registeraccountsave']) && $_POST['registeraccountsave'] === '1' && $canGenerate) {
    $password = (string) ($_POST['reg_password'] ?? '');
    $encryptedPassword = encrypt(($config_salt_enabled ? $account_logged->getCustomField('salt') : '') . $password);

    if ($password === '' || $encryptedPassword !== $account_logged->getPassword()) {
        $errors[] = 'Wrong password to account.';
    } elseif ($coins < $needCoins) {
        $errors[] = "You need {$needCoins} {$coinName} to generate a new recovery key. You have <b>{$coins}</b> {$coinName}.";
    } else {
        $newRecoveryKey = generateRandomString($config['recovery_key_length'] ?? 15, false, true, true);

        try {
            $db->beginTransaction();

            $accountStatement = $db->prepare('SELECT `coins_transferable` FROM `accounts` WHERE `id` = :account FOR UPDATE');
            $accountStatement->execute([':account' => (int) $account_logged->getId()]);
            $accountRow = $accountStatement->fetch(PDO::FETCH_ASSOC);

            if (!$accountRow || (int) $accountRow['coins_transferable'] < $needCoins) {
                throw new RuntimeException("You need {$needCoins} {$coinName} to generate a new recovery key.");
            }

            $updateAccount = $db->prepare(
                'UPDATE `accounts` SET `coins_transferable` = `coins_transferable` - :cost, `key` = :recovery_key ' .
                'WHERE `id` = :account AND `coins_transferable` >= :cost'
            );
            $updateAccount->execute([
                ':cost' => $needCoins,
                ':recovery_key' => $newRecoveryKey,
                ':account' => (int) $account_logged->getId(),
            ]);

            if ($updateAccount->rowCount() === 0) {
                throw new RuntimeException('The recovery key could not be updated. Try again.');
            }

            $db->commit();

            $generatedRecoveryKey = $newRecoveryKey;
            $coins -= $needCoins;
            $showForm = false;
            $account_logged->logAction("Generated new recovery key for {$needCoins} {$coinName}");
        } catch (Exception $exception) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            $errors[] = $exception->getMessage();
        }
    }
}

if (!empty($errors)) {
    $twig->display('error_box.html.twig', ['errors' => $errors]);
}

$twig->display('account.generate_new_recovery_key.html.twig', [
    'coins' => $coins,
    'coin_name' => $coinName,
    'need_coins' => $needCoins,
    'color' => $coins >= $needCoins ? 'green' : 'red',
    'generated_recovery_key' => $generatedRecoveryKey,
    'show_form' => $canGenerate && $showForm && empty($generatedRecoveryKey),
]);

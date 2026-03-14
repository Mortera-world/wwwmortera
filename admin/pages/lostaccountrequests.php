<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Lost account requests';

if (!$db->hasTable('lost_account_requests')) {
    echo '<p class="error">Table lost_account_requests does not exist yet. Run migrations first.</p>';
    return;
}

$config_salt_enabled = $db->hasColumn('accounts', 'salt');

if (isset($_POST['request_id'], $_POST['decision'])) {
    $requestId = (int)$_POST['request_id'];
    $decision = $_POST['decision'];
    $adminComment = trim($_POST['admin_comment'] ?? '');

    $statement = $db->prepare('SELECT * FROM `lost_account_requests` WHERE `id` = :id');
    $statement->execute([':id' => $requestId]);
    $request = $statement->fetch();

    if (!$request) {
        echo '<p class="error">Request not found.</p>';
    } elseif ($request['status'] !== 'pending') {
        echo '<p class="error">This request is already resolved.</p>';
    } else {
        if ($decision === 'approve') {
            $account = new OTS_Account();
            $account->load((int)$request['account_id']);
            if (!$account->isLoaded()) {
                echo '<p class="error">Target account was not found.</p>';
            } else {
                $newPassword = generateRandomString(12, true, true, false);
                $tmpPassword = $newPassword;
                if ($config_salt_enabled) {
                    $salt = generateRandomString(10, false, true, true);
                    $tmpPassword = $salt . $newPassword;
                    $account->setCustomField('salt', $salt);
                }

                $account->setPassword(encrypt($tmpPassword));
                $account->save();

                $mailInfo = 'Mail not sent (mailer disabled).';
                if (!empty($config['mail_enabled'])) {
                    $mailBody = '<p>Your lost account request was approved.</p>' .
                        '<p>Account name: <b>' . htmlspecialchars($account->getName()) . '</b></p>' .
                        '<p>New password: <b>' . htmlspecialchars($newPassword) . '</b></p>';
                    if (_mail($account->getEMail(), $config['lua']['serverName'] . ' - Lost account request approved', $mailBody)) {
                        $mailInfo = 'Mail sent to account email.';
                    } else {
                        $mailInfo = 'Could not send e-mail, check mailer logs.';
                    }
                }

                $update = $db->prepare('UPDATE `lost_account_requests` SET `status` = :status, `admin_comment` = :admin_comment, `generated_password` = :generated_password, `resolved_by` = :resolved_by, `resolved_at` = :resolved_at WHERE `id` = :id');
                $update->execute([
                    ':status' => 'approved',
                    ':admin_comment' => trim($adminComment . ' ' . $mailInfo),
                    ':generated_password' => $newPassword,
                    ':resolved_by' => $account_logged->getId(),
                    ':resolved_at' => time(),
                    ':id' => $requestId,
                ]);

                echo '<p class="success">Request approved. New password generated: <b>' . $newPassword . '</b>. ' . $mailInfo . '</p>';
            }
        } elseif ($decision === 'reject') {
            $update = $db->prepare('UPDATE `lost_account_requests` SET `status` = :status, `admin_comment` = :admin_comment, `resolved_by` = :resolved_by, `resolved_at` = :resolved_at WHERE `id` = :id');
            $update->execute([
                ':status' => 'rejected',
                ':admin_comment' => $adminComment,
                ':resolved_by' => $account_logged->getId(),
                ':resolved_at' => time(),
                ':id' => $requestId,
            ]);
            echo '<p class="success">Request rejected.</p>';
        }
    }
}

$requests = $db->query('SELECT * FROM `lost_account_requests` ORDER BY `status` = "pending" DESC, `created_at` DESC')->fetchAll();
?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Character</th>
        <th>Account</th>
        <th>Email</th>
        <th>Real Name</th>
        <th>Status</th>
        <th>Created</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($requests as $request): ?>
        <tr>
            <td><?= (int)$request['id']; ?></td>
            <td><?= htmlspecialchars($request['character_name']); ?></td>
            <td><?= htmlspecialchars($request['requested_account_name']); ?></td>
            <td><?= htmlspecialchars($request['requested_email']); ?></td>
            <td><?= htmlspecialchars($request['requested_real_name']); ?></td>
            <td><b><?= htmlspecialchars($request['status']); ?></b></td>
            <td><?= date('Y-m-d H:i:s', (int)$request['created_at']); ?></td>
            <td>
                <?php if ($request['status'] === 'pending'): ?>
                    <form method="post" style="margin-bottom: 6px;">
                        <input type="hidden" name="request_id" value="<?= (int)$request['id']; ?>">
                        <textarea name="admin_comment" class="form-control" placeholder="Admin comment" rows="2"></textarea>
                        <button class="btn btn-success btn-sm" name="decision" value="approve" style="margin-top: 4px;">Approve + generate/send password</button>
                        <button class="btn btn-danger btn-sm" name="decision" value="reject" style="margin-top: 4px;">Reject</button>
                    </form>
                <?php else: ?>
                    <?= htmlspecialchars((string)$request['admin_comment']); ?><br/>
                    <?php if (!empty($request['generated_password'])): ?>
                        Generated password: <b><?= htmlspecialchars($request['generated_password']); ?></b>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

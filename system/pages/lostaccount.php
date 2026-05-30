<?php
/**
 * Lost account
 *
 * @package   MyAAC
 */
defined('MYAAC') or die('Direct access not allowed!');

$title = 'Lost Account';
$config_salt_enabled = $db->hasColumn('accounts', 'salt');

function lostAccountEscape($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function lostAccountPost($key)
{
    return trim((string)($_POST[$key] ?? ''));
}

function lostAccountFindByCharacter($characterName)
{
    global $db;

    $statement = $db->prepare('
        SELECT
            a.`id`,
            a.`name`,
            a.`email`,
            a.`key`,
            p.`name` AS `character_name`
        FROM `players` p
        INNER JOIN `accounts` a ON a.`id` = p.`account_id`
        WHERE LOWER(p.`name`) = LOWER(:character_name)
        LIMIT 1
    ');
    $statement->execute([':character_name' => $characterName]);
    $account = $statement->fetch(PDO::FETCH_ASSOC);

    return $account ?: null;
}

function lostAccountFindByAccountAndCharacter($accountName, $characterName)
{
    global $db;

    $statement = $db->prepare('
        SELECT
            a.`id`,
            a.`name`,
            a.`email`,
            a.`key`,
            p.`name` AS `character_name`
        FROM `accounts` a
        INNER JOIN `players` p ON p.`account_id` = a.`id`
        WHERE LOWER(a.`name`) = LOWER(:account_name)
            AND LOWER(p.`name`) = LOWER(:character_name)
        LIMIT 1
    ');
    $statement->execute([
        ':account_name' => $accountName,
        ':character_name' => $characterName,
    ]);
    $account = $statement->fetch(PDO::FETCH_ASSOC);

    return $account ?: null;
}

function lostAccountFindByRecoveryKey($recoveryKey)
{
    global $db;

    $statement = $db->prepare('
        SELECT `id`, `name`, `email`, `key`
        FROM `accounts`
        WHERE `key` = :recovery_key
        LIMIT 2
    ');
    $statement->execute([':recovery_key' => $recoveryKey]);
    $accounts = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (count($accounts) !== 1) {
        return null;
    }

    return $accounts[0];
}

function lostAccountKeyMatches($account, $recoveryKey)
{
    if ($recoveryKey === '' || empty($account['key'])) {
        return false;
    }

    return hash_equals((string)$account['key'], $recoveryKey);
}

function lostAccountSetTemporaryPassword($accountId)
{
    global $db, $config_salt_enabled;

    $newPassword = str_shuffle(
        generateRandomString(5, true, false, false) .
        generateRandomString(5, false, true, false) .
        generateRandomString(4, false, false, true)
    );
    $passwordForHash = $newPassword;
    $fields = [];

    if ($config_salt_enabled) {
        $salt = generateRandomString(10, false, true, true);
        $passwordForHash = $salt . $newPassword;
        $fields['salt'] = $salt;
    }

    $fields['password'] = encrypt($passwordForHash);
    $db->update('accounts', $fields, ['id' => (int)$accountId]);

    return $newPassword;
}

function lostAccountResult($account, $message, $temporaryPassword = null)
{
    return [
        'message' => $message,
        'account_name' => $account['name'] ?? '',
        'email' => $account['email'] ?? '',
        'temporary_password' => $temporaryPassword,
    ];
}

$errors = [];
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lostAction = lostAccountPost('lost_action');
    $recoveryKey = lostAccountPost('recovery_key');
    $characterName = lostAccountPost('character_name');
    $accountName = lostAccountPost('account_name');

    if ($recoveryKey === '') {
        $errors[] = 'Escribe tu recovery key.';
    } else {
        if ($lostAction === 'email_by_key') {
            $account = lostAccountFindByRecoveryKey($recoveryKey);

            if (!$account) {
                $errors[] = 'No se encontro ninguna cuenta con esa recovery key.';
            } else {
                $result = lostAccountResult($account, 'Recovery key verificada. Este es el correo registrado en la cuenta.');
            }
        } elseif ($lostAction === 'account_character_password') {
            if (!Validator::accountName($accountName)) {
                $errors[] = 'El account name no tiene un formato valido.';
            }

            if (!Validator::characterName($characterName)) {
                $errors[] = 'El nombre del personaje no tiene un formato valido.';
            }

            if (empty($errors)) {
                $account = lostAccountFindByAccountAndCharacter($accountName, $characterName);

                if (!$account) {
                    $errors[] = 'Los datos no coinciden con una misma cuenta.';
                } elseif (!lostAccountKeyMatches($account, $recoveryKey)) {
                    $errors[] = 'La recovery key no coincide con esa cuenta.';
                } else {
                    $temporaryPassword = lostAccountSetTemporaryPassword((int)$account['id']);
                    $result = lostAccountResult($account, 'Datos verificados. Se genero una nueva contrasena temporal.', $temporaryPassword);
                }
            }
        } elseif ($lostAction === 'character_password') {
            if (!Validator::characterName($characterName)) {
                $errors[] = 'El nombre del personaje no tiene un formato valido.';
            }

            if (empty($errors)) {
                $account = lostAccountFindByCharacter($characterName);

                if (!$account) {
                    $errors[] = 'No se encontro ningun personaje con ese nombre.';
                } elseif (!lostAccountKeyMatches($account, $recoveryKey)) {
                    $errors[] = 'La recovery key no coincide con esa cuenta.';
                } else {
                    $temporaryPassword = lostAccountSetTemporaryPassword((int)$account['id']);
                    $result = lostAccountResult($account, 'Datos verificados. Guarda esta informacion antes de cerrar el aviso.', $temporaryPassword);
                }
            }
        } else {
            $errors[] = 'Selecciona un metodo de recuperacion valido.';
        }
    }
}
?>
<link rel="stylesheet" href="tools/simple-page.css">

<div class="lost-account-page">
    <section class="lost-account-hero">
        <span>Account recovery</span>
        <h1>Lost Account</h1>
        <p>Recupera tu cuenta con la recovery key y datos que solo el dueno deberia conocer. Las contrasenas no se muestran desde la base de datos: se genera una nueva contrasena temporal y aparece una sola vez.</p>
    </section>

    <?php if (!empty($errors)): ?>
        <div class="lost-account-alert lost-account-alert-error">
            <strong>No se pudo recuperar la cuenta</strong>
            <?php foreach ($errors as $error): ?>
                <span><?php echo lostAccountEscape($error); ?></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <section class="lost-account-grid">
        <article class="lost-account-card">
            <div class="lost-account-card-heading">
                <span>Metodo 1</span>
                <h2>Personaje + recovery key</h2>
                <p>Si recuerdas un personaje de la cuenta, verifica la key y recibe una nueva contrasena temporal.</p>
            </div>
            <form class="lost-account-form" method="post" action="?subtopic=lostaccount">
                <input type="hidden" name="lost_action" value="character_password">
                <label>
                    Nombre del personaje
                    <input type="text" name="character_name" maxlength="25" required>
                </label>
                <label>
                    Recovery key
                    <input type="text" name="recovery_key" required>
                </label>
                <button class="lost-account-button" type="submit">Recuperar contrasena</button>
            </form>
        </article>

        <article class="lost-account-card">
            <div class="lost-account-card-heading">
                <span>Metodo 2</span>
                <h2>Olvide mi correo</h2>
                <p>Si aun tienes tu recovery key, puedes ver el correo registrado sin cambiar la contrasena.</p>
            </div>
            <form class="lost-account-form" method="post" action="?subtopic=lostaccount">
                <input type="hidden" name="lost_action" value="email_by_key">
                <label>
                    Recovery key
                    <input type="text" name="recovery_key" required>
                </label>
                <button class="lost-account-button" type="submit">Mostrar correo</button>
            </form>
        </article>

        <article class="lost-account-card">
            <div class="lost-account-card-heading">
                <span>Metodo 3</span>
                <h2>Cuenta + personaje + key</h2>
                <p>Cuando recuerdas el account name pero no el correo ni la contrasena, confirma todo aqui.</p>
            </div>
            <form class="lost-account-form" method="post" action="?subtopic=lostaccount">
                <input type="hidden" name="lost_action" value="account_character_password">
                <label>
                    Account name
                    <input type="text" name="account_name" maxlength="32" required>
                </label>
                <label>
                    Nombre del personaje
                    <input type="text" name="character_name" maxlength="25" required>
                </label>
                <label>
                    Recovery key
                    <input type="text" name="recovery_key" required>
                </label>
                <button class="lost-account-button" type="submit">Verificar y recuperar</button>
            </form>
        </article>

    </section>
</div>

<?php if ($result): ?>
    <div class="lost-account-modal" id="lost-account-modal" role="dialog" aria-modal="true" aria-labelledby="lost-account-modal-title">
        <div class="lost-account-modal-card">
            <span class="lost-account-modal-kicker">Ver una sola vez</span>
            <h2 id="lost-account-modal-title">Informacion recuperada</h2>
            <p><?php echo lostAccountEscape($result['message']); ?></p>

            <div class="lost-account-result-list">
                <?php if (!empty($result['account_name'])): ?>
                    <div>
                        <span>Account name</span>
                        <strong><?php echo lostAccountEscape($result['account_name']); ?></strong>
                    </div>
                <?php endif; ?>

                <?php if (!empty($result['email'])): ?>
                    <div>
                        <span>Correo</span>
                        <strong><?php echo lostAccountEscape($result['email']); ?></strong>
                    </div>
                <?php endif; ?>

                <?php if (!empty($result['temporary_password'])): ?>
                    <div>
                        <span>Nueva contrasena temporal</span>
                        <strong class="lost-account-secret"><?php echo lostAccountEscape($result['temporary_password']); ?></strong>
                    </div>
                <?php endif; ?>
            </div>

            <p class="lost-account-warning">Guarda esta informacion antes de cerrar este aviso. Al recargar la pagina, la contrasena temporal ya no se volvera a mostrar.</p>
            <button class="lost-account-button lost-account-close" type="button" data-close-lost-account>Entendido, ocultar</button>
        </div>
    </div>
    <script>
        document.querySelector('[data-close-lost-account]')?.addEventListener('click', function () {
            var modal = document.getElementById('lost-account-modal');
            if (modal) {
                modal.setAttribute('hidden', 'hidden');
            }
        });
    </script>
<?php endif; ?>

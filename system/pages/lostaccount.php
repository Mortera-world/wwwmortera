<?php
/**
 * Lost account
 *
 * @package   MyAAC
 * @author    Gesior <jerzyskalski@wp.pl>
 * @author    Slawkens <slawkens@gmail.com>
 * @author    OpenTibiaBR
 * @copyright 2023 MyAAC
 * @link      https://github.com/opentibiabr/myaac
 */
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Lost Account Interface';

$config_salt_enabled = $db->hasColumn('accounts', 'salt');
$action_type = isset($_REQUEST['action_type']) ? $_REQUEST['action_type'] : '';
if ($action == '') {
    $twig->display('account.lost.form.html.twig');
} else if ($action == 'step1' && $action_type == '') {
    $twig->display('account.lost.noaction.html.twig');
} elseif ($action == 'step1' && $action_type == 'email') {
    $nick = stripslashes($_REQUEST['nick']);
    if (Validator::characterName($nick)) {
        $player = new OTS_Player();
        $account = new OTS_Account();
        $player->find($nick);
        if ($player->isLoaded())
            $account = $player->getAccount();

        if ($account->isLoaded()) {
            if ($account->getCustomField('email_next') < time())
                echo 'Please enter e-mail to account with this character.<BR>
				<form action="?subtopic=lostaccount&action=sendcode" method=post>
				<input type=hidden name="character">
				<table cellspacing=1 cellpadding=4 border=0 width=100%>
				<TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Please enter e-mail to account</B></TD></TR>
				<TR><TD BGCOLOR="' . $config['darkborder'] . '">
				Character: <INPUT TYPE=text NAME="nick" VALUE="' . $nick . '" SIZE="40" readonly="readonly"><BR>
				E-mail to account:<INPUT TYPE=text NAME="email" VALUE="" SIZE="40"><BR>
				</TD></TR>
				</TABLE>
				<BR>
				<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				' . $twig->render('buttons.submit.html.twig') . '</div>
				</TD></TR></FORM></TABLE></TABLE>';
            else {
                $insec = $account->getCustomField('email_next') - time();
                $minutesleft = floor($insec / 60);
                $secondsleft = $insec - ($minutesleft * 60);
                $timeleft = $minutesleft . ' minutes ' . $secondsleft . ' seconds';
                echo 'Account of selected character (<b>' . $nick . '</b>) received e-mail in last ' . ceil($config['email_lai_sec_interval'] / 60) . ' minutes. You must wait ' . $timeleft . ' before you can use Lost Account Interface again.';
            }
        } else
            echo 'Player or account of player <b>' . $nick . '</b> doesn\'t exist.';
    } else
        echo 'Invalid player name format. If you have other characters on account try with other name.';
    echo '<BR /><TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				<a href="?subtopic=lostaccount" border="0"><IMG SRC="' . $template_path . '/images/global/buttons/sbutton_back.gif" NAME="Back" ALT="Back" BORDER=0 WIDTH=120 HEIGHT=18></a></div>
				</TD></TR></FORM></TABLE></TABLE>';
} elseif ($action == 'sendcode') {
    $email = $_REQUEST['email'];
    $nick = stripslashes($_REQUEST['nick']);
    if (Validator::characterName($nick)) {
        $player = new OTS_Player();
        $account = new OTS_Account();
        $player->find($nick);
        if ($player->isLoaded())
            $account = $player->getAccount();

        if ($account->isLoaded()) {
            if ($account->getCustomField('email_next') < time()) {
                if ($account->getEMail() == $email) {
                    $newcode = generateRandomString(30, true, false, true);
                    $mailBody = '
					You asked to reset your ' . $config['lua']['serverName'] . ' password.<br/>
					<p>Account name: ' . $account->getCustomField('name') . '</p>
					<br />
					To do so, please click this link:
					<p><a href="' . BASE_URL . '?subtopic=lostaccount&action=checkcode&code=' . $newcode . '&character=' . urlencode($nick) . '">' . BASE_URL . '/?subtopic=lostaccount&action=checkcode&code=' . $newcode . '&character=' . urlencode($nick) . '</a></p>
					<p>or open page: <i>' . BASE_URL . '?subtopic=lostaccount&action=checkcode</i> and in field "code" write <b>' . $newcode . '</b></p>
					<br/>
						<p>If you did not request a password change, you may ignore this message and your password will remain unchanged.';

                    $account_mail = $account->getCustomField('email');
                    if (_mail($account_mail, $config['lua']['serverName'] . ' - Recover your account', $mailBody)) {
                        $account->setCustomField('email_code', $newcode);
                        $account->setCustomField('email_next', (time() + $config['email_lai_sec_interval']));
                        echo '<br />Details about steps required to recover your account has been sent to <b>' . $account_mail . '</b>. You should receive this email within 15 minutes. Please check your inbox/spam directory.';
                    } else {
                        $account->setCustomField('email_next', (time() + 60));
                        echo '<br /><p class="error">An error occurred while sending email! Try again later or contact with admin. For Admin: More info can be found in system/logs/mailer-error.log</p>';
                    }
                } else
                    echo 'Invalid e-mail to account of character <b>' . $nick . '</b>. Try again.';
            } else {
                $insec = $account->getCustomField('email_next') - time();
                $minutesleft = floor($insec / 60);
                $secondsleft = $insec - ($minutesleft * 60);
                $timeleft = $minutesleft . ' minutes ' . $secondsleft . ' seconds';
                echo 'Account of selected character (<b>' . $nick . '</b>) received e-mail in last ' . ceil($config['email_lai_sec_interval'] / 60) . ' minutes. You must wait ' . $timeleft . ' before you can use Lost Account Interface again.';
            }
        } else
            echo 'Player or account of player <b>' . $nick . '</b> doesn\'t exist.';
    } else
        echo 'Invalid player name format. If you have other characters on account try with other name.';
    echo '<BR /><TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				<a href="?subtopic=lostaccount&action=step1&action_type=email&nick=' . urlencode($nick) . '" border="0"><IMG SRC="' . $template_path . '/images/global/buttons/sbutton_back.gif" NAME="Back" ALT="Back" BORDER=0 WIDTH=120 HEIGHT=18></a></div>
				</TD></TR></FORM></TABLE></TABLE>';
} elseif ($action == 'step1' && $action_type == 'reckey') {
    $nick = stripslashes($_REQUEST['nick']);
    if (Validator::characterName($nick)) {
        $player = new OTS_Player();
        $account = new OTS_Account();
        $player->find($nick);
        if ($player->isLoaded())
            $account = $player->getAccount();
        if ($account->isLoaded()) {
            $account_key = $account->getCustomField('key');
            if (!empty($account_key)) {
                echo 'If you enter right recovery key you will see form to set new e-mail and password to account. To this e-mail will be send your new password and account name.<BR>
						<FORM ACTION="?subtopic=lostaccount&action=step2" METHOD=post>
						<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
						<TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Please enter your recovery key</B></TD></TR>
						<TR><TD BGCOLOR="' . $config['darkborder'] . '">
						Character name:&nbsp;<INPUT TYPE=text NAME="nick" VALUE="' . $nick . '" SIZE="40" readonly="readonly"><BR />
						Recovery key:&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=text NAME="key" VALUE="" SIZE="40"><BR>
						</TD></TR>
						</TABLE>
						<BR>
						<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
						' . $twig->render('buttons.submit.html.twig') . '</div>
						</TD></TR></FORM></TABLE></TABLE>';
            } else
                echo 'Account of this character has no recovery key!';
        } else
            echo 'Player or account of player <b>' . $nick . '</b> doesn\'t exist.';
    } else
        echo 'Invalid player name format. If you have other characters on account try with other name.';
    echo '<BR /><TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				<a href="?subtopic=lostaccount" border="0"><IMG SRC="' . $template_path . '/images/global/buttons/sbutton_back.gif" NAME="Back" ALT="Back" BORDER=0 WIDTH=120 HEIGHT=18></a></div>
				</TD></TR></FORM></TABLE></TABLE>';
} elseif ($action == 'step1' && $action_type == 'manual') {
    $nick = stripslashes($_REQUEST['nick']);
    if (Validator::characterName($nick)) {
        $player = new OTS_Player();
        $account = new OTS_Account();
        $player->find($nick);
        if ($player->isLoaded())
            $account = $player->getAccount();

        if ($account->isLoaded()) {
            echo 'Manual recovery verification.<BR>
                <FORM ACTION="?subtopic=lostaccount&action=manualrequest" METHOD=post>
                <TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
                <TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Provide account data for admin verification</B></TD></TR>
                <TR><TD BGCOLOR="' . $config['darkborder'] . '">
                Character:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=text NAME="nick" VALUE="' . $nick . '" SIZE="40" readonly="readonly"><BR />
                Account name:&nbsp;&nbsp;<INPUT TYPE=text NAME="account_name" VALUE="" SIZE="40"><BR />
                E-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=text NAME="email" VALUE="" SIZE="40"><BR />
                Real name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=text NAME="real_name" VALUE="" SIZE="40"><BR />
                </TD></TR>
                </TABLE>
                <BR>
                <TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
                ' . $twig->render('buttons.submit.html.twig') . '</div>
                </TD></TR></FORM></TABLE></TABLE>';
        } else
            echo 'Player or account of player <b>' . $nick . '</b> doesn\'t exist.';
    } else
        echo 'Invalid player name format. If you have other characters on account try with other name.';

    echo '<BR /><TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
                <a href="?subtopic=lostaccount" border="0"><IMG SRC="' . $template_path . '/images/global/buttons/sbutton_back.gif" NAME="Back" ALT="Back" BORDER=0 WIDTH=120 HEIGHT=18></a></div>
                </TD></TR></FORM></TABLE></TABLE>';
} elseif ($action == 'manualrequest') {
    $nick = stripslashes($_REQUEST['nick']);
    $account_name = trim($_REQUEST['account_name']);
    $email = trim($_REQUEST['email']);
    $real_name = trim($_REQUEST['real_name']);

    if (!Validator::characterName($nick)) {
        echo 'Invalid player name format. If you have other characters on account try with other name.';
    } else {
        $player = new OTS_Player();
        $account = new OTS_Account();
        $player->find($nick);
        if ($player->isLoaded())
            $account = $player->getAccount();

        if ($account->isLoaded()) {
            $matches = $account->getName() === $account_name
                && strtolower($account->getEMail()) === strtolower($email)
                && strtolower(trim($account->getRLName())) === strtolower($real_name);

            if ($matches) {
                if (!$db->hasTable('lost_account_requests')) {
                    echo '<p class="error">Manual recovery system is not ready yet. Please contact admin.</p>';
                } else {
                    $statement = $db->prepare('INSERT INTO `lost_account_requests` (`account_id`, `character_name`, `requested_account_name`, `requested_email`, `requested_real_name`, `status`, `created_at`) VALUES (:account_id, :character_name, :requested_account_name, :requested_email, :requested_real_name, :status, :created_at)');
                    $statement->execute([
                        ':account_id' => $account->getId(),
                        ':character_name' => $nick,
                        ':requested_account_name' => $account_name,
                        ':requested_email' => $email,
                        ':requested_real_name' => $real_name,
                        ':status' => 'pending',
                        ':created_at' => time(),
                    ]);

                    echo '<p class="success">Your request was created successfully and is now waiting for admin review.</p>';
                }
            } else {
                echo '<p class="error">Provided data does not match this account. Request was not created.</p>';
            }
        } else {
            echo 'Player or account of player <b>' . $nick . '</b> doesn\'t exist.';
        }
    }

    echo '<BR /><TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
                <a href="?subtopic=lostaccount" border="0"><IMG SRC="' . $template_path . '/images/global/buttons/sbutton_back.gif" NAME="Back" ALT="Back" BORDER=0 WIDTH=120 HEIGHT=18></a></div>
                </TD></TR></FORM></TABLE></TABLE>';

} elseif ($action == 'step2') {
    $rec_key = trim($_REQUEST['key']);
    $nick = stripslashes($_REQUEST['nick']);
    if (Validator::characterName($nick)) {
        $player = new OTS_Player();
        $account = new OTS_Account();
        $player->find($nick);
        if ($player->isLoaded())
            $account = $player->getAccount();
        if ($account->isLoaded()) {
            $account_key = $account->getCustomField('key');
            if (!empty($account_key)) {
                if ($account_key == $rec_key) {
                    $newpassword = generateRandomString(12, true, true, false);
                    $tmp_new_pass = $newpassword;
                    if ($config_salt_enabled) {
                        $salt = generateRandomString(10, false, true, true);
                        $tmp_new_pass = $salt . $newpassword;
                        $account->setCustomField('salt', $salt);
                    }

                    $account->setPassword(encrypt($tmp_new_pass));
                    $account->save();

                    echo 'Recovery key verified successfully. Your new password is shown below.<BR>
                    <TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
                    <TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Recovered account credentials</B></TD></TR>
                    <TR><TD BGCOLOR="' . $config['darkborder'] . '">
                    Account name:&nbsp;<b>' . $account->getName() . '</b><BR />
                    New password:&nbsp;<b>' . $newpassword . '</b><BR />
                    </TD></TR>
                    </TABLE>';
                } else
                    echo 'Wrong recovery key!';
            } else
                echo 'Account of this character has no recovery key!';
        } else
            echo 'Player or account of player <b>' . $nick . '</b> doesn\'t exist.';
    } else
        echo 'Invalid player name format. If you have other characters on account try with other name.';
    echo '<BR /><TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				<a href="?subtopic=lostaccount&action=step1&action_type=reckey&nick=' . urlencode($nick) . '" border="0"><IMG SRC="' . $template_path . '/images/global/buttons/sbutton_back.gif" NAME="Back" ALT="Back" BORDER=0 WIDTH=120 HEIGHT=18></a></div>
				</TD></TR></FORM></TABLE></TABLE>';
} elseif ($action == 'step3') {
    $rec_key = trim($_REQUEST['key']);
    $nick = stripslashes($_REQUEST['nick']);
    $new_pass = trim($_REQUEST['passor']);
    $new_email = trim($_REQUEST['email']);
    if (Validator::characterName($nick)) {
        $player = new OTS_Player();
        $account = new OTS_Account();
        $player->find($nick);
        if ($player->isLoaded())
            $account = $player->getAccount();
        if ($account->isLoaded()) {
            $account_key = $account->getCustomField('key');
            if (!empty($account_key)) {
                if ($account_key == $rec_key) {
                    $newpassword = generateRandomString(12, true, true, false);
                    $tmp_new_pass = $newpassword;
                    if ($config_salt_enabled) {
                        $salt = generateRandomString(10, false, true, true);
                        $tmp_new_pass = $salt . $newpassword;
                        $account->setCustomField('salt', $salt);
                    }

                    $account->setPassword(encrypt($tmp_new_pass));
                    $account->save();

                    echo 'Recovery key verified successfully. Your new password is shown below.<BR>
                    <TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
                    <TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Recovered account credentials</B></TD></TR>
                    <TR><TD BGCOLOR="' . $config['darkborder'] . '">
                    Account name:&nbsp;<b>' . $account->getName() . '</b><BR />
                    New password:&nbsp;<b>' . $newpassword . '</b><BR />
                    </TD></TR>
                    </TABLE>';
                } else
                    echo 'Wrong recovery key!';
            } else
                echo 'Account of this character has no recovery key!';
        } else
            echo 'Player or account of player <b>' . $nick . '</b> doesn\'t exist.';
    } else
        echo 'Invalid player name format. If you have other characters on account try with other name.';
    echo '<BR /><TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				<a href="?subtopic=lostaccount&action=step1&action_type=reckey&nick=' . urlencode($nick) . '" border="0"><IMG SRC="' . $template_path . '/images/global/buttons/sbutton_back.gif" NAME="Back" ALT="Back" BORDER=0 WIDTH=120 HEIGHT=18></a></div>
				</TD></TR></FORM></TABLE></TABLE>';
} elseif ($action == 'checkcode') {
    $code = trim($_REQUEST['code']);
    $character = stripslashes(trim($_REQUEST['character']));
    if (empty($code) || empty($character))
        echo 'Please enter code from e-mail and name of one character from account. Then press Submit.<BR>
				<FORM ACTION="?subtopic=lostaccount&action=checkcode" METHOD=post>
				<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
				<TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Code & character name</B></TD></TR>
				<TR><TD BGCOLOR="' . $config['darkborder'] . '">
				Your code:&nbsp;<INPUT TYPE=text NAME="code" VALUE="" SIZE="40")><BR />
				Character:&nbsp;<INPUT TYPE=text NAME="character" VALUE="" SIZE="40")><BR />
				</TD></TR>
				</TABLE>
				<BR>
				<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				' . $twig->render('buttons.submit.html.twig') . '</div>
				</TD></TR></FORM></TABLE></TABLE>';
    else {
        $player = new OTS_Player();
        $account = new OTS_Account();
        $player->find($character);
        if ($player->isLoaded())
            $account = $player->getAccount();
        if ($account->isLoaded()) {
            if ($account->getCustomField('email_code') == $code) {
                echo '<script type="text/javascript">
				function validate_required(field,alerttxt)
				{
				with (field)
				{
				if (value==null||value==""||value==" ")
				  {alert(alerttxt);return false;}
				else {return true}
				}
				}

				function validate_form(thisform)
				{
				with (thisform)
				{
				if (validate_required(passor,"Please enter password!")==false)
				  {passor.focus();return false;}
				if (validate_required(passor2,"Please repeat password!")==false)
				  {passor2.focus();return false;}
				if (passor2.value!=passor.value)
				  {alert(\'Repeated password is not equal to password!\');return false;}
				}
				}
				</script>
				Please enter new password to your account and repeat to make sure you remember password.<BR>
				<FORM ACTION="?subtopic=lostaccount&action=setnewpassword" onsubmit="return validate_form(this)" METHOD=post>
				<INPUT TYPE=hidden NAME="character" VALUE="' . $character . '">
				<INPUT TYPE=hidden NAME="code" VALUE="' . $code . '">
				<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
				<TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Code & account name</B></TD></TR>
				<TR><TD BGCOLOR="' . $config['darkborder'] . '">
				New password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=password ID="passor" NAME="passor" VALUE="" SIZE="40")><BR />
				Repeat new password:&nbsp;<INPUT TYPE=password ID="passor2" NAME="passor2" VALUE="" SIZE="40")><BR />
				</TD></TR>
				</TABLE>
				<BR>
				<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				' . $twig->render('buttons.submit.html.twig') . '</div>
				</TD></TR></FORM></TABLE></TABLE>';
            } else
                $error = 'Wrong code to change password.';
        } else
            $error = 'Account of this character or this character doesn\'t exist.';
    }
    if (!empty($error))
        echo '<span style="color: red"><b>' . $error . '</b></span><br />Please enter code from e-mail and name of one character from account. Then press Submit.<BR>
				<FORM ACTION="?subtopic=lostaccount&action=checkcode" METHOD=post>
				<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
				<TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Code & character name</B></TD></TR>
				<TR><TD BGCOLOR="' . $config['darkborder'] . '">
				Your code:&nbsp;<INPUT TYPE=text NAME="code" VALUE="" SIZE="40")><BR />
				Character:&nbsp;<INPUT TYPE=text NAME="character" VALUE="" SIZE="40")><BR />
				</TD></TR>
				</TABLE>
				<BR>
				<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				' . $twig->render('buttons.submit.html.twig') . '</div>
				</TD></TR></FORM></TABLE></TABLE>';
} elseif ($action == 'setnewpassword') {
    $newpassword = $_REQUEST['passor'];
    $code = $_REQUEST['code'];
    $character = stripslashes($_REQUEST['character']);
    echo '';
    if (empty($code) || empty($character) || empty($newpassword))
        echo '<span style="color: red"><b>Error. Try again.</b></span><br />Please enter code from e-mail and name of one character from account. Then press Submit.<BR>
				<BR><FORM ACTION="?subtopic=lostaccount&action=checkcode" METHOD=post>
				<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				<INPUT TYPE=image NAME="Back" ALT="Back" SRC="' . $template_path . '/images/global/buttons/sbutton_back.gif" BORDER=0 WIDTH=120 HEIGHT=18></div>
				</TD></TR></FORM></TABLE></TABLE>';
    else {
        $player = new OTS_Player();
        $account = new OTS_Account();
        $player->find($character);
        if ($player->isLoaded())
            $account = $player->getAccount();
        if ($account->isLoaded()) {
            if ($account->getCustomField('email_code') == $code) {
                if (Validator::password($newpassword)) {
                    $tmp_new_pass = $newpassword;
                    if ($config_salt_enabled) {
                        $salt = generateRandomString(10, false, true, true);
                        $tmp_new_pass = $salt . $newpassword;
                        $account->setCustomField('salt', $salt);
                    }

                    $account->setPassword(encrypt($tmp_new_pass));
                    $account->setName($account->getCustomField('name'));
                    $account->save();
                    $account->setCustomField('email_code', '');
                    echo 'New password to your account is below. Now you can login.<BR>
					<INPUT TYPE=hidden NAME="character" VALUE="' . $character . '">
					<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
					<TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Changed password</B></TD></TR>
					<TR><TD BGCOLOR="' . $config['darkborder'] . '">
					New password:&nbsp;<b>' . $newpassword . '</b><BR />
					Account name:&nbsp;<i>(already on your e-mail)</i><BR />';

                    $mailBody = '
					<h3>Your account name and password!</h3>
					<p>Changed password to your account in Lost Account Interface on server <a href="' . BASE_URL . '"><b>' . $config['lua']['serverName'] . '</b></a></p>
					<p>Account name: <b>' . $account->getName() . '</b></p>
					<p>New password: <b>' . $newpassword . '</b></p>
					<br />
					<p><u>It\'s automatic e-mail from OTS Lost Account System. Do not reply!</u></p>';

                    if (_mail($account->getCustomField('email'), $config['lua']['serverName'] . " - Your new password", $mailBody)) {
                        echo '<br /><small>New password work! Sent e-mail with your password and account name. You should receive this e-mail in 15 minutes. You can login now with new password!';
                    } else {
                        echo '<br /><p class="error">New password work! An error occurred while sending email! You will not receive e-mail with new password. For Admin: More info can be found in system/logs/mailer-error.log';
                    }
                    echo '</TD></TR>
				</TABLE>
				<BR>
				<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				<FORM ACTION="?subtopic=accountmanagement" METHOD=post>
				<INPUT TYPE=image NAME="Login" ALT="Login" SRC="' . $template_path . '/images/global/buttons/sbutton_login.gif" BORDER=0 WIDTH=120 HEIGHT=18></div>
				</TD></TR></FORM></TABLE></TABLE>';
                } else
                    $error = Validator::getLastError();
            } else
                $error = 'Wrong code to change password.';
        } else
            $error = 'Account of this character or this character doesn\'t exist.';
    }
    if (!empty($error))
        echo '<span style="color: red"><b>' . $error . '</b></span><br />Please enter code from e-mail and name of one character from account. Then press Submit.<BR>
				<FORM ACTION="?subtopic=lostaccount&action=checkcode" METHOD=post>
				<TABLE CELLSPACING=1 CELLPADDING=4 BORDER=0 WIDTH=100%>
				<TR><TD BGCOLOR="' . $config['vdarkborder'] . '" class="white"><B>Code & character name</B></TD></TR>
				<TR><TD BGCOLOR="' . $config['darkborder'] . '">
				Your code:&nbsp;<INPUT TYPE=text NAME="code" VALUE="" SIZE="40")><BR />
				Character:&nbsp;<INPUT TYPE=text NAME="character" VALUE="" SIZE="40")><BR />
				</TD></TR>
				</TABLE>
				<BR>
				<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 WIDTH=100%><TR><TD><div style="text-align:center">
				' . $twig->render('buttons.submit.html.twig') . '</div>
				</TD></TR></FORM></TABLE></TABLE>';
}

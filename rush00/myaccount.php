<?php
session_start();
$file = unserialize(file_get_contents('database/account'));
if ($_POST['firstname'] != NULL || $_POST['lastname'] != NULL || $_POST['address'] != NULL || $_POST['email'] != NULL && $_POST['infos'] == "CHANGE INFOS")
{
	$i = 0;
	while ($file[$i] != NULL && $file[$i]['login'] != $_SESSION['logged_in_user'])
		$i++;
	if ($file[$i]['login'] == $_SESSION['logged_in_user'])
	{
		$file[$i]['firstname'] = $_POST['firstname'];
		$file[$i]['lastname'] = $_POST['lastname'];
		$file[$i]['address'] = $_POST['address'];
		$file[$i]['email'] = $_POST['email'];
		file_put_contents('database/account', serialize($file));
		echo "Infos changed\n";
	}
}
if ($_POST['newpassword'] != NULL && $_POST['pass'] == "CHANGE PASSWORD")
{
	$i = 0;
	while ($file[$i] != NULL && $file[$i]['login'] != $_SESSION['logged_in_user'])
		$i++;
	if ($file[$i]['login'] == $_SESSION['logged_in_user'] && $file[$i]['password'] == $_POST['oldpassword'])
	{
		$file[$i]['password'] = $_POST['newpassword'];
		file_put_contents('database/account', serialize($file));
		echo "Password changed\n";
	}
	else
		echo "Wrong password\n";
}
if ($_POST['del'] == "DELETE ACCOUNT")
{
	$i = 0;
	while ($file[$i] != NULL && $file[$i]['login'] != $_SESSION['logged_in_user'])
		$i++;
	if ($file[$i]['login'] == $_SESSION['logged_in_user'])
	{
		$file[$i]['login'] = NULL;
		$file[$i]['password'] = NULL;
		$file[$i]['firstname'] = NULL;
		$file[$i]['lastname'] = NULL;
		$file[$i]['address'] = NULL;
		$file[$i]['email'] = NULL;
		$file[$i]['rank'] = NULL;
		file_put_contents('database/account', serialize($file));
		echo "Account deleted\n";
		$_SESSION['logged_in_user'] = NULL;
		$_SESSION['log'] = 0;
		exit ();
	}
}
?>

<html><body>
	<form action="index.php?link=myaccount" method="POST">
	<br />
	<br />
	CHANGE INFOS
	<br />
	Change First Name: <input type="text" name ="firstname" value=""/>
	<br />
	Change Last Name: <input type="text" name ="lastname" value=""/>
	<br />
	Change Address:  <input type="text" name ="address" value=""/>
	<br />
	Change email: <input type="text" name ="email" value=""/>
	<br />
	<input type="submit" name="infos" value="CHANGE INFOS"/>
	<br />
	<br />
	CHANGE PASSWORD
	<br />
	Current Password: <input type="password" name ="oldpassword" value=""/>
	<br />
	New Password: <input type="password" name ="newpassword" value=""/>
	<br />
	<input type="submit" name="pass" value="CHANGE PASSWORD"/>
	<br />
	<br />
	DELETE ACCOUNT
	<br />
	<input type="submit" name="del" value="DELETE ACCOUNT"/>
	</form>
</body></html>

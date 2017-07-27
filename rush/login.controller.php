<?php
	session_start();
	if ($_POST['login'] != "" && $_POST['login'] != NULL && $_POST['password'] != "" && $_POST['password'] != NULL && $_POST['submit'] == "LOGIN")
	{
		$file = unserialize(file_get_contents('database/account'));
		$i = 0;
		while ($file[$i]['login'] != NULL && $file[$i]['login'] != $_POST['login']){
			$i++;
		}
		if ($file[$i]['login'] == $_POST['login'] && $file[$i]['password'] == $_POST['password'])
		{
			$_SESSION['log'] = 1;
			$_SESSION['logged_in_user'] = $_POST['login'];
			if ($_POST['login'] == 'admin')
				$_SESSION['admin'] = 1;
			header("Location: ./index.php");
		}
		else
		{
			$_SESSION['log'] = 0;
			header("Location: ./index.php?link=login&error=1");
		}
	}
	else
		header("Location: ./index.php?link=login&error=1");
?>

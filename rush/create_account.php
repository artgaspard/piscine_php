<?php
if ($_POST['login'] != NULL && $_POST['password'] != NULL && $_POST['submit'] == "JOIN NOW")
{
	$data = array('login' => $_POST['login'], 'password' => $_POST['password']);
	$file = unserialize(file_get_contents('database/password'));
	foreach ($file as $key => $exist)
	{
		if ($exist['login'] === $_POST['login'])
		{
			$_SESSION['status'] = "exist";
		}
		else
		{
			$file[] = $data;
			file_put_contents('database/password', serialize($file));
			$_SESSION['status'] = "ok";
		}
	}
	if ($_SESSION['status'] == "exist")
	{
		echo "THIS LOGIN ALREADY EXISTS\n";
		echo '<br />';
	}
	if ($_SESSION['status'] == "ok")
	{
		echo "THANKS FOR SIGNING UP :)\n";
		$_SESSION['log'] = "1";
		exit();
	}
}

if ($_POST['login'] == NULL || $_POST['password'] == NULL || $_POST['firstname'] == NULL || $_POST['lastname'] == NULL || $_POST['email'] == NULL && $_POST['submit'] == "JOIN NOW")
{
	$_SESSION['fill'] = "1";
}
if ($_SESSION['fill'] == "1" && $_POST['submit'] == "JOIN NOW")
	echo "YOU MUST FILL ALL FIELDS TO REGISTER\n";
?>
<html>
	<body>
		<form action="index.php?link=join" method="POST">
		LOGIN: <input type="text" name="login" value=""/>
		<br />
		PASSWORD: <input type="password" name="password" value=""/>
		<br />
		FIRST NAME: <input type="text" name="firstname" value=""/>
		<br />
		LAST NAME: <input type="text" name="lastname" value=""/>
		<br />
		EMAIL: <input type="text" name="email" value=""/>
		<br />
		<input type="submit" name="submit" value="JOIN NOW"/>
		<br />
		</form>
		<a href="./index.php?link=login">ALREADY REGISTERED ?</a>
	</body>
</html>

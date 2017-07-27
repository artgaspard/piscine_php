<?php
session_start();
if (file_exists('database/account') == FALSE)
	include 'install.php';
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href= 'css/style.css'>
		<meta charset="UTF-8">
		<title>minishop</title>
	</head>
	<body bgcolor="#f2effc">
		<table class="nav-bar">
			<tr>
				<th><a href="./index.php" class="nav-item">HOME</a></th>
				<th><a href="./index.php?link=cat" class="nav-item">CATEGORIES</th>
				<th><a href="./index.php?link=bag" class="nav-item">MY BAG</th>
<?php
	if ($_SESSION['log'] == 1)
	{
		echo '<th><a href="./index.php?link=myaccount" class="nav-item">MY ACCOUNT</a></th>';
		echo '<th><a href="./logout.php" class="nav-item">LOGOUT</a></th>';
	}
	if ($_SESSION['admin'] == 1)
	{
		echo '<th><a href="./index.php?link=admin" class="nav-item">ADMIN</a></th>';
	}
	else
	{
		echo '<th><a href="./index.php?link=login" class="nav-item">LOGIN</a></th>';
		echo '<th><a href="./index.php?link=join" class="nav-item">JOIN</a></th>';
	}
?>
			</tr>
		</table>
<?php
//view
	if ($_GET['link'] == "login")
	{
		if ($_GET['error'] == 1)
			echo "WRONG LOGIN / PASSWORD";
		include 'login.php';
	}
	else if ($_GET['link'] == "join")
	{
		include 'join.php';
	}
	else if ($_GET['link'] == "myaccount")
	{
		include 'myaccount.php';
	}
	else if ($_GET['link'] == "cat")
	{
		include 'cat.php';
	}
	else if ($_GET['link'] == "bag")
	{
		include 'bag.php';
		//include 'add_bag.php';
		//include 'bag.php';
		//include 'del_item.php';
		//include 'modify_qt.php';
	}
	else if ($_GET['link'] == "admin")
	{
		include 'admin.php';
	}
	else
		include 'home.php';
?>
	</body>
	<footer class="row">
		<p><a style="font-family: monospace; font-style: italic;">Powered by agaspard | sbelazou</a></p>
	</footer>
</html>

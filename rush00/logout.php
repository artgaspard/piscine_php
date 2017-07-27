<?php
session_start();
unset($_SESSION['log']);
unset($_SESSION['admin']);
unset($_SESSION['logged_on_user']);
	header("Location: ./index.php");
?>

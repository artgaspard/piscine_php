<?php
session_start();
if ($_SESSION['logged_on_user'] == "" || $_SESSION['logged_on_user'] == NULL)
	echo "ERROR\n";
else
	echo $_SESSION['logged_on_user']."\n";
?>

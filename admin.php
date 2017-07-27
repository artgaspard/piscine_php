<?php
session_start();
$cat = unserialize(file_get_contents('database/categories'));
$prod = unserialize(file_get_contents('database/products'));
$account = unserialize(file_get_contents('database/account'));

if ($_POST['addcat'] != NULL && $_POST['subaddcat'] == "ADD")
{
	$newcat = array($_POST['addcat']);
	$cat[] = $newcat;
	file_put_contents('database/categories', serialize($cat));
}

if ($_POST['delcat'] != NULL && $_POST['subdelcat'] == "DELETE")
{
}

if ($_POST['addprod'] != NULL && $_POST['addprodcat'] != NULL && $_POST['subaddprod'] == "ADD")
{
}

if ($_POST['delprod'] != NULL && $_POST['subdelprod'] == "DELETE")
{
}

if ($_POST['adduser'] != NULL && $_POST['subadduser'] == "ADD")
{
}

if ($_POST['deluser'] != NULL && $_POST['subdeluser'] == "ADD")
{
}

?>

<html><body>
	<form action="index.php?link=admin" method="POST">
	<br />
	ADD CATEGORY
	<br />
	Category name: <input type="text" name="addcat" value=""/>
	<br />
	<input type="submit" name="subaddcat" value="ADD"/>
	<br />
	<br />
	DELETE CATEGORY
	<br />
	Category name: <input type="text" name="delcat" value=""/>
	<br />
	<input type="submit" name="subdelcat" value="DELETE"/>
	<br />
	<br />
	ADD PRODUCT
	<br />
	Product Name: <input type="text" name="addprod" value=""/>
	<br />
	To category: <input type="text" name="addprodcat" value=""/>
	<br />
	<input type="submit" name="subaddprod" value="ADD"/>
	<br />
	<br />
	DELETE PRODUCT
	<br />
 	Product Name: <input type="text" name=delprod" value=""/>
	<br />
	<input type="submit" name="subdelprod" value="DELETE"/>
	<br />
	<br />
	ADD USER
	<br />
	User login: <input type="text" name="adduser" value=""/>
	<br />
	<input type="submit" name="subadduser" value="ADD"/>
	<br />
	<br />
	DELETE USER
	<br />
	User login:<input type="text" name="deluser" value=""/>
	<br />
	<input type="submit" name="subdeluser" value="DELETE"/>
	<br />
	<br />
	PENDING CHECKOUTS
	<br />
	</form>
</body></html>

<?php
session_start();
$cat = unserialize(file_get_contents('database/categories'));
$prod = unserialize(file_get_contents('database/products'));
$account = unserialize(file_get_contents('database/account'));

function    delete_case($path, $ref_class, $id)
{
	$ret = FALSE;
	if (file_exists($path) == TRUE)
	{
		$content = file_get_contents($path);
		$content = unserialize($content);
		$i = 0;
		while ($content[0][$i] != NULL && $content[0][$i][$ref_class] != $id)
			$i++;
		if ($content[0][$i][$ref_class] == $id)
		{
			array_splice($content[0], $i, 1);
			$ret = TRUE;
		}
		$content = serialize($content);
		file_put_contents($path, $content);
	}
	return ($ret);
}
/*
function    delete_cat($path, $ref_class, $id)
{
	$ret = FALSE;
	if (file_exists($path) == TRUE)
	{
		// echo 'TRUE';
		$content = file_get_contents($path);
		$content = unserialize($content);
		$i = 0;
		// echo $ref_class;
		print_r ($content[0]);
		while ($content[0][$i] != NULL)
		{
			// echo $id;
			if ($content[0][$i][$ref_class] == $id)
			{
				array_splice($content[0], $i, 1);
				$ret = TRUE;
			}
			$i++;
		}
		$content = serialize($content);
		file_put_contents($path, $content);
	}
	return ($ret);
}

if ($_POST['addcat'] != NULL && $_POST['subaddcat'] == "ADD")
{
	$newcat = array($_POST['addcat'] => $_POST['addcat']);
	array_push($cat[0], $newcat);
	file_put_contents('database/categories', serialize($cat));
	echo "Category ".$_POST['addcat']." added";
}

if ($_POST['delcat'] != NULL && $_POST['subdelcat'] == "DELETE")
{
	echo 'delcat';
	if (delete_cat('database/categories', 'type1', $_POST['delcat']) == TRUE)
		echo 'Category deleted';
	else
		echo 'Deletion problem';
}
*/
if ($_POST['addprod'] != NULL && $_POST['choosecat'] != NULL && $_POST['sales'] != NULL && $_POST['id'] != NULL && $_POST['url'] != NULL && $_POST['description'] != NULL && $_POST['price'] != NULL && $_POST['subaddprod'] == "ADD")
{
	echo 'add Prod';
	$tmp = '';
	if ($_POST['sales'] == 'yes')
		$tmp = 'sales';
	$newprod = array('item' => $_POST['addprod'], 'type1' => $_POST['choosecat'], 'type2' => $tmp, 'id' => $_POST['id'], 'picture' => $_POST['url'], 'carac' => $_POST['description'], 'price' => $_POST['price']);
	$prod[] = $newprod;
	file_put_contents('database/products', serialize($prod));
	echo "Product ".$_POST['addcat']." added";
}


if ($_POST['delprod'] != NULL && $_POST['subdelprod'] == "DELETE")
{
	if (delete_case('database/products', 'item', $_POST['delprod']) == TRUE)
		echo 'Product deleted';
	else
		echo 'Deletion problem';
}

if ($_POST['login'] != NULL && $_POST['password'] != NULL && $_POST['firstname'] != NULL && $_POST['lastname'] != NULL && $_POST['address'] != NULL && $_POST['email'] != NULL && $_POST['subadduser'] == "ADD")
{
	$data = array('login' => $_POST['login'], 'password' => $_POST['password'], 'firstname' => $_POST['firstname'],     'lastname' => $_POST['lastname'], 'address' => $_POST['address'],'email' => $_POST['email'], 'rank' => 'user');
		$i = 0;
	$file = unserialize(file_get_contents('database/account'));
	while ($file[$i] != NULL && $file[$i]['login'] != $_POST['login'])
		$i++;
	if ($file[$i]['login'] == $_POST['login'])
	{
		echo "Login ".$_POST['login']." already exists";
	}
	else
	{
		$file[] = $data;
		file_put_contents('database/account', serialize($file));
		echo "User ".$_POST['login']." added";
	}
}

if ($_POST['deluser'] != NULL && $_POST['subdeluser'] == "DELETE")
{
	$i = 0;
	while ($account[$i] != NULL && $account[$i]['login'] != $_POST['deluser'])
		$i++;
   if ($account[$i]['login'] == $_POST['deluser'])
   {
	   $account[$i]['login'] = NULL;
	   $account[$i]['password'] = NULL;
	   $account[$i]['firstname'] = NULL;
	   $account[$i]['lastname'] = NULL;
	   $account[$i]['address'] = NULL;
	   $account[$i]['email'] = NULL;
	   $account[$i]['rank'] = NULL;
	   file_put_contents('database/account', serialize($account));
	   echo "User ".$_POST['login']." deleted";
   }
}
?>

<html><body>
	<form action="index.php?link=admin" method="POST">
	<!-- <br />
	ADD CATEGORY
	<br />
	Category name: <input type="text" name="addcat" value=""/>
	<br />
	<input type="submit" name="subaddcat" value="ADD"/>
	<br />
	<br />
	DELETE CATEGORY
	<br />
	Category name: <input list="browser" type="text" name="delcat" value=""/>
	<datalist id="browser">
	</datalist>
	<br />
	<input type="submit" name="subdelcat" value="DELETE"/>
	<br /> -->
	<br />
	ADD PRODUCT
	<br />
	Product Name: <input type="text" name="addprod" value=""/>
	<br />
	Category:<select id="Category">
			<option value="katana" selected>Katana</option>
			<option value="shuriken">Shuriken</option>
			<option value="nunchuk">Nunchuk</option>
		</select>
	<br />
	<br />
	Sales: <select id="sales">
			<option value="yes" selected>Yes</option>
			<option value="no">No</option>
		</select>
	<br />
	Product id: <input type="text" name="id" value=""/>
	<br />
	Picture url: <input type="text" name="url" value=""/>
	<br />
	Product description: <input type="text" name="description" value=""/>
	<br />
	Price: <input type="text" name="price" value=""/>
	<br />
	<input type="submit" name="subaddprod" value="ADD"/>
	<br />
	<br />
	DELETE PRODUCT
	<br />
 	Product Name: <input type="text" name="delprod" value=""/>
	<br />
	<input type="submit" name="subdelprod" value="DELETE"/>
	<br />
	<br />
	ADD USER
	<br />
	User login: <input type="text" name="login" value=""/>
	<br />
    Password: <input type="password" name="password" value=""/>
	<br />
	First name: <input type="text" name="firstname" value=""/>
 	<br />
	Last name: <input type="text" name="lastname" value=""/>
	<br />
 	Address: <input type="text" name="address" value=""/>
 	<br />
 	Email: <input type="text" name="email" value=""/>
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

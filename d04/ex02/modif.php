<?php
$file = unserialize(file_get_contents('../ex01/private/passwd'));
$hash = hash('whirlpool', $_POST['oldpw']);
$error = 0;
if ($_POST['newpw'] != NULL && $_POST['newpw'] != "" && $_POST['submit'] == "OK")
{
	$npw = hash('whirlpool', $_POST['newpw']);
	foreach ($file as $key => $user)
	{
		if ($file[$key]['login'] == $_POST['login'])
		{
			if ($file[$key]['passwd'] == $hash)
			{
				$file[$key]['passwd'] = $npw;
				file_put_contents('../ex01/private/passwd', serialize($file));
				echo "OK\n";
			}
			else
				$error = 1;;
		}
		else
			$error = 1;
	}
	if ($error == 1)
		echo "ERROR\n";
}
else
{
	echo "ERROR\n";
}
?>

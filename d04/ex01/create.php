<?php
if ($_POST['login'] != NULL && $_POST['login'] != "" && $_POST['passwd'] != NULL && $_POST['passwd'] != "" && $_POST['submit'] == "OK")
{
	$login = $_POST['login'];
	$hash = hash('whirlpool', $_POST['passwd']);
	$data = array('login' => $login, 'passwd' => $hash);
	if (file_exists('private/') == FALSE)
	{
		mkdir('private/');
	}
	if (file_exists('private/passwd') == FALSE)
	{
		$first[] = array('login' => $login, 'passwd' => $hash);
		file_put_contents('private/passwd', serialize($first));
		echo "OK\n";
	}
	else 
	{
		$file = unserialize(file_get_contents('private/passwd'));
		foreach ($file as $k => $exist)
		{
			if ($exist['login'] === $login)
			{
				echo "ERROR\n";
				return ;
			}
		}
		$file[] = $data;
		file_put_contents('private/passwd', serialize($file));
		echo "OK\n";
	}
}
else
{
	echo "ERROR\n";
}
?>

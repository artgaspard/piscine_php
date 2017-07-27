<?php
	function file_manager($data, $path)
	{
		if (file_exists($path) == TRUE)
		{
			$array = file_get_contents($path);
			$array = unserialize($array);
			array_push($array, $data);
			$content = $array;
		}
		else
			$content[0] = $data;
		if ($content != NULL)
		{
			$array = serialize($content);
			if (file_exists('database/') == FALSE)
				mkdir('database/');
			file_put_contents($path, $array);
		}
	}
	function empty_bag() //Doublon (also in empty_bag)
    {
        session_start();
        unset($_SESSION['bag']);
        if (!isset($_SESSION['bag']))
           return (TRUE);
        return (FALSE);
	}
	function checkout()
	{
		session_start();
		$_SESSION['bag']['user'] = $_SESSION['logged_in_user'];
		file_manager($_SESSION['bag'] ,'database/checkout');
		empty_bag();
		header('Location: index.php');
	}
	session_start();
	if ($_SESSION['log'] == 1 || $_SESSION['admin'] == 1)
		checkout();
	else
		header('Location: index.php?link=login');
?>
<?php

if ($_GET["action"] != NULL)
{
	if ($_GET["action"] == "set" && $_GET["name"] != NULL && $_GET["value"] != NULL)
	{
		$name = $_GET["name"];
		setcookie($name, $_GET["value"], time() + 3600);
	}
	elseif ($_GET["action"] == "get" && $_GET["name"] != NULL)
	{
		if ($_COOKIE[$_GET["name"]] != NULL)
		{
			$name = $_GET["name"];
			echo $_COOKIE[$name]."\n";
		}
	}
	elseif ($_GET["action"] == "del" && $_GET["name"] != NULL)
	{
		setcookie($_GET["name"], "", time() - 1);
	}
}
?>

<?php
function auth($login, $passwd)
{
	if (!$login || !$passwd)
		return FALSE;
	$file = unserialize(file_get_contents('../ex01/private/passwd'));
	$hash = hash('whirlpool', $passwd);
	if ($file)
	{
		foreach ($file as $key => $user)
		{
			if ($user['login'] == $login && $user['passwd'] == $passwd)
				return TRUE;
		}
	}
	return FALSE;
}
?>

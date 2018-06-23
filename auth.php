<?php
function auth($login, $passwd)
{
	$flag = 0;
	if (file_exists("./private/passwd") == true)
	{
		$usr = unserialize(file_get_contents("./private/passwd"));
		foreach ($usr as $key => $value)
		{
			if ($value["login"] == $login && $value["passwd"] == hash("md5", $passwd))
			{
				$flag = 1;
				break ;
			}
		}
		if ($flag == 1)
			return true;
		else
			return false;
	}
	else
		return false;
}
?>
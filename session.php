<?php
session_start();
if ($_POST["Logout"] == "Logout")
{
	session_destroy();
	header("Location: index.html");
}
if ($_POST["Delete"] == "Delete")
{
	$filename = "./private/passwd";
	$login = $_SESSION["login_user"];
	$passwd = hash("md5", $_SESSION["passwd"]);
	$found = 0;
	$file_data = file_get_contents($filename);
	if ($file_data)
	{
		$users = unserialize($file_data);
		foreach ($users as $key => $value)
		{
			if ($value["login"] === $login)
			{
				$found = 1;
				if ($value["passwd"] == $passwd)
					unset($users[$key]);
				break;
			}
		}
	if ($found == 1)
		file_put_contents($filename, serialize($users));
	}
	session_destroy();
	$_SESSION["login_user"] = "";
	$_SESSION["passwd"] = "";
	header("Location: index.html");
}
?>
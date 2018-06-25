<?php
session_start();
	print_r($_POST);
if ($_POST["Delete"] == "Delete")
{
	$filename = "./private/passwd";
	$login = $_POST["login"];
	$tab = unserialize(file_get_contents("./private/passwd"));
	foreach ($tab as $key => $value)
	{
		if ($login == $value["login"])
		{
			$passwd = $value["passwd"];
			break ;
		}
	}
	$found = 0;
	foreach ($tab as $key => $value)
	{
		if ($value["login"] === $login)
		{
			$found = 1;
			print_r($value["passwd"]);
			if ($value["passwd"] == $passwd)
				unset($tab[$key]);
			break;
		}
	}
	if ($found == 1)
		file_put_contents($filename, serialize($tab));
	header("Location: index.php");
}
?>
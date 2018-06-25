<?php
$login = "login";
$passwd = "passwd";
$submit = "submit";
$count = "count";
$price = "price";
$total = "total";
$signin = "Sign in";

session_start();
include ("auth.php");
if ($_POST[$login] && $_POST[$passwd] && $_POST[$submit] == $signin)
{
	if ($_POST[$login] == "root" && $_POST[$passwd] == "root")
	{
		if (file_exists("./private") == false)
			mkdir("./private");
		if (file_exists("./private/passwd") == false)
		{
			$usr = array($login => $_POST[$login], $passwd => hash("md5", $_POST[$passwd]));
			file_put_contents("./private/passwd", serialize($usr));
		}
		else
		{
			$usr = unserialize(file_get_contents("./private/passwd"));
			foreach ($usr as $key => $value)
			{
				if ($value[$login] == $_POST[$login])
				{
					$flag = 1;
					break ;
				}
			}
			if ($flag == 0)
			{
				$usr[] = array($login => $_POST[$login], $passwd => hash("md5", $_POST[$passwd]));
				file_put_contents("./private/passwd", serialize($usr));
			}
		}
		$_SESSION["login_user"] = $_POST[$login];
		$_SESSION["passwd"] = $_POST[$passwd];
		$_SESSION["total"] = 0;
		$_SESSION["cart"] = [];
		$_SESSION["order"] = '0';
		header ("Location: index.php");
	}
	if (auth($_POST[$login], $_POST[$passwd]) == true)
	{
		$_SESSION["login_user"] = $_POST[$login];
		$_SESSION["passwd"] = $_POST[$passwd];
		$_SESSION["total"] = 0;
		$_SESSION["cart"] = [];
		$_SESSION["order"] = '0';
		header("Location: index.php");
	}
	else
	{
		header("Location: index.html");
		echo "ERROR\n";
	}
}
else
{
	header("Location: index.html");
	echo "ERROR\n";
}
?>
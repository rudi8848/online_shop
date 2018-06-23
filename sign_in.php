<?php
$login = "login";
$passwd = "passwd";
$submit = "submit";
$count = "count";
$price = "price";
$total = "total";
$signin = "Sign in";
$sum = $sum;
if ($_SESSION == NULL)
	session_start();
include ("auth.php");
if ($_POST[$login] && $_POST[$passwd] && $_POST[$submit] == $signin)
{
	if (auth($_POST[$login], $_POST[$passwd]) == true)
	{
		$_SESSION["login_user"] = $_POST[$login];
		$_SESSION["passwd_user"] = $_POST[$passwd];
		$_SESSION[$count] = "0";
		$_SESSION[$price] = "0";
		$_SESSION[$total] = "0";
		header("Location: index.php");
		echo "OK\n";
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
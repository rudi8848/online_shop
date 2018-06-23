<?php
$login = "login";
$passwd = "passwd";
$submit = "submit";
$signup = "Sign up";
$flag = 0;
if ($_POST[$login] && $_POST[$passwd] && $_POST[$submit] == $signup)
{
	if (file_exists("./private") == false)
		mkdir("./private");
	$usr = unserialize(file_get_contents("./private/passwd"));
	foreach ($usr as $key => $value)
	{
		echo "login = $value[$login]<br />";
		echo "post = $_POST[$login]<br />";
		if ($value[$login] == $_POST[$login])
		{
			$flag = 1;
			break ;
		}
	}
	if ($flag == 1)
	{
		header ("Location: sign_up.html");
		echo "ERROR\n";
	}
	else
	{
		$usr[] = array($login => $_POST[$login], $passwd => hash("md5", $_POST[$passwd]));
		file_put_contents("./private/passwd", serialize($usr));
		header ("Location: index.html");
		echo "OK\n";
	}
}
else if (($_POST[$login] == "" || $_POST[$passwd] == "") && $_POST[$submit] == $signup)
{
	header ("Location: sign_up.html");
	echo "ERROR\n";
}
?>
<?php
$login = "login";
$newpw = "newpw";
$oldpw = "oldpw";
$passwd = "passwd";
$submit = "submit";
$modify = "modify";
$flag = 0;
if ($_POST[$oldpw] == $_POST[$newpw])
{
	header ("Location: modify.html");
	echo "ERROR\n";
}
else if ($_POST[$login] && $_POST[$oldpw] && $_POST[$newpw] && $_POST[$submit] == "OK")
{
	if (file_exists("./private") == false)
		mkdir("./private");
	$usr = unserialize(file_get_contents("./private/passwd"));
	foreach ($usr as $key => $value)
	{
		if ($value[$login] == $_POST[$login] && $value[$passwd] == hash("md5", $_POST[$oldpw]))
		{
			$usr[$key][$passwd] = hash("md5", $_POST[$newpw]);
			file_put_contents("./private/passwd", serialize($usr));
			header ("Location: index.html");
			echo "OK\n";
			$flag = 1;
			break ;
		}
	}
	if ($flag == 0)
	{
		header ("Location: modify.html");
		echo "ERROR\n";
	}
}
else
{
	header ("Location: modify.html");
	echo "ERROR\n";
}
?>

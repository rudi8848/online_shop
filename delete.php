<?php

$filename = "../private/passwd";

if ($_POST["delete"] == "OK") {
	echo ("<br/>delete<br/>");
	
		$login = $_POST["login"];
		$passwd = hash("md5", $_POST["passwd"]);
		$found = 0;
		$file_data = NULL;

		if (!file_exists($filename)) {
			echo ("No passwd file<br/>");
			exit;
		}
		$file_data = file_get_contents($filename);
		
		if ($file_data) {

		$users = unserialize($file_data);

			foreach ($users as $key => $value)  {
				if ($value["login"] === $login) {
					$found = 1;
					if ($value["passwd"] != $passwd) {
						echo ("Wrong password");
						exit;
					} else {
						echo ("<br>password OK<br/>");
						unset($users[$key]);
						var_dump($users);
					}
					
					
					break;
				}
			}
			
			if ($found == 1) {
				file_put_contents($filename, serialize($users));
				echo ("User was deleted<br>");
			} else {
				echo ("No such user in database<br/>");
			}	
		}
		
} 


?>
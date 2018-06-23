<?php
session_start();
if ($_SESSION["login_user"] == "")
	header("Loactin: index.html");
?>
<!DOCTYPE html>
<html>
<body>
<?php require("header.php");?>
</body>
</html>
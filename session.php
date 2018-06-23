<?php
session_start();
if ($_POST["Logout"] == "Logout")
{
	session_destroy();
	header("Location: index.html");
}
if ($_POST["Delete"] == "Delete")
{
	header("Location: index.html");
// удаление пользователя
// удаление из сессии логина и пароля
}
?>
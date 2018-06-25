<?php
session_start();
?>

<link rel="stylesheet" href="style.css">
<header>
<div class="header">
	<div class="dashboard">
	<?php
	session_start();
	if ($_SESSION["login_user"] == "root" && $_SESSION["passwd"] == "root")
	{
	?>
	<form action="admin.php" method="post">
		<button type="submit" name="Admin">Change Database</button>
	</form>
	<form action="admin_del.php" method="post">
		<button type="submit" name="Admin">Delete Users</button>
	</form>
	<?php
		}
	?>
	<form action="basket.php" method="post">
		<button type="submit" name="Basket"><img width="20px" src="./img/basket.png"></button>
	</form>
		<form action="session.php" method="post">
		<input class="submit" type="submit" name="Logout" value="Logout">
		<input class="submit" type="submit" name="Delete" value="Delete">
	</form>
	</div>
	<ul>
		<div class="categories">
			<center>
			<li><a class="categ" name="All" href="index.php">All</a></li>
			<li><a class="categ" href="monocles.php">Monocles</a></li>
			<li><a class="categ" href="phones.php">Phones</a></li>
			<li><a class="categ" href="pipes.php">Pipes</a></li>
			<li><a class="categ" href="sticks.php">Sticks</a></li>
			</center>
		</div>
	</ul>
</div>
</header>

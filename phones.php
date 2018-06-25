<?php
session_start();
if ($_SESSION["login_user"] == "")
	header("Loactin: index.html");
?>

<html>
<body>
	<?php require("header.php");?>
	<div class="basket">
			<form action="basket.php" method="post" >
			<p><?php echo "Goods in cart: ".$_SESSION['total'] ?></p>
			<input type="submit" name="order" value="Go to cart">
		</form>
		</div>
	<div>
		<?php
		$i = 0;
		include ("read_db.php");
		if (file_exists("./private/database") == false)
			create_database("database");
		$tab = unserialize(file_get_contents("./private/database"));
		while ($tab[$i])
		{
			if ($tab[$i]["category"] == "phones")
			{
		?>
		<div class="index_row">
			<div class="index_item">
				<div class="item">
					<?php echo $tab[$i]["name"]?>
				</div>
				<div class="comment">
					<p><?php echo $tab[$i]["comment"]?></p>
 					<br>
					<img src="<?php echo $tab[$i]["image"] ?>" width="140px" height="165px"/></a>
					<br>
					<div>
						<div>
							<?php echo $tab[$i]["price"]?>₴;
						</div>
						<form action="basket.php">
							<input type="number" name="count" min="1" placeholder="Count" required>
							<button type="submit" name="name" value="<?php echo $tab[$i]["name"] ?>">Add to cart</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}
++$i;
}
?>
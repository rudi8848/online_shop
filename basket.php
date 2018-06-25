<?php
session_start();
$amount = 0;
$sum = 0;
function goback()
{
	header("Location: {$_SERVER['HTTP_REFERER']}");
	exit;
}
function init_vars()
{
	$name = "";
	$amount = 0;
	$image = "";
	$price = 0;
}
if (count($_POST) > 0)
{
	$tab = unserialize(file_get_contents("./private/database"));
	$count = count($tab);
	$arr = $_SESSION['cart'];

	$all = count($arr);
	for($i = 0; $i < $all; $i++)
	{
		foreach($arr[$i] as $k => $v)
		{
			if(isset($res[$k]))
				$res[$k] += $v;
			else
				$res[$k] = $v;
		}
	}
	foreach ($res as $key => $value) 
	{
		init_vars();
		$name = $key;
		$amount = $value;

		for ($i = 0; $i < $count; $i++)
		{
			if ($tab[$i]['name'] == $name) 
			{
				$image = $tab[$i]['image'];
				$price = $tab[$i]['price'];
				$sum = $price * $amount;
			?>
				<html>
					<body>
						<table align="center">
							<tr>
								<td><?php echo("<img src=$image>"); ?></td>
								<td class="table_cart"><font class="text_cart">Name of item:<p><?php print_r($name."<br>");?><p></td>
								<td class="table_cart">Amount:<p><?php print_r($amount."<br>");?></p></td>
								<td class="table_cart">Price:<p/><?php print_r($price."<br>");?>₴</p></td>
								<td class="table_cart">Total sum:<p/><?php print_r($sum."<br>");?>₴</p></td>
							</tr>
						</table>
							<?php
							$save = array("login" => $_SESSION["login_user"], "name" => $name, "amount" => $amount, "price" => $price, "sum" => $sum);
							break;
						}
			}
	}
}
else
{
	$_SESSION['cart'][] = [$_GET['name'] => $_GET['count']];
	$_SESSION['total'] += $_GET['count'];
	goback();
}
?>
<hr>
<button>
<?php
if (file_exists("./private/") == false)
	mkdir("./private/");
$tmp = unserialize(file_get_contents("./private/orders"));
$flag = 0;
foreach ($tmp as $key => $value)
{
	if ($tmp[$key]["login"] == $_SESSION["login_user"])
	{
		$flag = 1;
		break ;
	}
}
if ($flag == 0 && $_SESSION["login_user"] != "")
{
	$tmp[] = $save;
	$tmp = file_put_contents("./private/orders", serialize($tmp));
}
?>
	<a href="index.php"><img width="20px" src="./img/save.png"></a></button>
</html>

		

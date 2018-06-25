<?php

if ($_POST["name"] && $_POST["price"] && $_POST["comment"] && $_POST["category"] && $_POST["image"])
{
	if ($_POST["submit"] === "OK")
	{
		$tab = array();
		if (!file_exists("./private/"))
			mkdir("./private");
		$tab = unserialize(file_get_contents("./private/database"));
		$name = html_entity_decode($_POST["name"]);
		$category = html_entity_decode($_POST["category"]);
		$comment = html_entity_decode($_POST["comment"]);
		$new = array("name" => $name, "price" => $_POST["price"], "comment" => $comment, "category" => $category, "image" => $_POST["image"]);
		array_push($tab, $new);
		$data = serialize($tab);
		file_put_contents("./private/database", $data);
		header("location: index.php");
		echo "OK"."\n";
	}
}
else
{
	header("location: admin.php");
	echo "ERROR\n";
}
?>
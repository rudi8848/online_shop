<?php
function ft_split($str, $char)
{
	if ($str)
	{
		$arr = trim(preg_replace("/\s+/", " ", $str));
		$arr = explode($char, trim($arr));
		return ($arr);
	}
}

function combine($a, $b)
{
	$arr1 = array_keys($a);
	$arr2 = array_values($b);
	$arr3 = array_combine($arr1, $arr2);
	return ($arr3);
}

function create_database($file)
{	
	$str = file_get_contents("db.csv");
	$arr = ft_split($str, ";");
	array_pop($arr);
	$tmp = array_shift($arr);
	$title = ft_split($tmp, ",");
	$title = array_flip(array_values($title));
	foreach ($arr as $key => $value)
	{
		$new[$key] = ft_split($arr[$key], ",");
		$res[] = combine($title, $new[$key]);
	}
	$res = file_put_contents("./private/$file", serialize($res));
}
?>
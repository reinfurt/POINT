<?
$u = rtrim($_SERVER['REQUEST_URI'], "/");

// last four digits are numbers, ie page is an annual report
$pattern = '(/\d{4}$)';
if (preg_match($pattern, $u))
	$view = "report";
else if (preg_match('/exhibitions/',$u))
	$view = "event";
else if (preg_match('/projects/',$u))
	$view = "event";
else if (preg_match('/talks/',$u))
	$view = "event";
else if (preg_match('/conferences/',$u))
	$view = "event";
else if (preg_match('/a-z/',$u))
	$view = "a-z";
else if (preg_match('/index/',$u))
	$view = "year-index";
else
	$view = "event";

require_once("views/head.php");
require_once("views/".$view.".php");
require_once("views/menu.php");
require_once("views/foot.php");
?>

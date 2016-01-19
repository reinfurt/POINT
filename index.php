<?
$u = rtrim($_SERVER['REQUEST_URI'], "/");

// last four digits are numbers, ie page is an annual report
$pattern = '(/\d{4}$)';
if(preg_match($pattern, $u))
	$view = "report";
else
	$view = "event";

require_once("views/head.php");
require_once("views/".$view.".php");
require_once("views/menu.php");
require_once("views/foot.php");
?>
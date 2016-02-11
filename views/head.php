<?
// path to config file
$config = "open-records-generator/config/config.php";
require_once($config);

// specific to this 'app'
$config_dir = $root."/config/";
require_once($config_dir."url.php");

$db = db_connect("guest");

$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();

// self
if($uu->id)
	$item = $oo->get($uu->id);
else
	$item = $oo->get(0);
$name = strip_tags($item["name1"]);

// document title
$item = $oo->get($uu->id);
$title = $item["name1"] ? $item["name1"] : "Point";

$now_children = $oo->children(1);

$is_report = false;
if($uu->urls[0] == "annual-reports" && count($uu->urls) == 2)
	$is_report = true;
	
use \Michelf\Markdown;
// $md = new Markdown;

require_once("open-records-generator/lib/Michelf/Markdown.inc.php");

function process_md($b)
{
	$b = trim($b);
	$b = \Michelf\Markdown::defaultTransform($b);
	$b = ltrim($b, "<p>");
	$b = rtrim($b, "</p>");
	return $b;
}

function process_event($b)
{
	$b_arr = explode("##", $b);
	foreach($b_arr as &$b)
	{
		$b = trim($b);
		$b = \Michelf\Markdown::defaultTransform($b);
	}
	return $b_arr;
}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title><? echo $title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/global.css">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/animate.min.css">
		<script type="text/javascript" src="<? echo $host; ?>static/js/animate-year.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.10/webfont.js"></script>
	</head>
	<body>

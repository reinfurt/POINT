<?
date_default_timezone_set("America/New_York");
require_once('lib/systemDatabase.php');
require_once("lib/systemCookie.php");
require_once("lib/displayNavigation.php");

// parse $id
$id = $_GET['id'];
if(!$id)
	$id = 0;
else {
	$ids = explode(",", $id);
	$idFull = $id;
	$id = end($ids);
}

// dev
$dev = $_REQUEST['dev'];
$dev = systemCookie("devCookie", $dev, 0);
if(!$dev) 
	die('In progress . . .');

// document header
$doc_title = 'Point';
$pageName = basename($_SERVER['PHP_SELF'], ".php");

$u = "http://".$_SERVER['SERVER_NAME'];

$sql = "SELECT * from objects where id = $id";
$res = MYSQL_QUERY($sql);
$obj = MYSQL_FETCH_ARRAY($res);
$name = $obj['name1'] ? $obj['name1'] : "Point";

// detect mobile
// $isMobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
// 				'|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
// 				'|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT']);

?>

<!DOCTYPE html>
<html>
	<head>
		<title><? echo $doc_title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="GLOBAL/global.css">
		<script type="text/javascript" src="JS/pointDuration.js"></script>
	</head>
	<body>
		<!--  preload futura-book so that canvas has it immediately when it calls for it -->
		<!--  this could be replaced by instead using onload or another event to startPointDuration -->
		<div style="font-family: futura-book;"></div>

		<div id="page">
			<header id="menu" class="now">
				<div id="menu-base"><?
					echo $name;
					if($id)
						echo "<br>Point"; ?>
				</div>
				<div id="menu-hover">
					<a href="<? echo $u; ?>">Point<br>Centre for Contemporary Art, Nicosia, Cyprus<br/>Annual Reports, 2012–2015</a>
					<br>
					<br>
					<div style="display: inline-block;"><? 
						displayNavigation(); 
					?></div>
				</div>
			</header>

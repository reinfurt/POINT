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
$base_url = $u."/point/";

$sql = "SELECT * from objects where id = $id";
$res = MYSQL_QUERY($sql);
$obj = MYSQL_FETCH_ARRAY($res);
$name = $obj['name1'] ? $obj['name1'] : "Point";

$t_sql = "SELECT 
			o.id AS objectsId,
			o.name1,
			o.deck,
			o.body,
			o.notes,
			o.active,
			o.modified
		FROM
			(SELECT objects.*
			FROM objects, wires
			WHERE 
				objects.active = 1
				AND wires.active = 1
				AND wires.toid = objects.id
				AND wires.fromid = '1'
			ORDER BY modified DESC
			LIMIT 5) AS o 
		ORDER BY o.modified DESC";

$t_res = mysql_query($t_sql);
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
		<link rel="stylesheet" href="static/css/global.css">
		<script type="text/javascript" src="static/js/pointDuration.js"></script>
		<script type="text/javascript" src="static/js/animate-message.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.10/webfont.js"></script>
	</head>
	<body>
		<!--  preload futura-book so that canvas has it immediately when it calls for it -->
		<!--  this could be replaced by instead using onload or another event to startPointDuration -->
		<!-- div class="futura-book">a</div -->
		<div id="page">
			<header id="menu" class="now">
				<p>
				<a href="<? echo $base_url; ?>">This website</a> is a filing cabinet for the ANNUAL REPORTS of POINT Centre for Contemporary Art, Nicosia, Cyprus since 2012. Select a year to review. . .
				</p>
				<p>
				Meanwhile, here is what's happening now:
				</p>
				<div id="ticker-wrapper">
					<div id="ticker-display"></div>
				</div>
				<div id="ticker-source" class="hidden"><?
				// add scrolling object content
				while($row = MYSQL_FETCH_ARRAY($t_res))
				{
					echo $row['name1']." / ";
					echo $row['deck']." / ";
					echo $row['body']."<br><br>";
				}
				?></div>
			</header>

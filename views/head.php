<?
require_once("open-records-generator/config/config.php");
require_once("open-records-generator/config/url.php");
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
$title = $item["name1"] ? $item["name1"] : "Point";
if ($title == "Point") $is_home = true;

$meanwhile_root = 1;
$meanwhile_children = $oo->children($meanwhile_root);

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

$js_back = "javascript:history.back();";
?>
<!DOCTYPE html>
<html>
	<head>
		<title><? echo $title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/main.css">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/animate.min.css">
		<link rel="shortcut icon" href="<? echo $host; ?>media/png/point.png">
		<script type="text/javascript" src="<? echo $host; ?>static/js/animate-year.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.10/webfont.js"></script>
	</head>
	<body><?
        if ($uu->url == null) {
    		?><header class="column helvetica">
	    		<div>
		    		<a href="<? echo $host; ?>">This website</a> is a filing 
			    	cabinet for the ANNUAL REPORTS of POINT Centre for 
				    Contemporary Art, Nicosia, Cyprus since the end of 2012.<?
    				if ($view == "a-z" || $view == "annual-index") {
	    				?><div id="year-select">
		    			</div><?
			    	} else {
				    	?><div id="year-select">
					    	Choose a year <img id="hand" class="nudge-right" src="media/png/hand-right.png">
					    </div><?
				    }
			    ?></div>
		    </header><?
    	} ?>


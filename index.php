<?php
require_once("views/head.php");

$urls = $uu->urls;
$url = $uu->url;

// basically, only choice is between views/report and views/event
// then also whether to show year-menu or annual-index (menu) as well
// what is views/menu.php?
// need to get rid of $is_event messiness in views/head.php
// and either include or not include that view here in /index

// home
if ($url == null)
    require_once("views/report.php");

// annual report
if ((in_array("annual-reports", $urls) && count($urls) == 2))
    require_once("views/report.php");

// annual report event
if ((in_array("annual-reports", $urls) && count($urls) > 2))
    require_once("views/event.php");

// annual index
if ((in_array("annual-index", $urls) && count($urls) < 2))
    require_once("views/annual-index.php");

// annual index event
if ((in_array("annual-index", $urls) && count($urls) > 2))
    require_once("views/event.php");

require_once("views/menu.php");
require_once("views/year-menu.php");
require_once("views/foot.php");
?>

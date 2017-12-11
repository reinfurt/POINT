<?php
require_once("views/head.php");

if (!$uu->ids) {
    $view = "report";
    require_once("views/meanwhile.php");
}

if ((in_array("annual-reports", $uu->urls) && count($uu->urls) > 2) ||
    (in_array("annual-index", $uu->urls)))
    $view = "event";

if ((in_array("annual-reports", $uu->urls) && count($uu->urls) <= 2))
    $view = "report";

if (in_array("2015", $uu->urls))
    require_once("views/annual-index.php");

if ((in_array("annual-index", $uu->urls) && count($uu->urls) < 2))
    require_once("views/annual-index.php");

require_once("views/$view.php");
require_once("views/year-menu.php");
require_once("views/menu.php");
require_once("views/foot.php");
?>

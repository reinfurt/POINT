<?php
require_once("views/head.php");

// home
if (!$uu->ids) {
    $view = "report";
    require_once("views/meanwhile.php");
    require_once("views/year-menu.php");
}

// annual report
if ((in_array("annual-reports", $uu->urls) && count($uu->urls) <= 2)) {
    $view = "report";
    require_once("views/year-menu.php"); // currently conflicts    
    require_once("views/$view.php");
    require_once("views/menu.php");
}

// annual index
if (in_array("2015", $uu->urls)) {
    require_once("views/annual-index.php");
}

// annual report w/ annual index
if ((in_array("annual-index", $uu->urls) && count($uu->urls) < 2)) {    
    $view = "report";
    require_once("views/year-menu.php"); // currently conflicts    
    require_once("views/$view.php");
    require_once("views/menu.php");
    require_once("views/annual-index.php");
}

// event
if ( (in_array("annual-reports", $uu->urls) && count($uu->urls) > 2) ||
    (in_array("annual-index", $uu->urls) && count($uu->urls) >= 2) ) {
    $view = "event";
    require_once("views/$view.php");
}

require_once("views/foot.php");
?>

<?php
require_once("views/head.php");

// $uri is of the form /admin/$view/$o[url]/$o[url]/...
// views are in folder ./views
// $uri = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
$view = "views/";
$view.= $uri[0] ? $uri[0]: "cover";
$view.= ".php";

try {
	if(!file_exists($view))
		throw new Exception("404");
}
catch(Exception $e) {
	$view = "views/errors/".$e->getMessage().".php";
}

require_once($view);
require_once("views/foot.php"); 

?>
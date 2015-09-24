<?php



  ////////////////
 //  Database  //
////////////////

function systemDatabase() {

	$dbMainHost = "db153.pair.com";
	$dbMainUser = "reinfurt_41";
	$dbMainPass = "8KxHaSeD";
	$dbMainDbse = "reinfurt_point";

	$dbConnect = MYSQL_CONNECT($dbMainHost, $dbMainUser, $dbMainPass);
	MYSQL_SELECT_DB($dbMainDbse, $dbConnect);
}
systemDatabase();



?>

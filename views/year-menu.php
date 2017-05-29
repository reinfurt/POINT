<?

// parse url, get $thisyear
$thisyear = $uu->urls[1];
if(!intval($thisyear))
    $thisyear = null;

// build #year-menu
// find "annual reports" object
$fields = array("id, name1");
$tables = array("objects");
$where = array("name1 LIKE 'Annual Reports'");
$order = array();
$limit = "1";
$descending = TRUE;
$distinct = TRUE;
$annualreports = $oo->get_all($fields, $tables, $where, $order, $limit, $descending, $distinct);
$annualreportsid = $annualreports[0]['id'];
$years = $oo->nav(["$annualreportsid"], $annualreportsid);    // nav needs ids array, rootid int

print_r($years[0]['o']['name1']);
                                                    // not $uu page-specific
// build & output html
?><div id="year-menu" class="h-centre"><?
foreach($years as $year) {                      
	$y_arr = str_split($year['o']['name1']);
    $urls = array();
	foreach($y_arr as $d)
		$urls[] = $media_path."png/$d.png";
    $urlpoint = $media_path."png/point.png";
    
    ?><a href="<? echo $host . "annual-reports/" . $year['o']['name1']; ?>"><?
    ?><div class="year-container blink"><?
    foreach($urls as $u) {
        ?><div class="digit-container">
            <img src="<? echo $u; ?>">
        </div><?
    }
    ?><span id="dot" class="blink"><img src="<? echo $urlpoint; ?>"></span><?
    ?></div><?
    ?></a><?

}
?></div>

<!--
// turn overflow on or off depending if in a year or on home
-->

<? 
// year menu
// show all years on index, only selected on event
// order years, no repeats

$thisyear = $uu->urls[1];
if(intval($thisyear))
    $thisyearobject = $oo->get($uu->id);
else
    $thisyear = null;

// find "annual reports" & harvest years
$fields = array("id, name1");
$tables = array("objects");
$where = array("name1 LIKE 'Annual Reports'");
$order = array();   // order by rank?
$limit = "1";
$annualreports = $oo->get_all($fields, $tables, $where, $order, $limit);
$annualreportsid = $annualreports[0]['id'];
$years = $oo->nav(["$annualreportsid"], $annualreportsid);    // nav needs ids array, rootid int
$yearsinorder = array();    
if ($thisyear) 
    $yearsinorder[0]['o'] = $thisyearobject;
foreach($years as $year)
    if ($year['o']['name1'] != $thisyear)
        array_push($yearsinorder, $year);

// output html
?><div id="year-menu" class="h-centre <? echo ($thisyear) ? 'hide-overflow' : 'show-overflow'; ?>"><?
foreach($yearsinorder as $year) {
	$year_digits = str_split($year['o']['name1']);
    $urls = array();
	foreach($year_digits as $d)
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

<? 
// year menu
// show all years on index, only selected on event
// order years, no repeats
//
// #year-menu
//  .year
//  .year
//  .year
//  .year
//  ...

$thisyear = $uu->urls[1];
if(intval($thisyear))
    $thisyearobject["name1"] = $thisyear;
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
    if ($thisyear && $view == "report") {
        // output html
        ?><div id="year-menu" class="<? echo ($thisyear) ? 'hide-overflow' : 'show-overflow'; ?>"><?
        foreach($yearsinorder as $year) {
	        $year_digits = str_split($year['o']['name1']);
            $urls = array();
	        foreach($year_digits as $d)
		        $urls[] = $media_path."png/$d.png";
            $urlpoint = $media_path."png/point.png";
            ?><a href="<? echo $host . "annual-reports/" . $year['o']['name1']; ?>"><?
                ?><div class="year"><?
                foreach($urls as $u) {
                    ?><img src="<? echo $u; ?>"><?
                }
                ?><span id="dot"><img src="<? echo $urlpoint; ?>"></span><?
                ?></div><?
            ?></a><?
        }
    } 
?></div>

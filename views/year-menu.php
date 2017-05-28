<!--
// if ($title == "Point") $is_home = true;
// look in o-r-g, get all years that are objects
// break up strings into letters, 
// use letters to recover pngs
// if $is_home (very crappy) then show full menu, otherwise show only one year
// better way would be to look at url and get date from that
// rm hardcoded year below (!)
// on rollover, drop down menu of years
// resolve blink
-->

<div id="year" class="h-centre"><?
$currentyear = 2016;
for ($i = $currentyear; $i >= 2013; $i--) {
    $year = (string) $i;
	$y_arr = str_split($year);
    $urls = array();
	foreach($y_arr as $d)
		$urls[] = $media_path."png/$d.png";
    $urlpoint = $media_path."png/point.png";
    	
    ?><a href="<? echo $host . "annual-reports/" . $year; ?>"><?
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

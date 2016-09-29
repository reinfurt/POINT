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
    ?><div class="year-container"><?
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

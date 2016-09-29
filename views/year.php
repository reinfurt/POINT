<?
$use_imgs = true;

if($use_imgs)
{
	$year = $uu->urls[1];
	if(!intval($year))
		$year = "2016";
    // if 2016, show entire menu
	$y_arr = str_split($year);
	
	$urls = array();
	foreach($y_arr as $d)
		$urls[] = $media_path."png/$d.png";
		$urlpoint = $media_path."png/point.png";
?><div id="year" class="h-centre"><?
	foreach($urls as $u)
	{
	?>
	<div class="digit-container">
		<img src="<? echo $u; ?>">
	</div><?
	}
	?><span id="dot" class="blink"><img src="<? echo $urlpoint; ?>"></span><?
?></div><?
}
else
{
	$year = $uu->urls[1];
	if(intval($year))
		$year = intval($year);
	else
		$year = "null";
?><div id="year" class="h-centre"><?
	?><span class="thou"></span><?
	?><span class="hund"></span><?
	?><span class="tens"></span><?
	?><span class="ones"></span><?
	?><span id="dot" class="blink"></span><?
?></div>
<script>
	// don't initiate canvas until fonts are loaded,
	// using google / typekit webfont loader
	// https://github.com/typekit/webfontloader
	WebFont.load({
		custom: {
			families: ['futura-book'],
			urls: ['<? echo $host; ?>static/css/fonts.css']
		},
		active: function() {
			init_year('year', <? echo $year; ?>);
		}
	});
</script><?
}
?>

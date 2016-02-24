<?
$year = $uu->url;
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
</script>
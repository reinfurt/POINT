<?
 		$year = $uu->url;
 		if(intval($year))
 			$year = intval($year);
 		else
 			$year = "null";
		?><div 
			id="year"
			class="h-centre"
		><?
			?><span class="thou invisible"></span><?
			?><span class="hund invisible"></span><?
			?><span class="tens invisible"></span><?
			?><span class="ones invisible"></span><?
			?><span id="dot" class="blink"></span><?
		?></div>
		<!-- script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.10/webfont.js"></script -->
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
	</body>
</html>
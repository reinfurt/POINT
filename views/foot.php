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
			?><span class="thou hidden"></span><?
			?><span class="hund hidden"></span><?
			?><span class="tens hidden"></span><?
			?><span class="ones hidden"></span><?
			?><span id="dot" class="blink"></span><?
		?></div>
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.10/webfont.js"></script>
		<script>
			// don't initiate canvas until fonts are loaded,
			// using google / typekit webfont loader
			// https://github.com/typekit/webfontloader
			WebFont.load({
				custom: {
					families: ['futura-book'],
					urls: ['<? echo $host; ?>static/css/global.css']
				},
				active: function() {
					init_year('year', <? echo $year; ?>);
					// initPointDuration("canvas0");
				}
			});
		</script>
		<script type="text/javascript">
			//var animate = !(checkCookie("animateCookie"));
			//setCookie("animateCookie");
			animate = true;
			tickerDelay = 40;
			document.onload = initMessage("ticker-source","ticker-display",animate,tickerDelay);
		</script>
	</body>
</html>
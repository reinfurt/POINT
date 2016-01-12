		<a href="<? echo $host; ?>annual-reports/2015">
			<div id="sign"></div>
		</a>
		<div 
			id="clock" 
			class="h-centre"
			onmouseover="initCycle('<? echo $host; ?>');"
			onmouseout="stopCycle();"
			onclick="javascript:location.href='<? echo $host; ?>annual-reports/2015'"
		>
			<canvas id="canvas0"></canvas>
		</div>
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
					initPointDuration("canvas0");
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
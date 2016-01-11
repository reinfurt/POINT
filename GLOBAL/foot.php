			<!-- 
			<div id="neon">                        
				<img src="MEDIA/neon.jpg" style="width: 100%;">                
			</div>
			-->
			<a href="<? echo $base_url; ?>?id=2,6"><div id="sign"></div></a>
			<div 
				id="clock" 
				class="h-centre"
				onmouseover="selectYear(2015);" 
				onmouseout="displayYear(2014);"
				onclick="javascript:location.href='<? echo $base_url; ?>?id=2,6'"
			>
				<!-- canvas id="canvas0" width="600" height="220"></canvas-->
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
						urls: ['static/css/global.css']
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
	</div>
</html>

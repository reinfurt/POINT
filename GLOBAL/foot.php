			<!-- 
			<div id="neon">                        
				<img src="MEDIA/neon.jpg" style="width: 100%;">                
			</div>
			-->
			<a href="<? echo $base_url; ?>?id=2,6">
			<div id="sign">
				<!-- <img src="MEDIA/man-k.jpg" style="width: 100%;"> --> 
				<!-- <img src="MEDIA/2015-door.jpg" style="width: 100%;"> -->
				<!-- <img src="MEDIA/2015-door-crop-3.jpg" style="width: 100%;"> -->
				<!-- <img src="MEDIA/2015-door-crop-3-k.jpg" style="width: 100%;"> -->
			</div>
			</a>

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

			<script>
				window.onload = initPointDuration("canvas0");
			</script>
			<!--script type="text/javascript" src="JS/mobile.js"></script-->
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

<script type="text/javascript" src="<? echo $host; ?>static/js/animate-message.js"></script>
<div id="page">
	<header class="now">
		<p>
			<a href="<? echo $host; ?>">This website</a> is a filing 
			cabinet for the ANNUAL REPORTS of POINT Centre for 
			Contemporary Art, Nicosia, Cyprus since 2012. Select a year 
			to review. . .
		</p><?
		if(!$uu->id)
		{
		?><p>
		Meanwhile, here is what's happening now:
		</p>
		<div id="ticker-wrapper">
			<div id="ticker-display"></div>
			<div id="ticker-source" class="hidden"><?					
			foreach($now_children as $c)
			{
				echo process_md($c['name1']." / ".$c['deck']." / ".$c['body']);
			}
			?></div>
		</div>
		<script type="text/javascript">
			//var animate = !(checkCookie("animateCookie"));
			//setCookie("animateCookie");
			animate = true;
			tickerDelay = 40;
			document.onload = initMessage("ticker-source","ticker-display",animate,tickerDelay);
		</script><?
		}
		else
		{
		?><div id="event-wrapper">
			<div id="event-display"><?	
			echo process_md($item['name1']." / ".$item['deck']." / ".$item['body']);
			?></div>
		</div><?
		}
		?>
	</header>
</div>
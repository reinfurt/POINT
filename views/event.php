<script type="text/javascript" src="<? echo $host; ?>static/js/animate-message.js"></script>
<div id="page">
	<header class="now">
		<div>
			<a href="<? echo $host; ?>">This website</a> is a filing 
			cabinet for the ANNUAL REPORTS of POINT Centre for 
			Contemporary Art, Nicosia, Cyprus since 2012. Select a year 
			to review. . .
		</div>
	</header><?
		if($uu->id)
		{
		?><div id="event-wrapper" class="now">
			<div id="event-display"><?
			$m_arr = $oo->media($uu->id);
			$b_arr = process_event($item['name1']." / ".$item['body']);
			for($i = 0; $i < count($b_arr); $i++)
			{
				echo $b_arr[$i];
				if($m_arr[$i])
				{
				?><div class="img-container"><? 
					$ii = $i;
					while ($m_arr[$ii] != null) { ?>
						<img src="<? echo m_url($m_arr[$ii]); ?>"><?
						$ii++;
					}
				?></div><?
				}
			}
			?></div>
		</div><?
		}
		else
		{
		?><p class="now">
		Meanwhile, here is what's happening now:
		</p>
		<div id="ticker-wrapper" class="now">
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
		?>
	</header>
</div>

<script type="text/javascript" src="<? echo $host; ?>static/js/animate-message.js"></script>
<div id="page"><?
	if($uu->id)
	{
	?><div id="event-wrapper">
		<div id="event-display" class="column"><?
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
		$report_url = $host.implode("/", array_slice($uu->urls, 0, count($uu->urls)-1));
		?><div class="now"><a href="<? echo $report_url; ?>">&lt; go back to <? echo $year; ?></a></div>
		</div>
	</div><?
	}
	else
	{
	?><div>
		<p>Meanwhile, here is what's happening now:</p>
		<div id="ticker-wrapper">
			<div id="ticker-display"></div>
			<div id="ticker-source" class="hidden"><?					
			foreach($now_children as $c)
			{
				echo process_md($c['name1']." / ".$c['deck']." / ".$c['body']);
			}
			?></div>
		</div>
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
</div>

<div class="now">
	<div id="a-z-select">A–Z</div>
</div>
	
<div id="a-z" class="now"><?
	$report_id = 6;
	$u = $oo->get($report_id)['url'];
	$reports = $oo->children($report_id);
	foreach($reports as $r)
	{
		$url = $host.$u."/".$r['url'];
		?><div><a href="<? echo $url; ?>"><? echo $r['name1']; ?></a></div><?
	}
	?></div>
	<script>
	 	a_z_select = document.getElementById("a-z-select");
		a_z_select.onclick = 
		function()
		{
			a_z = document.getElementById("a-z");
			if(a_z.style.display == "block")
				a_z.style.display = "none";		
			else
				a_z.style.display = "block";
			};
	</script>
</div>

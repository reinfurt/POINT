<?
// id for parent annual report object
$annual_reports_id = 2;

// ids of annual reports
$reports = $oo->children($annual_reports_id);

// media arrays of annual report covers
$report_urls = array();
$cover_urls = array();

// get / output covers

if($is_report)
{
	$cover_url = m_url($oo->media($uu->id)[0]);
?><div id="reports-alt"
	onmouseover="show_reports();"
	onmouseout="hide_reports();"
>
	<div 
		class="report-container select"
		
		>
		<a href="<? echo $host.$uu->urls(); ?>">
			<img class="report-img" src="<? echo $cover_url; ?>">
		</a>
	</div><?
	for($i = 0; $i < count($reports)-1; $i++)
	{
		if($reports[$i]['id'] != $uu->id)
		{
		$report_url = $host."annual-reports/".$reports[$i]['url'];
		$cover_url = m_url($oo->media($reports[$i]['id'])[0]);
		?>
		<div class="report-container hidden">
			<a href="<? echo $report_url; ?>">
				<img class="report-img" src="<? echo $cover_url; ?>">
			</a>
		</div><?
		}
	}
?></div><?
}
else
{
	?><div id="reports"><?
	for($i = 0; $i < count($reports)-1; $i++)
	{
		$report_url = $host."annual-reports/".$reports[$i]['url'];
		$cover_url = m_url($oo->media($reports[$i]['id'])[0]);
		?>
		<div class="report-container">
			<a href="<? echo $report_url; ?>">
				<img class="report-img" src="<? echo $cover_url; ?>">
			</a>
		</div><?
	}
}
?></div>
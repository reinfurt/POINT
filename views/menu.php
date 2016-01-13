<?
// id for parent annual report object
$annual_reports_id = 2;

// ids of annual reports
$reports = $oo->children($annual_reports_id);

// media arrays of annual report covers
$report_urls = array();
$cover_urls = array();

// get / output covers
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
?></div>
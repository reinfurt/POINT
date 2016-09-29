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
	?><div id="reports-alt" onmouseover="show_reports();" onmouseout="hide_reports();">
		<div class="report-container select">
			<a href="<? echo $host.$uu->urls(); ?>">
				<img class="report-img" src="<? echo $cover_url; ?>">
			</a>
		</div><?
	?></div><?
}
?></div>

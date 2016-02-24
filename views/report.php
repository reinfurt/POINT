<?
// namespace stuff
use \Michelf\Markdown;
if($uu->id)
{

// 1. split into sections based by '++'
// 2. trim whitespace
// 3. convert from markdown to html
function process_body($b)
{
	$b = trim($b);
	$b = Markdown::defaultTransform($b);
	return $b;
}
$body = $item["body"];
$body_arr = explode("++", $body);
for($i = 0; $i < count($body_arr); $i++)
	$body_arr[$i] = process_body($body_arr[$i]);


?>
<div id="report"><?
	foreach($body_arr as $b)
	{
	?><div class="column"><? echo $b; ?></div><?
	}
?></div><?
}
?>

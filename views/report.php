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
	$i = 0;
	foreach($body_arr as $b)
	{
		if($i % 2 == 0)
		{ ?><div class="column-container"><? }
		?><div class="column"><? echo $b; ?></div><?
		if($i % 2 != 0)
		{ ?></div><? }
		$i++;
	}
?></div><?
}
?>

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
$body = process_body($body);

?>
<div id="page">
	<div id="main"><? echo $body; ?></div>
</div><?
}
?>

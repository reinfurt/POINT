<?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();
$media_dims = array();
?>

<div id="back">
    <img id="hand" src="<? echo $host; ?>media/png/hand-left.png" onclick="window.history.back();">
</div>

<section>
	<div id="gallery">
        &nbsp;
        <div id="gallery-square">
            <div id="gallery-next" class="controls white"><img id="hand" src="<? echo $host; ?>media/png/hand-right.png"></div>
            <div id="gallery-prev" class="controls white"><img id="hand" src="<? echo $host; ?>media/png/hand-left.png"></div>
            <div id="gallery-close" class="controls white"><img src="<? echo $host; ?>media/svg/ex.svg" style="width:20px;"></div>
            <!-- <p id="orientation" class="controls centered white">Rotate device to determine orientation</p> -->
        </div>
        <img id="gallery-img" src="">
    		<div id="gallery-caption">
                <? echo $caption; ?>
            </div>
	</div>

	<figure id="thumbs-container" class="column top right"><?
	$i = 0;
	foreach($media as $m) {
		$url = m_url($m);
        if ($m['type'] == "pdf")
            $pdf = true;
		$caption = $m['caption'];
		$media_urls[] = $url;
		$media_captions[] = $caption;
        $relative_url = "media/" . m_pad($m['id']).".".$m['type'];
        $size = getimagesize($relative_url);
        $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
        $media_dims[] = $wide_tall;
        $padding = rand(0, 10);
        $margin = rand(0, 20);
        $width = rand(2, 5)*10;
        $float = (rand(0, 1) == 0) ? 'left' : 'right';
        // $style = "width: " . $width . "%; float: " . $float . "; padding: " . $padding ."px; margin: " . $margin ."px;";
        $style = "width: 100%;";
	?>
	<div class="thumb" style="<? echo $style; ?>">
		<div class="img-container"><?
            if ($pdf) {
                ?><a href="<? echo $url; ?>">
                    <img src="<? echo $host; ?>media/png/pdf.png">
                </a><?
            } else {
                ?><img src="<? echo $url; ?>"><?
            }
        ?></div>
		<div class="caption">
            <? echo $caption; ?>
        </div>
	</div><?
	}   
	?></figure><?
    if($uu->id) {
    ?>
    <div id="page" class="column">
    <div id="event-wrapper">
        <div id="event-display">
            <header><? echo $item['name1']; ?></header><?
        $b_arr = process_event($item['body']);
        for($i = 0; $i < count($b_arr); $i++)
            echo $b_arr[$i] . "<br />";
            $report_url = $host.implode("/", array_slice($uu->urls, 0, count($uu->urls)-1));
            ?><div class="helvetica">
                <img id="hand" src="<? echo $host; ?>media/png/hand-left.png" onclick="window.history.back();">
            </div>
        </div>
    </div>
    </div><?
    }
    ?>
    </div>
</section>
<script type="text/javascript" src="<? echo $host; ?>static/js/screenfull.js"></script>
<script type="text/javascript" src="<? echo $host; ?>static/js/gallery.js"></script>
<script>
    var imgs = <? echo json_encode($media_urls); ?>;
    var dims = <? echo json_encode($media_dims); ?>;
</script>

<?
if($uu->id)
{
?><div id="close">
    <a href="<? echo $js_back; ?>"><img src="<? echo $media_path; ?>svg/ex.svg"></a>
</div><?
}   
?><script type="text/javascript" src="<? echo $host; ?>static/js/animate-message.js"></script>
<script src="<? echo $host; ?>static/js/gallery.js"></script>
<?
if ($uu->id)
{
    $m_arr = $oo->media($uu->id);
    $media_urls = [];
    $media_captions = [];
    if ($m_arr[0])
    {
    ?><div id="img-display"><?
        $b_arr = process_event($item['body']);
        for($i = 0; $i < count($b_arr); $i++)
        {
            if($m_arr[$i])
            {
            ?><div class="img-container"><? 
                $ii = $i;
                while ($m_arr[$ii] != null) 
                { 
                    $m_url = m_url($m_arr[$ii]);
                    $media_urls[] = $m_url;
                    $media_captions[] = $m_arr[$ii]['caption'];
                    
                    // insert random sizing here

                    $padding = rand(0, 10);
                    $margin = rand(0, 20);
                    $width = rand(2, 5)*10;
                    $float = (rand(0, 1) == 0) ? 'left' : 'right';
                    $style = "width: " . $width . "%; float: " . $float . "; padding: " . $padding ."px; margin: " . $margin ."px;";
                    ?><div class="image" onclick="launch(<? echo $ii; ?>)" style="<? echo $style; ?>">
                        <img src="<? echo $m_url; ?>">
                    </div><?
                    $ii++;
                }
            ?></div><?
            }
        }
        ?><img id="img-gallery" src="">
        <div id="img-caption"></div>
    </div><?
    }
}
?><?
    if($uu->id)
    {
    ?>
    <div id="page" class="column">
    <div id="event-wrapper">
        <div id="event-display">
            <header><? echo $item['name1']; ?></header><?
        $b_arr = process_event($item['body']);
        for($i = 0; $i < count($b_arr); $i++)
            echo $b_arr[$i] . "<br />";
            $report_url = $host.implode("/", array_slice($uu->urls, 0, count($uu->urls)-1));
            ?><div class="now">
                <a href="<? echo $report_url; ?>">Go back to <? echo $year; ?>. . . </a>
            </div>
        </div>
    </div>
    </div><?
    }
    else
    {
    ?><div class="now column">
        <p>Meanwhile, here is what’s happening now:</p>
        <div id="ticker-wrapper">
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
</div>
<script>
    var images = <? echo json_encode($media_urls); ?>;
    var captions = <? echo json_encode($media_captions); ?>;
    var gallery_id = "img-display";
    var gallery_img = "img-gallery"
    var index = 0;
    var inGallery = false;
    var attached = false;
    var gallery = document.getElementById(gallery_id);
</script>
    

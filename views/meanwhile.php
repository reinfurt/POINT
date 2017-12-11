    <div id="meanwhile" class="helvetica column">
        <p>Meanwhile, here is what’s happening now:</p>
        <div id="ticker-wrapper">
            <div id="ticker-display"></div>
            <div id="ticker-source" class="hidden"><?
            foreach($meanwhile_children as $c)
            {
                echo process_md($c['name1']." | ".$c['deck']." | ".$c['body']);
            }
            ?></div>
        </div>
        <script type="text/javascript" src="<? echo $host; ?>static/js/animate-message.js"></script>
        <script type="text/javascript">
            //var animate = !(checkCookie("animateCookie"));
            //setCookie("animateCookie");
            animate = true;
            tickerDelay = 40;
            document.onload = initMessage("ticker-source","ticker-display",animate,tickerDelay);
        </script>
    </div><?


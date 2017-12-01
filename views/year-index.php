<?

// looks in the Index category in open-records-generator, 
// displays all related entries organized by year
// so at http://dev.o-r-g.com/point/annual-reports/2014 then 
// only show the index from 2014

// or something like this anyway
// then the required records are linked in the open-records-generator as needed.


// prob dont need these

function handleArticles($str) {
    // ignore non-alphanumerics
    $str = preg_replace("/[^A-Za-z0-9 ]/", '', $str);
    
    // the extra space is to prevent "undefined offset" notices
    // on single-word titles
    list($first, $rest) = explode(" ",$str." ",2);

    $validarticles = array("a","an","the");
        
    if (in_array(strtolower($first), $validarticles)) 
        return $rest.", ".$first;
    
    return $str;
}

function sort_sans_articles($a, $b) {
    return strnatcasecmp(handleArticles($a),handleArticles($b));
}

?><!-- <div class="helvetica">
    <div id="a-z-select">A–Z</div>
</div> -->
<div id="a-z" class="helvetica"><?
    $report_ids = array(3, 4, 5, 6);
    // make (wires.fromid = 3 OR wires.fromid = 4 . . . )
    $rsql = "(wires.fromid = ".$report_ids[0];
    for($i = 1; $i < count($report_ids); $i++)
    {
        $rid = $report_ids[$i];
        $rsql.= " OR wires.fromid = $rid";
    }
    $rsql.= ")";
    $sql = "SELECT 
                objects.*,
                wires.fromid
            FROM
                objects, wires
            WHERE
                objects.active = 1
                AND wires.active = 1
                AND wires.toid = objects.id
                AND $rsql";
    $res = $db->query($sql);
    $reports = array();
    while($obj = $res->fetch_assoc())
        $reports[] = $obj;
    $res->close(); 
    $report_id = 6;
    
    $names = array();
    $urls = array();
    // $u = "annual-reports/".$oo->get($report_id)['url'];
    // $reports = $oo->children($report_id);
    foreach($reports as $r)
    {
        // this is extremely inefficient -- how to make it better?
        $u = "annual-reports/".$oo->get($r['fromid'])['url'];
        $url = $host.$u."/".$r['url'];
        $names[$r['id']] = $r['name1'];
        $urls[$r['id']] = $url
        ?><!-- div><a href="<? echo $url; ?>"><? echo $r['name1']; ?></a></div --><?
    }
    uasort($names, 'sort_sans_articles');
            
    foreach($names as $id => $name)
    {
        ?><div><a href="<? echo $urls[$id]; ?>"><? echo $name; ?></a></div><?
    }
    ?></div>
	
    <!-- <script>
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
    </script> -->
</div>

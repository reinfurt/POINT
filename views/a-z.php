<div class="now">
    <div id="a-z-select">A–Z</div>
</div>
    
<div id="a-z" class="now"><?
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
                AND $rsql
            ORDER BY
                objects.name1";
    $res = $db->query($sql);
    $reports = array();
    while($obj = $res->fetch_assoc())
        $reports[] = $obj;
    $res->close(); 
    $report_id = 6;
    // $u = "annual-reports/".$oo->get($report_id)['url'];
    // $reports = $oo->children($report_id);
    foreach($reports as $r)
    {
        // this is extremely inefficient -- how to make it better?
        $u = "annual-reports/".$oo->get($r['fromid'])['url'];
        $url = $host.$u."/".$r['url'];
        ?><div><a href="<? echo $url; ?>"><? echo $r['name1']; ?></a></div><?
    }
    ?></div>
    <script>
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
    </script>
</div>

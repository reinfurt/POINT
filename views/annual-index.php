<?
// looks in the Index category in open-records-generator, 
// displays all related entries organized by year *using sql to pick year*
// so at http://dev.o-r-g.com/point/annual-reports/2014 then 
// only show the index from 2014

// or something like this anyway
// then the required records are linked in the open-records-generator as needed.

// do a nav within index object? or better, 
// just a raw sql search to return the top two levels? unclear

$rootid = "497";
$tree = $oo->traverse($rootid);
$nav = $oo->nav_full($tree);           
?>

<?
// this should either show the button or show the list i think
if ($url == "annual-index") {

} else {

}
?>

<div class="helvetica">
    <div id="annual-index-select"><a href='/annual-index'>Index</a></div>            
</div>

<div id="annual-index" class="helvetica">
Annual Index<?
foreach($nav as $n) {
    $d = $n['depth'];
    if($d > $prevd) {
        ?><ul class="nav-level"><?                    
   } else {
        for($i = 0; $i < $prevd - $d; $i++) { 
            ?></ul><? 
        }
    }
    ?><li><?
    if($n['o']['id'] != $uu->id) {
        ?><a href="<? echo $host."annual-index/".$n['url']; ?>"><?
            echo htmlentities($n['o']['name1']);
        ?></a><?
    } else {
        ?><span><? echo htmlentities($n['o']['name1']); ?></span><?
    }
    ?></li><?
    $prevd = $d;
}
?></div>

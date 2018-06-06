<?php 
include ('serie.php');
header('Content-type: text/xml');
$serie= new serie('xml');
    

echo $serie->getAll();

?>
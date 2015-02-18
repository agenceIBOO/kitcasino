<?php

$adresse2 = "24+rue+de+vergennes+78000+Versailles";
$q = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$adresse2.";&destinations=17+Hameau+des+Marronniers+77185+Lognes&mode=driving&sensor=false";

$json = file_get_contents($q);

$details = json_decode($json, TRUE);
$dist_brut = $details['rows']['0']['elements']['0']['distance']['text'];
$distance = str_replace(",", "", $dist_brut);
$distance = str_replace("km", "", $distance);

echo $distance;

?>
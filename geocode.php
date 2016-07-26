<?php
    $lat = 0;
    $lng = 0;
    $address = "茨城県つくば市春日 4-12-3 ";
    $ret = "http://maps.google.com/maps/api/geocode/json";
    $ret .= "?address=".urlencode($address);
    $ret .= "?sensor=false";

    $json = file_get_contents($ret);

    $obj = json_decode($json);

    //jsonから座標を取得
    if($obj->{"status"} == "OK") {
        $location = $obj->{"results"}[0]->{"geometry"}->{"location"};
        $lat = $location->{'lat'};
        $lng = $location->{'lng'};
    }
    echo $lat;
    echo " ";
    echo $lng;
?>

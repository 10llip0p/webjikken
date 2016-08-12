<?php
    session_start();
    require("keys.php");

    //ぐるなびapiからjsonを取得
    $uri   = "http://api.gnavi.co.jp/RestSearchAPI/20150630/";
    $acckey= $gn_key;
    //フォーマット
    $format= "json";
    //緯度・経度
    // $lat   = 36.096903;
    // $lon   = 140.099045;
    $lat = $_POST["post_lat"];
    $lng = $_POST["post_lng"];

    //300m/range
    $range = 5;
    $hits = 500;
    $word = $_POST["freeword"];
    $word_enc = urlencode($word);

    //URL
    $url  = sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s", $uri, "?format=", $format, "&keyid=", $acckey,
        "&latitude=", $lat,"&longitude=",$lng,"&range=",$range, "&hit_per_page=",$hits, "&freeword=",$word_enc);
    //API実行
    $json = file_get_contents($url);

    $obj = json_decode($json);

    $_SESSION["obj"] = $obj;
    $_SESSION["freeword"] = $word;
    $_SESSION["lat"] = $lat;
    $_SESSION["lng"] = $lng;

    header("Location: result.php");

    exit;
?>
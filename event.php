<?php
    session_start();

    //ぐるなびapiからjsonを取得
    $uri   = "http://api.gnavi.co.jp/RestSearchAPI/20150630/";
    $acckey= "";
    //フォーマット
    $format= "json";
    //緯度・経度
    $lat   = 36.090410;
    $lon   = 140.107721;
    //300m/range
    $range = 5;
    $hits = 500;
    $word = $_POST["freeword"];
    $word_enc = urlencode($word);

    //URL
    $url  = sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s", $uri, "?format=", $format, "&keyid=", $acckey,
        "&latitude=", $lat,"&longitude=",$lon,"&range=",$range, "&hit_per_page=",$hits, "&freeword=",$word_enc);
    //API実行
    $json = file_get_contents($url);

    $_SESSION["obj"] = json_decode($json);

    header("Location: result.php");

    exit;
?>
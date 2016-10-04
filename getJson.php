<?php
    session_start();
    require("keys.php"); //別ファイルからアクセスキーを読み込む

    //ぐるなびAPI
    $uri   = "http://api.gnavi.co.jp/RestSearchAPI/20150630/";
    $acckey= $gn_key;

    $format= "json";

    //緯度・経度
    $lat = $_POST["post_lat"];
    $lng = $_POST["post_lng"];

    $range = 5; //1rangeあたり半径300mを検索
    $hits = 500; //最大件数
    $word = $_POST["freeword"];
    $word_enc = urlencode($word);

    //APIからJSON取得
    $url  = sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s", $uri, "?format=", $format, "&keyid=", $acckey,
        "&latitude=", $lat,"&longitude=",$lng,"&range=",$range, "&hit_per_page=",$hits, "&freeword=",$word_enc);
    $json = file_get_contents($url);

    $obj = json_decode($json);

    $_SESSION["obj"] = $obj;
    $_SESSION["freeword"] = $word;
    $_SESSION["lat"] = $lat;
    $_SESSION["lng"] = $lng;

    header("Location: result.php");

    exit;
?>
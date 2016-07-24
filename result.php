<?php
    session_start();

    //取得した結果をオブジェクト化
    $obj  = $_SESSION["obj"];

/*
    //結果をパース
    //トータルヒット件数、店舗番号、店舗名、最寄の路線、最寄の駅、最寄駅から店までの時間、店舗の小業態を出力
    foreach((array)$obj as $key => $val){
        if(strcmp($key, "total_hit_count" ) == 0 ){
            echo "total:".$val."\n";
        }

        if(strcmp($key, "hit_per_page") == 0) {
            echo "hits:".$val."\n";
        }
        if(strcmp($key, "rest") == 0){
            foreach((array)$val as $restArray){
                //if(checkString($restArray->{'id'}))   echo $restArray->{'id'}."\t";
                if(checkString($restArray->{'name'})) echo $restArray->{'name'}."\t";
                if(checkString($restArray->{'latitude'}))    echo $restArray->{'latitude'}."\t";
                if(checkString($restArray->{'longitude'}))    echo $restArray->{'longitude'};
                //if(checkString($restArray->{'access'}->{'station'})) echo (string)$restArray->{'access'}->{'station'}."\t";
                //if(checkString($restArray->{'access'}->{'walk'}))    echo (string)$restArray->{'access'}->{'walk'}."分\t";

                //foreach((array)$restArray->{'code'}->{'category_name_s'} as $v){
                //    if(checkString($v)) echo $v."\t";
                //}
                echo "\n";
            }

        }
    }

    //文字列であるかをチェック
    function checkString($input)
    {

        if(isset($input) && is_string($input)) {
            return true;
        }else{
            return false;
        }

    }
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mohikan</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key="></script>
</head>
<body onload="initMap();">

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- ナビゲーションバー -->
        <div class="navbar-header">
            <a class="navbar-brand" href="./index.php">mohikan</a>
        </div>
    </div>
</nav>
<div id="map-canvas"></div>

</body>
</html>

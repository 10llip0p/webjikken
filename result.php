<?php
    session_start();
    require("keys.php");

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
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $gm_key ?>"></script>
</head>
<body onload="initMap()">

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

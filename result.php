<?php
    session_start();
    require("keys.php");
    $lat = $_SESSION["lat"];
    $lng = $_SESSION["lng"];

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
<body onload="initMap(<?php echo $lat; ?>, <?php echo $lng; ?>)">

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="./index.php">mohikan</a>
            <form id="research" class="navbar-form navbar-left" role="search" action="getJson.php" method="post">
                <div class="form-group">
                    <input type="text" name="freeword" class="form-control" value=<?php echo $_SESSION["freeword"]; ?> >
                    <input type="hidden" value="" id="post_lat" name="post_lat">
                    <input type="hidden" value="" id="post_lng" name="post_lng">
                </div>
                <button type="submit" id="subm_button" class="btn btn-default">検索</button>
            </form>
            <p class="navbar-text" id="total-count">読込中...</p>
        </div>
    </div>
</nav>
<div id="map-canvas"></div>

</body>
</html>

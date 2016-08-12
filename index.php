<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>mohican</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="bcenter">
    <div class="center-block">
        <div class="text-center">
			<h1>mohican!</h1>
		</div>
    	<form action="getJson.php" method="post">
			<div class="form-group">
				<input type="text" name="freeword" class="form-control" placeholder="ここは1単語だけ入力するところ">
				<input type="hidden" value="36.096903" name="post_lat">
                <input type="hidden" value="140.099045" name="post_lng">
			</div>
			<p class="text-center"><button type="submit" class="btn btn-default">検索</button></p>
		</form>
	</div>
</div>

</body>
</html>
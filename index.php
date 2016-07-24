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
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- ナビゲーションバー -->
		<div class="navbar-header">
			<a class="navbar-brand" href="./index.php">mohikan</a>
		</div>
	</div>
</nav>

<div class="bcenter">
    <div class="center-block">
        <div class="text-center">
			<h1>mohikan!</h1>
		</div>
    	<form action="event.php" method="post">
			<div class="form-group">
				<input type="text" name="freeword" class="form-control">
			</div>
			<button type="submit" class="btn btn-default">検索</button>
		</form>
	</div>
</div>

</body>
</html>
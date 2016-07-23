<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>mohikan</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
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
    	<form action="event.php">
			<div class="form-group">
				<input type="text" name="search" class="form-control">
			</div>
		<button type="submit" class="btn btn-default">検索</button>
		</form>
	</div>
</div>

</body>
</html>
<html>
	<head>
	<title>CourSea</title>
	<meta charset="utf-8">
 	<link rel="icon" type="image/jpg" sizes="16x16" href="publi/logo_1.jpg">
 	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="css/stile.css">
 	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 	<style>
	body {
		background-color: #CCFF99;
		background-image: url("list1.jpg");
	}
	table {
		width: 100%;
		font-size: 25px;
		margin-top: 4%;	
	}
	table,th,td {
		border-collapse: collapse;
	}
	th {
		font-style: italic;
		font-size: 30px;
	}
	td {
		padding: 5px;
	}
	img{
		width: 50%;
	}
	.rop{
		margin-top: 10%;
	}
	</style>
	</head>
	<body>
		<center><img src="logo.png"></center>
		<div class="container rop">
			<div class="row">
				<div class="col-md-6">
					<h2>UserName</h2>
					<?php
						$i = json_decode(file_get_contents("users.json"), true);
						foreach ($i as $key => $value) {
							#code...
							foreach ($i[$key] as $key => $value) {
								# code..
							if ($key=="username") {
								# code...
								echo "<h3>    $value</h3>";
							}
				
						}
					}
				?>
				</div>
				<div class="col-md-6">
					<h2>AdmissionNo</h2>
					<?php
						$i = json_decode(file_get_contents("users.json"), true);
						foreach ($i as $key => $value) {
							#code...
							foreach ($i[$key] as $key => $value) {
								# code..
							if ($key=="admin") {
								# code...
								echo "<h3>   $value</h3>";
							}
				
						}
					}
				?>
				</div>
			</div>
		</div>
	</body>

</html>
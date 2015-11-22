<?php
	session_start();
?>
<html>
<head>
	<title>CourSea</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 	 <link rel="stylesheet" type="text/css" href="style.css">
  	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<style>
	body{
		background-color: DarkGray;
	}
	.a1{
		display: flex;
		width: 95%;
		margin-top: 0%;
		padding-left: 5%;
		font-size: 20px;
		color: DarkSlateGray;
	}
	.a2{
		margin: 5%;		
	}
	.a12{
		margin-left: 85%;
		
	}
	.a12:hover{
		text-decoration: underline;
		color: white;

	}
	.a11:hover{
		text-decoration: underline;
		color: white;
	}
	a{
		color:  DarkSlateGray;
	}
	a:hover{
		color: white;
	}
	a:link{
		text-decoration: none;	
	}
	a:visited {
    	text-decoration: none;
    }
    .button {
    	background-color: SkyBlue;
    	border: none;
    	padding: 15px 32px;
    	text-align: center;
    	text-decoration: none;
    	font-size: 16px;
    	cursor: pointer;
    	transition-duration: 0.4s;
    	width: 50%;
    	border-radius: 10px;
    	color: DarkslateGray;
	}
	.button1:hover {
    	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    	color: white;
	}
	.button2:hover {
    	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    	color: white;
	}
	</style>
</head>
	<body>
		<div class="container">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<img src="images/logo.png" height="100px" width="400px">
			</div>
			<div class="col-md-4"></div>
		</div>
		<div>
			
		<div class="a1">
			<div class="a11"><p>ADMIN</p></div>
			<div class="a12"><p><a href="login.php">Logout</a></p></div>
		</div>
		<div class="a2">
			<center><button class="button button1" Onclick="window.location.href='adduser.php'"/>Add User</button></center>
		</div>
		<div class="a2">
			<center><button class="button button2" Onclick="window.location.href='userlist.php'"/>User List</button></center>
		</div>
		</div>
		</div>
	</body>
</html>
<?php
	session_start();
?>
<?php
		class Emp{
			public $username="";
			public $admin="";
			public $pass="";
		}
		$e=new Emp();
		if (isset($_POST["user"])) {
			# code...
			$e->username=$_POST["user"];
		}
		if (isset($_POST["admin"])) {
			# code...
			$e->admin=$_POST["admin"];
		}
		if (isset($_POST["pass"])) {
			# code...
			$e->pass=$_POST["pass"];
		}

		//open the json file
		$file=fopen("users.json", "a+") or die("Unable to open the file");

		//decode and write in json fiie
		$json = json_decode(file_get_contents("users.json"), true);

		$json[$e->username] = array("username" => $e->username, "admin" => $e->admin, "password" => $e->pass);
		file_put_contents("users.json", json_encode($json, JSON_PRETTY_PRINT));
?>
<html>
	<head>
		<title>CourSea</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 		 <link rel="stylesheet" type="text/css" href="style.css">
  		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<style type="text/css">
		body{
			font-size: 20px;
			background-image: url("Untitled-1.jpg");
			background-repeat: no-repeat;
		}
		fieldset{
			margin-top: 6%;
			width: 25%;	
			border: 5px SkyBlue;	
			background-color: rgba(255, 153, 204,0.5);
			border-radius: 50px 5px;
			width: 425px;
			height: auto;
			padding: 50px;
			font-size: 25px;
			box-shadow: 10px 10px 5px DarkSlateGray;
		}
		.button {
    		background-color: SkyBlue;
    		border: none;
    		padding: 15px 32px;
    		text-align: center;
    		text-decoration: none;
    		font-size: 16px;
    		cursor: pointer;
    		border-radius: 10px;
    		font-size: 20px;
		}
		.button:hover {
    		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    		color: white;
		}
		.height{
			height: 40px;
			border-radius: 5px;
			border: none;
			padding: 20px;
			font-size: 18px;
		}

</style>
	</head>
	<body>
		<div class="container">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<img src="images/logo.png" height="100px" width="400px" style="margin-top:2%;">
			</div>
			<div class="col-md-4"></div>
		</div>
		<form method="post">
		<center><fieldset>
			<input type="text" name="full name" placeholder="Enter Your Name" size="30" class="height" name="user">
			<br><br>
			<input type="text" placeholder="Enter Your Admission No."  size="30" class="height" name="admin">
			<br><br>	
			<input type="password" name="password" placeholder="Enter Your Password"  size="30" class="height" name="pass">
			<br><br>
			<center><button type="submit" class="button">Add User</button>
		</fieldset></center>
	</form>


	</body>
</html>

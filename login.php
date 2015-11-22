<!--login usin php-->
<?php
	session_start();
?>

<html>
<head>
	<title>LOGIn</title>
	 <meta charset="utf-8">
    <link rel="icon" type="image/jpg" sizes="16x16" href="publi/logo_1.jpg">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		$error="";
	   //variables
		$user=$pass="";
		//array having all user information
		$users=json_decode(file_get_contents("users.json"), true);
		if(isset($_POST['username'])) {
    		$user=$_POST['username'];
		}
		if(isset($_POST['password'])){
			$pass=$_POST['password'];
		}

		//check for users
		if(empty($user) or empty($pass)){
			$_SESSION["error"]="Please fill the form";
		}
		else if ($user=="admin" and $pass="123") {
			# code...
			header("location:admin.php");
		}
		elseif (array_key_exists($user, $users)) 
		{
			if($pass==$users[$user]["password"]){
				header("location:ind.php");
			}
			else{
				$_SESSION["error"]="Wrong username password combination";
			}
		}
		else{
			$_SESSION["error"]="Username is not in database";
		}

		$_SESSION['username']=$user;//session variables
		
			
	?>

	<div class="container-fluid">
    <img src="images/logo.png" >
 		<!--LOGIN FORM -->

 		<div class="row">
 			
 			<div class="col-md-4  loginform">
 				<h4><?php echo $_SESSION["error"];?></h4>
 				<form role="form" method="post">

				  	<div class="form-group">
    			  		<label class="sr-only control-label" for="email">User ID:</label>
    			  		<input type="text" class="form-control input-lg" id="email" placeholder="Enter Username here" size="20px" name="username">
  					</div>
  					<div class="form-group">
    					<label class="sr-only" for="pwd">Password:</label>
    					<input type="password" class="form-control input-lg" id="pwd" placeholder="Enter Password here" name="password">
  					</div>
  					<div class="checkbox">
    					<label><input type="checkbox">      Remember me</label>
  					</div>
  					<button type="submit" class="btn btn-default btn-block btn-info">Login</button>
     
				</form>
      </div>
      <div class="col-md-8"></div>
 			</div>
 		</div>
 	</div>
	
	
	
	
</body>
</html>
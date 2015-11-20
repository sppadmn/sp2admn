<!--login usin php-->
<?php
	session_start();
?>

<html>
<head>
	<title>LOGIn</title>
</head>
<body>
	<form method="post">
		user:<input type="text" name="username"><br>
		pass:<input type="password" name="password"><br>
		<input type="submit">
	</form>
	<?php
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
			echo "<h4>Please fill the field</h4>";
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
				echo "Wrong username password combination";
			}
		}
		else{
			echo "Username is not in databasee";
		}

		$_SESSION['username']=$user;//session variables
		
			
	?>
	
	
	
</body>
</html>
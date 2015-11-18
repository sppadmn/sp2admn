<html>
<head>
  <title>Login form</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//here define variable
	$name=$email=$website=$comment=$gender="";
//here define variable for error message
	$nameErr=$emailErr=$genderErr=$websiteErr="";
//execute if request method is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 		$nameErr = "Only letters and white space allowed"; //error message if name is not proper
 	 //preg_match checks the variable with given pattern
	}
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$emailErr = "Invalid email format"; //filter-var is php functiom check for valid email address
	}
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
  		$websiteErr = "Invalid URL"; //same as name variable
	}
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
	function test_input($data){
		$data = trim($data);//remove extra space
  		$data = stripslashes($data);//remove / from user input
  		$data = htmlspecialchars($data);//change < etc in html format
  		return $data;
	}
?>
<div class="container">
  <div class="row">
    <div class="col-md-12" style="text-align:center;">
      <h2>Registration Form</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);//return value of currently executing sccript?>" method="post" role="form">
  <div class="form-group">
    Name*: <input type="text" class="form-control" name="name" value="<?php echo $name;//assigining value equal to php variables?>">
    <span class="error"><?php echo $nameErr;?></span><br><!-- display the error message-->
  </div>
  <div class="form-group">
    E-mail*: <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
    <span class="error"><?php echo $emailErr;?></span><br>
  </div>
  <div class="form-group">
    Website:<input type="text" name="website" class="form-control" value="<?php echo $website;?>"><br>
    <span class="error"><?php echo $websiteErr;?></span>
  </div>
  <div class="form-group">
     Gender:
     <input type="radio" name="gender" 
     <?php if (isset($gender) && $gender=="female") echo "checked";?>
     value="Female">Female
    <input type="radio" name="gender" 
    <?php if (isset($gender) && $gender=="male") echo "checked";?>
     value="male">Male <!--saame name so that w can assign gender a value ata a tumee-->
    <span class="error">*<?php echo $genderErr;?></span>
  </div>
  <br>
  <div class="form-group">
    Comment:<textarea name="comment" class="form-control" rows="2" cols="10"></textarea><br>
  </div>
  <input type="submit">
</form>

    </div>
    <div class="col-md-4"></div>
  </div>
</div>

</body>
</html>
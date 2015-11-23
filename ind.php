<?php
	session_start();
?>
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
 	<script type="text/javascript">
 		function validateForm() {
   		 var x = document.forms["myForm"]["year"].value;
    	 var z =x.length;
    	 if(!isNaN(z)){
    	 	alert("Year must conatain digit");
    	 	return false;
    	 }
}
 	</script>
</head>
<body>
	<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="#"><img src="images/logo.png" height="60px" style="padding:top:0px;padding:left:10px;width:100%;"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
                <li class="profile"><a href="#">
                	<h4>
                	<img src="images/profile.png" width="50px" height="50px">
                	<?php
						if (isset($_SESSION['username'])) {
						# code...
						echo $_SESSION["username"];
						}
					?>
					</h4>
                </a>
                </li>
                <li>
                	<a href="colist.php"><img src="images/course.png" width="50px" height="50px" style="margin-right:100px;"></a>
                </li>
                <li>
                	<a href="login.php"><img src="images/logout.png" width="50px" height="50px"></a>
                </li>
            </ul>
        </div>
    </div>
	</div>
<div class="bg">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 courseform">
				<h4><?php echo $_SESSION["course"]; ?></h4>
				<form role="form" method="post" name="myForm">
				  	<div class="form-group">
    			  		<label class="sr-only control-label" for="email">Year:</label>
    			  		<input type="text" class="form-control input-lg" name="year" placeholder="Enter Year here" minlength="4" size="20px" required>
  					</div>
  					<div class="form-group">
						<label for="sel1" class="sr-only">Select list:</label>
  						<select class="form-control input-lg" id="sel1" name="course">
    						<option value="computer">Computer Engineering</option>
    						<option value="electronics">Electronics Engineering</option>
    						<option value="electrical">Electrical Engineering</option>
    						<option value="civil">Civil Engineering</option>
    						<option value="mechanical">Mechanical Engineering</option>
  						</select>
					</div>
  					<button type="submit" class="btn btn-default btn-block btn-info">Add Course</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<?php
		//define varibles and set equal to post varibles;
		class Est{
			public $user="";
			public $year="";
			public $course="";
			public $count=0;
		}
		$p=new Est();
		if (isset($_SESSION["username"])) {
			# code...
			$p->user=$_SESSION["username"];
		}
		if (isset($_POST["year"])) {
			# code...
			$p->year=$_POST["year"];
		}
		else{
			echo "Select a year first";
		}
		if (isset($_POST["course"])) {
			# code...
			$p->course=$_POST["course"];
		}
		else {
			# code...
			echo "select a course";
		}
		//open count file for array
		$t=fopen("count.txt", "a+") or die("unable to open the file");
		$k=fread($t, filesize("count.txt"));
		echo $k;
		fclose($t);
		//write the complete data in json file
		$file=fopen("courses.json", "a+") or die("Unable to open the file");

		//decode and write in json fiie
		$json = json_decode(file_get_contents("courses.json"), true);
		if (empty($p->year) or empty($p->course)) {
			# code...
			$_SESSION["course"]="Please fill the fields properly";
		}
		//define variable d
		$d=0;
		$c=0;
		for ($i=1; $i <= $k; $i++) { 
			# code...
			if ($p->user==$json[$i]["username"]) {
				# code...
				if ($p->year== $json[$i]["year"]) {
					# code...
					$_SESSION["course"]="You have been already selected a course in this year";
					$c=$d=0;
					break;
				}
				else{
					# Enter the course in database
					$d=1;
				}
			}
			else{
					# Enter the course in database
					$d=1;
				}
		}
		
		//increament in k
		if ($d==1 or $c==1) {
			# code...
			$k=$k+1;
			$json[$k] = array("username" => $p->user, "year" => $p->year, "course" => $p->course);
			file_put_contents("courses.json", json_encode($json, JSON_PRETTY_PRINT));
			
		}
		fclose($file);
		//open again in w form
		
		$j=fopen("count.txt", "w+");
		fwrite($j, $k);
		fclose($j);
	?>
</div>
</body>
</html>
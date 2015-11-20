<?php
	session_start();
?>
<html>
<body>
	<?php
		echo "Hii";
		if (isset($_SESSION['username'])) {
			# code...
			echo $_SESSION["username"];
		}
	?>
	<br>
	<a href="login.php">Logout</a>
	<h2>Select course</h2>
	<form method="post">
		Year:<input type="text" name="year">
		<br>
		<select name="course">
			<option value="comps">Computer Engineering</option>
			<option value="ec">Electronics Engineering</option>
			<option value="eee">Electrical Engineering</option>
			<option value="civil">Civil Engineering</option>
			<option value="mech">Mechanical Engineering</option>
		</select>
		<input type="submit">
	</form>
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
			echo "Please fill the fields properly";
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
					echo "You have already selected a course in this year";
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
</body>
</html>
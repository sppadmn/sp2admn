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
		//write the complete data in json file
		$file=fopen("users.json", "a+") or die("Unable to open the file");

		//decode and write in json fiie
		$json = json_decode(file_get_contents("courses.json"), true);

		$json[$p->user] = array("username" => $p->user, "year" => $p->year, "course" => $p->course);
		file_put_contents("courses.json", json_encode($json, JSON_PRETTY_PRINT));
	?>
</body>
</html>
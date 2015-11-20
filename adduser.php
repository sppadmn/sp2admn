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
	<body>
		<form method="post" >
			Username:<input type="text" name="user"><br>
			Admission No.:<input type="text" name="admin"><br>
			Passwod:<input type="password" name="pass">
			<input type="submit">
		</form>

	</body>
</html>

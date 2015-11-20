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
</body>
</html>
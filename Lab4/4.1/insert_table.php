<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert Results</title>
</head>
<body>
	<?php
		require_once("database_info.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) die ("Cannot connect to $server using $user");
		$desc = $_POST['desc'];
		$weight = $_POST['weight'];
		$cost = $_POST['cost'];
		$num = $_POST['num'];
		$query = "insert into Products values (0, '$desc', $cost, $weight, $num)";
		echo $query;
		if (mysqli_query($conn, $query)) echo "Insert into perl_pgm_com was successful!"	
	?>
</body>
</html>
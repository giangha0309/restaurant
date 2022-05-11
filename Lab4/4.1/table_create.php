<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Table</title>
</head>
<body>
	<?php
		require_once("database_info.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) die ("Cannot connect to $server using $user");
		else {
			$SQLcmd = "CREATE TABLE $table_name(
					   ProductID INT UNSIGNED NOT NULL
					   AUTO_INCREMENT PRIMARY KEY,
					   Product_desc VARCHAR(50),
					   Cost INT,
					   Weight INT,
					   Numb INT)";
		}
		if (mysqli_query($conn, $SQLcmd)){
			print '<font size="4" color="blue" >Created Table';
			echo "<i>$table_name</i> in database<i>$sql_db</i><br></font>";
			echo "<br>SQLcmd=$SQLcmd";
			} 
		else {
			die ("Table Create Creation Failed SQLcmd=$SQLcmd");
			}
			mysqli_close($conn); 
	?>
</body>
</html>
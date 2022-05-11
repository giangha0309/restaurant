<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product Update Results</title>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="table_style.css">
	<h1>Update Results for Table Products</h1>
	<?php
		require_once("database_info.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) die ("Cannot connect to $server using $user");
		$productDesc = $_POST['saleProduct'];
		$query = "update Products set Numb = Numb - 1 where Product_desc = '$productDesc'";
		echo "<p>The query is $query</p>";
		$result = @mysqli_query($conn, $query);
		echo "<table>";
		echo "<tr><th>ProductID</th>"
				."<th>Product Description</th>"
				."<th>Cost</th>"
				."<th>Weight</th>"
				."<th>Number Available</th>"
				. "</tr>";
		$query2 = "select * from Products";
		$result = @mysqli_query($conn, $query2);
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['ProductID'];
			$desc = $row['Product_desc'];
			$cost = $row['Cost'];
			$weight = $row['Weight'];
			$num = $row['Numb'];
			echo "<tr>";
			echo "<td>$id</td>"
				 ."<td>$desc</td>"
				 ."<td>$cost</td>"
				 ."<td>$weight</td>"
				 ."<td>$num</td>";	
			}
	?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory Management</title>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="table_style.css">
	<h1>Select Product We Just Sold</h1>
	<?php
		require_once("database_info.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) die ("Cannot connect to $server using $user");
		echo "<table>";
		echo "<tr><th>ProductID</th>"
				."<th>Product Description</th>"
				."<th>Cost</th>"
				."<th>Weight</th>"
				."<th>Number Available</th>"
				."<th>"
				. "</tr>";
		$query = "select * from Products";
		$result = @mysqli_query($conn, $query);
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
				 ."<td>$num</td>"
				 ."<td>
					<form action='sale.php' method='post'>
					<input type='hidden' name='saleProduct' value=$desc>
					<input type='submit' value='Sold'>
					</form>
				  ";	
			}
	?>
</body>
</html>
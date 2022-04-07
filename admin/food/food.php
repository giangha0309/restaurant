<?php
	session_start();
	require_once("../../databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	session_destroy();
	if(!isset($_SESSION['login'])) header("Location: ../../authentication.php");
	if (isset($_SESSION['addFood'])) {
		echo "<script>alert('Thêm món ăn thành công')</script>";
		unset($_SESSION['login']);
	}
	if (isset($_GET['deleteFood'])) {
		$deleteFood = $_GET['deleteFood'];
		$query = "delete from food where food_id = '$deleteFood'";
		$result = mysqli_query($conn, $query);
		unset($_SESSION['deleteFood']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lý món ăn</title>
	<link rel="stylesheet" type="text/css" href="../../css/table.css">
</head>
<body>
	<h1>Quản lý món ăn</h1>
	<br><br><br>
	<form action="addFood.php" method="post">
		<input type="submit" name="addIdentifier" value="Thêm món ăn">
	</form>
	<br><br><br><br><br>

<?php
		$query = "select * from food";
		$result = mysqli_query($conn, $query);
		echo "<table>";
		echo "<tr><th>Món ăn</th>"
			."<th>Giá tiền</th>"
			."<th></th>"
			. "</tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			$food_id = $row['food_id'];
			$food_name = $row['food_name'];
			$price = $row['price'];
			echo "<tr>";
			echo "<td>" . $food_name . "</td>"
				."<td>" . $price     . " VND</td>";
			echo "<td>
					<form action='modifyFood.php'>
					<input type='hidden' name='modifyFood' value=$food_id>
					<input type='submit' value='Sửa'>
					</form>
				  ";	
			echo "
					<form action='food.php'>
					<input type='hidden' name='deleteFood' value=$food_id>
					<input type='submit' value='Xóa'>
					</form>
				  </td>";
			echo "</tr>";
		}
?>

</body>
</html>
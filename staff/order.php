<!-- Trang để gọi món cho bàn ăn đã chọn -->

<?php
	session_start();
	if(!isset($_SESSION['login'])) header("Location: ../authentication.php");
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gọi món</title>
	<link rel="stylesheet" href="../css/table.css">
</head>
<body>
	<h1>Gọi món cho bàn số
	<?php
		if (isset($_GET['emptytableId'])) {
			$_SESSION['tableId'] = $_GET['emptytableId'];
		}
		$tableId = $_SESSION['tableId'];
		echo "$tableId";
		?>
	</h1>
	<h2>Danh sách món ăn</h2>

	 <!-- Hiển thị các món từ food -->
	<?php
		require_once("../display.php");
		$query = "select * from food";
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_assoc($result)) displayFood($row['food_id'], $row['food_name'], $row['price']);
	?> 
	<h2>Danh sách gọi món</h2>

	<!-- Hiển thị các món từ food_ordering -->
	<?php
		$query = "select * from food_ordering";
		$result = mysqli_query($conn, $query);
		$totalPrice = 0;
		echo "<table>";
		echo "<tr><th>Món ăn</th>"
			."<th>Giá tiền</th>"
			. "</tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['food_name'] . "</td>";
			echo "<td>" . $row['price'] . "</td>";
			$totalPrice += $row['price'];
		}
		$_SESSION['totalPrice'] = $totalPrice;
		echo "</table>";
		echo "<h1>Tổng hóa đơn: $totalPrice VND</h1>";
	?>

	<form action="submitOrder.php">
		<input type="submit" name="submitOrder" value="Hoàn tất gọi món">
		<input type="submit" name="cancelOrder" value="Reset">
	</form>
</body>
</html>

<?php
/*
	if(isset($_GET['emptytableId'])) {
		$tableId = $_GET['emptytableId'];
		$query = "UPDATE restaurant_table
				  set status = 1
				  where table_id = $tableId";
		$result = mysqli_query($conn, $query);
		header("Location: staffOrder.php");
	}
*/
?>

<?php
	require_once("../databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	$query = "delete from food_ordering";
	$result = mysqli_query($conn, $query);
	if (isset($_GET['submitOrder'])) {
		session_start();
		$tableId = $_SESSION['tableId'];
		$totalPrice = $_SESSION['totalPrice'];
		$query = "UPDATE restaurant_table
				  set status = 1, total_price = $totalPrice
				  where table_id = $tableId";
		$result = mysqli_query($conn, $query);
		header("Location: staffHomePage.php");
	}
	else header("Location: order.php");
?>
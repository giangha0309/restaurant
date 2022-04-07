<?php
	require_once("../databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	if (isset($_GET['foodId'])) {
		$foodId = $_GET['foodId'];
		$query = "select * from food where food_id = $foodId";
		$result = mysqli_query($conn, $query);
		$result = mysqli_fetch_assoc($result);
		$foodName = $result['food_name']; $price = $result['price'];
		$query = "insert into food_ordering values($foodId, '$foodName', $price)";
		$result = mysqli_query($conn, $query);
		header("Location: order.php");
	}
?>

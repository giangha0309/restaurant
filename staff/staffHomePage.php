<?php
	session_start();
	if(!isset($_SESSION['login'])) header("Location: ../authentication.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang chủ nhân viên</title>
	<script type="text/javascript" src="js/order.js"></script>
</head>
<body>

	<h1>Trang chủ gọi món</h1>
	<?php
		require_once("../display.php");
		require_once("../databaseInfo.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		$query = "select * from restaurant_table";
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['status'] == 0) displayEmptyTable($row['table_id']);
			else if ($row['status'] == 1) displayEatingTable($row['table_id'], $row['total_price']);
		}
	?>

</body>

<footer>
	<a href="../logout.php">Đăng xuất</a>
</footer>
</html>
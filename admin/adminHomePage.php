<?php
	session_start();
	if(!isset($_SESSION['login'])) {
		header("Location: ../authentication.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang chủ admin</title>
</head>
<body>
	<h1>Trang chủ admin</h1>
	<br><br>
	<a href="identifier/identifier.php"><h3>Quản lý mã định danh</h3></a>
	<br>
	<a href="food/food.php"><h3>Quản lý món ăn</h3></a>
</body>

<footer>
	<a href="../logout.php">Đăng xuất</a>
</footer>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sửa thông tin món ăn</title>
</head>
<body>
	<h1> Sửa thông tin món ăn </h1>
	<br><br><br>
</body>
</html>

<?php
	session_start();
	if(!isset($_SESSION['login'])) header("Location: ../../authentication.php");
	require_once("../../databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	if(isset($_GET['modifyFoodSubmit'])) {
		header("Location: food.php");
	}
	if(isset($_GET['modifyFood'])) {
		$foodId = $_GET['modifyFood'];
		$query = "select * from food where food_id = $foodId";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$foodName = $row['food_name'];
		$price = $row['price'];
		echo "
		<form action=''>
			<fieldset id='fieldset'>
				<label for='foodId'><b>Nhập ID món ăn: </b></label>
				<input type='text' id='foodId' name='foodId' value='$foodId'>
				<br><br>
				<label for='foodName'><b>Nhập tên món ăn: </b></label>
				<input type='text' id='foodName' name='foodName' value='$foodName'>
				<br><br>
				<label for='price'><b>Nhập giá tiền: </b></label>
				<input type='text' id='price' name='price' value='$price'>
				<br><br>
				<input type='submit' name='modifyFoodSubmit' value='Sửa món'>
			</fieldset>";
	}
?>
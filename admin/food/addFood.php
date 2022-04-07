<?php
	session_start();
	if(!isset($_SESSION['login'])) header("Location: ../../authentication.php");
	require_once("../../databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	if (isset($_SESSION['addFoodFailed'])) {
		echo "<script>alert('Mã món ăn đã tồn tại !');</script>"; 
		unset($_SESSION['addFoodFailed']);
	if(isset($_GET['addFoodSubmit'])) {
		$foodId = $_GET['foodId'];
		$foodName = $_GET['foodName'];
		$price = $_GET['price'];
		$query = "select * from food where food_id = '$foodId'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['addFoodFailed'] = 1;
			header("Location: addFood.php");
		} 
		else {
			$_SESSION['addFood'] = 1;
			$query = "insert into food values ($foodId, '$foodName', $price)";
			$result = mysqli_query($conn, $query);
			header("Location: food.php");
		}
		unset($_SESSION['addFoodSubmit']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm món ăn</title>
</head>
<body>
	<h1>Thêm món ăn</h1>
	<form action="">
		<fieldset id="fieldset">
			<label for="foodId"><b>Nhập ID món ăn: </b></label>
			<input type="text" id="foodId" name="foodId">
			<br><br>
			<label for="foodName"><b>Nhập tên món ăn: </b></label>
			<input type="text" id="foodName" name="foodName">
			<br><br>
			<label for="price"><b>Nhập giá tiền: </b></label>
			<input type="text" id="price" name="price">
			<br><br>
			<input type="submit" name="addFoodSubmit" value="Thêm món">
		</fieldset>
	</form>
</body>
</html>

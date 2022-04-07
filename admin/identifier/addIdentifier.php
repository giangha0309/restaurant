<?php
	session_start();
	if(!isset($_SESSION['login'])) header("Location: ../../authentication.php");
	require_once("../../databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	if(isset($_GET['addIdentifierSubmit'])) {
		$identifier = $_GET['identifier'];
		if ($_GET['role'] == "staff") $role = 0;
			else $role = 1;
		$query = "select * from authentication where identifier = '$identifier'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			echo "<script>alert('Mã định danh đã tồn tại !')</script>";
			header("Location: addIdentifier.php");
		} 
		else {
			$_SESSION['addIdentifier'] = 1;
			$query = "insert into authentication values ('$identifier', $role)";
			$result = mysqli_query($conn, $query);
			header("Location: identifier.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm mã định danh</title>
</head>
<body>
	<h1>Thêm mã định danh</h1>
	<form action="">
		<fieldset id="fieldset">
			<label for="identifier"><b>Nhập mã định danh: </b></label>
			<input type="password" id="identifier" name="identifier">
			<p><b>Chọn vai trò</b>:
			<label for="staff">Nhân viên: </label>
			<input type="radio" id="staff" name="role" value="staff">
			<label for="admin">Admin: </label>
			<input type="radio" id="admin" name="role" value="admin">
			</p>
			<input type="submit" name="addIdentifierSubmit" value="Thêm mã">
		</fieldset>
	</form>
</body>
</html>

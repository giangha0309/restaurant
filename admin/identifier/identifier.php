<?php
	require_once("../../databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	session_start();
	if(!isset($_SESSION['login'])) header("Location: ../../authentication.php");
	if (isset($_SESSION['addIdentifier'])) {
		echo "<script>alert('Thêm mã thành công')</script>";
		unset($_SESSION['addIdentifier']);
	}
	if (isset($_GET['deleteIdentifier'])) {
		$deleteIdentifier = $_GET['deleteIdentifier'];
		$query = "delete from authentication where identifier = '$deleteIdentifier'";
		$result = mysqli_query($conn, $query);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lý mã định danh</title>
	<link rel="stylesheet" type="text/css" href="../../css/table.css">
</head>
<body>
	<h1>Quản lý mã định danh</h1>
	<br><br><br>
	<form action="addIdentifier.php" method="post">
		<input type="submit" name="addIdentifier" value="Thêm mã định danh">
	</form>
	<br><br><br><br><br>

<?php
		$query = "select * from authentication";
		$result = mysqli_query($conn, $query);
		echo "<table>";
		echo "<tr><th>Mã định danh</th>"
			."<th>Vai trò</th>"
			."<th></th>"
			. "</tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			$identifier = $row['identifier'];
			echo "<tr>";
			echo "<td>" . $identifier . "</td>";
			if ($row['role'] == 0) echo "<td> Nhân viên</td>";
			else echo "<td>Admin</td>";
			echo "<td>
					<form action='identifier.php'>
					<input type='hidden' name='deleteIdentifier' value=$identifier>
					<input type='submit' value='Xóa'>
					</form>
				  </td>";
			echo "</tr>";
		}
?>

</body>
</html>
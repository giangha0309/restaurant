<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng nhập</title>
</head>
<body>
	<h1>Đăng nhập hệ thống</h1>
	<form id="authenticationForm" action="checkAuthentication.php" method="post" >
		<div class="container"></div>
			<fieldset id="fieldset">
				<label for="identifier"><b>Nhập mã định danh: </b></label>
				<input type="password" id="identifier" name="identifier">
				<p><b>Chọn vai trò</b>:
				<label for="staff">Nhân viên: </label>
				<input type="radio" id="staff" name="role" value="staff">
				<label for="admin">Admin: </label>
				<input type="radio" id="admin" name="role" value="admin">
				</p>
				<input type="submit" id="submit" name="submit" value="Đăng nhập">
			</fieldset>
	</form>
	<?php
		session_start();
		if (isset($_SESSION['failed'])) echo "<script type='text/javascript'>alert('Đăng nhập không thành công');</script>";
		session_destroy();
	?>
</body>
</html>
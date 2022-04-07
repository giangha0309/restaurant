<?php
	session_start();
	require_once("databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	$identifier = $_POST['identifier'];
	if (isset($_POST['role'])) {
		if ($_POST['role'] == 'staff') $role = 0;
		else $role = 1;
		echo "<script type='text/javascript'>alert('$role');</script>";
	}

	$query = "select * from authentication where identifier = '$identifier' and role = '$role'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 1) {
		$_SESSION['login'] = 1;
		if ($role == 0) header("Location: staff/staffHomePage.php");
		else header("Location: admin/adminHomePage.php");
	}
	else {
		$_SESSION['failed'] = "1";
		header("Location: authentication.php");
	}
	mysqli_close($conn);
?>



<?php
	session_start();
	if(!isset($_SESSION['login'])) header("Location: ../authentication.php");
	require_once("../databaseInfo.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	if(isset($_GET['eatingtableId'])) {
		$tableId = $_GET['eatingtableId'];
		$query = "UPDATE restaurant_table
				  set status = 0, total_price = 0
				  where table_id = $tableId";
		$result = mysqli_query($conn, $query);
	}
	header("Location: staffHomePage.php");
?>
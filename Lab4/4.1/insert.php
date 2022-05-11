<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert Inventory</title>
</head>
<body>
	<form action="insert_table.php" method="post">
		<fieldset>
			<legend><b>Insert data</b></legend>
				<br>
				<label for="desc">Item Description</label>
				<input type="text" id="desc" name="desc">
				<br><br>
				<label for="weight">Weight</label>
				<input type="text" id="weight" name="weight">
				<br><br>
				<label for="cost">Cost</label>
				<input type="text" id="cost" name="cost">
				<br><br>
				<label for="num">Number Available</label>
				<input type="text" id="num" name="num">
				<br><br>
				<input type="submit" id="submit" name="submit" value="Click To Submit">
				<input type="reset" id="reset" name="reset" value="Reset">
		</fieldset>
	</form>
</body>
</html>
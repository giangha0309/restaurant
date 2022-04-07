<?php
	function displayEmptyTable($tableId) {
		$var = "
		<fieldset>
			<legend>Bàn $tableId</legend>
			<h2> Trạng thái bàn: Còn trống </h2>
			<form action='order.php'>
				<input type='hidden' name='emptytableId' value= '$tableId'>
				<input type='submit' value='Gọi món'>
			</form>
		</fieldset>
		<br>
		<br>
		<br>
		";
		echo $var;
	}

	function displayEatingTable($tableId,$totalPrice) {
		$var = "
		<fieldset>
			<legend>Bàn $tableId</legend>
			<h2> Trạng thái bàn: Đang ăn </h2>
			<h2> Tổng tiền: $totalPrice VND</h2>
			<form action='payment.php'>
				<input type='hidden' name='eatingtableId' value= '$tableId'>
				<input type='submit' id='paymentButton' name='paymentButton' value='Thanh toán'>
			</form>
		</fieldset>
		<br>
		<br>
		<br>
		";
		echo $var;
	}

	function displayFood($foodId, $foodName, $price) {
		$var = "
		<form action='addFood.php'>
		<p>$foodName : $price VND</p>
		<input type='hidden' name='foodId' value='$foodId'>
		<input type='submit' value='Thêm món'>
		</form>
		";
		echo $var;
	}
?>

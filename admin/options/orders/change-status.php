<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

	if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "UPDATE orders SET status = '" . $_POST["value"] . "' WHERE orders.id = " . $_POST["id"];
		mysqli_query($connect, $sql);
		
	}
?>
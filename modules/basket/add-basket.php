<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

	// получить товар по которому кликнул пользователь
	// создать массив и добавить в масив товаров
	// добавить массив в куки
	
	if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST"){
		var_dump ($_POST);
		$getSql = "SELECT * FROM products WHERE id=" . $_POST["id"];
		$result = $connect -> query($getSql);
		$product = mysqli_fetch_assoc($result);
	
		$productCookie = json_encode($product);
	
		setcookie("basket", $productCookie, time() + 60*60, "/");
		echo "товар добавлен";
	}

	
?>
<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/configs.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/modules/telegram/send-message.php";

	/*
	1. проверить есть ли пользователь с таким номером
	2. если нет то регистрируем пользователя
	3. добавляем заказ в базу данных с привязкой к пользователю
	*/

	// проверяем существует ли запрос, если да, добавляем в базу заказ
	if(isset($_POST["create"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
		
		$findUserSql = "SELECT * FROM users WHERE phone LIKE '" . $_POST["phone"] . "'";
		$user_id = 0;
		$findResult = mysqli_query($connect, $findUserSql);
		
		if(mysqli_num_rows($findResult) > 0){
			$user = mysqli_fetch_assoc($findResult);
			$user_id = $user["id"];
		}else{
			$regSql = "INSERT INTO users (login, phone) VALUES ('" . $_POST["user"] . "', '" . $_POST["phone"] . "')";
			if($connect -> query($regSql)){
				echo "user added";
				$user_id = 	$connect ->insert_id;
			}
		}

		$createOrderSql = "INSERT INTO orders (user_id, stuff, address, status) VALUES ('" . $user_id . "', '" . $_COOKIE["basket"] . "', '" . $_POST["address"] . "', 'Новый')";
		if(mysqli_query($connect, $createOrderSql)){
			// после добавления в базу данных, очищаем куку. и обновляем эту страницу
			message_to_telegram('New order!');
			setcookie("basket", "", 0, "/");
			header("Location: /pages/basket.php");
		}
		
	}
?>
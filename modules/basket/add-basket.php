<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

	// получить товар по которому кликнул пользователь
	// создать массив и добавить в масив товаров
	// добавить массив в куки

	// перебрать прошлый массив	
	// 	преобразовать джейсон с куки в массив
	// 	добавить новый елемент в массив
	// 	преобразовать массив в правильный джейсон
	// 	добавить в куки
	
	// существует ли пост запрос
	if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST"){
		// запрос в базу чтобы достать продукт
		$getSql = "SELECT * FROM products WHERE id=" . $_POST["id"];
		$result = $connect -> query($getSql);
		$product = mysqli_fetch_assoc($result);
		
		// существуют ли уже куки с товарами? да:
		if(isset($_COOKIE['basket'])){
			// декодируем наши куки в масив.
			$addToBasket = json_decode($_COOKIE['basket'], true);
			
			/*
			1. Пройтись по массиву товаров в корзине
			2. Проверить есть ли совпадение
			3. Если есть совпадение, увеличить количество товаров.
			*/
			$productIsFound = 0;
			for($i = 0; $i < count($addToBasket["basket"]); $i++){
				if($addToBasket["basket"][$i]["product_id"] == $product["id"]){
					$addToBasket["basket"][$i]["count"]++;
					$productIsFound = 1;
				}
			}

			if($productIsFound != 1){
				// обращаемся к массиву бакет и добавляем новый объект в конец масива
				$addToBasket["basket"][] = [
				"product_id" => $product["id"],
				"count" => 1
			];
			}
			

			// не существует куки:
		}else{
			// создаем массив с полем баскет и в его массив записываем объект
			$addToBasket = ["basket" => [[
				"product_id" => $product["id"],
				"count" => 1]
				]];
		}
		//преобразовуем масиив в обект джейсон, после того как мы добавили все в обычный массив
		$productCookie = json_encode($addToBasket); 
		// перед тем как создать куки мы удаляем старые куки
		setcookie("basket", "" , 0 , "/");
		// создаем куку с объектом типа джейсон который содержит 
		// в себе объект баскет у которого есть внутренний массив, в котором хранятся объекты. тоесть наши товары
		setcookie("basket", $productCookie, time() + 60*60, "/");
		
	}
?>
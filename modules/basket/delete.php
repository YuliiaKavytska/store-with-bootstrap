<?php
/*
	1. Добавить кнопку удаления товаров
	2. Пройтись по всему массиву товаров
	3. Удалить товар после проверки по айди
*/
	if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_COOKIE["basket"])){
			$basket = $_COOKIE["basket"];
			$basket = json_decode($_COOKIE["basket"], true);
			for($i = 0; $i < count($basket["basket"]); $i++){
				if($basket["basket"][$i]["product_id"] == $_POST["id"]){
					unset($basket["basket"][$i]);
					sort($basket["basket"]);
					
				}
			}
			$productCookie = json_encode($basket); 
			setcookie("basket", "" , 0 , "/");
			setcookie("basket", $productCookie, time() + 60*60, "/");
			
			if(count($basket["basket"]) == 0){
				setcookie("basket", "" , 0 , "/");
			}
		}
	}
?>
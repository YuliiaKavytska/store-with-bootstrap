<?php
	if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_COOKIE["basket"])){
			$basket = json_decode($_COOKIE["basket"], true);
			for($i = 0; $i < count($basket["basket"]); $i++){
				if($_POST["id"] == $basket["basket"][$i]["product_id"]){
					$basket["basket"][$i]["count"] = $_POST["quantity"];
				}
			}
			$basketCookie = json_encode($basket);
			setcookie("basket", "", 0, "/");
			setcookie("basket", $basketCookie, time() + 60*60, "/");
			if(count($basket["basket"]) == 0){
				setcookie("basket", "" , 0 , "/");
			}
		}
		echo "<pre>";
		var_dump($basket);
	}
?>
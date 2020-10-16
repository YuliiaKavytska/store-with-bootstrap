<?php
	include "../../../configs/db.php";

	if(isset($_POST["add-product"])){
		$addSql = "INSERT INTO products (title, description, content, category_id, image) VALUES ('" . 
		$_POST["cloth-name"] . "', '" . 
		$_POST["cloth-title"] . "', '" . 
		$_POST["cloth-description"] . "', '" . 
		$_POST["cloth-category"] . "', '" . 
		$_POST["cloth-img"] . "')";
		if(mysqli_query($connect, $addSql)){
			header("Location: /admin/products.php");
		}
	}
?>
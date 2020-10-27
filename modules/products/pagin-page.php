<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

	if($_GET["pagin"] * 6 <= $_GET["quantity"]){
		$num = 6;
	}else{
		$num = $_GET["quantity"] % 6;
	}
	$showNumberPaginPageSql = "SELECT * FROM products LIMIT " . $num . " OFFSET " . $_GET["pagin"] * 6;
	$productResult = $connect -> query($showNumberPaginPageSql);
	while($product = mysqli_fetch_assoc($productResult)){
		include $_SERVER['DOCUMENT_ROOT'] . "/parts/product-card.php";
	}
?>
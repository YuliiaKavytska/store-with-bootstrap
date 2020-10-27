<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

	$page = $_GET['page'];
	$offset = $page * 6;

	$productSql = "SELECT * FROM products LIMIT " . $_GET["number"] . " OFFSET " . $offset;
	$productResult = $connect -> query($productSql);
	while($product = mysqli_fetch_assoc($productResult)){
		include $_SERVER['DOCUMENT_ROOT'] . "/parts/product-card.php";
	}
?>
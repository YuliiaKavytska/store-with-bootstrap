<?php
	include "../../../configs/db.php";

	if(isset($_POST["edit-product"])){
		$updateSql = "UPDATE products SET title = '" . $_POST["cloth-name"] . 
		"', description = '" . $_POST["cloth-title"] . 
		"', content = '" . $_POST["cloth-description"] . 
		"', category_id = '" . $_POST["cloth-category"] . 
		"', image = '" . $_POST["cloth-img"] . 
		"' WHERE products.id = " . $_POST["cloth-id"];
		if(mysqli_query($connect, $updateSql)){
			header("Location: /admin/products.php");
		}
	}

?>
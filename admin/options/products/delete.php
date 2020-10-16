<?php

	include "../../../configs/db.php";

	if(isset($_GET["id"])){
		$deleteSql = "DELETE FROM products WHERE products.id =" . $_GET["id"];
		if(mysqli_query($connect, $deleteSql)){
			include "../../table-products.php";
		}
	}

?>
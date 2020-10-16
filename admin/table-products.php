<?php
	$sqlProducts = "SELECT * FROM products";
	$productsResult = $connect->query($sqlProducts);
	while($row = mysqli_fetch_assoc($productsResult)){
	?>
	<tr>
		<td><?php echo $row["id"] ?></td>
		<td><?php echo $row["title"] ?></td>
		<td><?php echo $row["description"] ?></td>
		<td><?php echo $row["content"] ?></td>
		<td><?php echo $row["category_id"] ?></td>
		<td>
		<div class="btn-group mr-2" role="group" aria-label="First group">
			<a href="options/products/edit.php?id=<?php echo $row["id"] ?>" type="button" class="btn btn-secondary">Edit</a>
			<div data-link="http://store.local/admin/options/products/delete.php?id=<?php echo $row["id"] ?>" onclick="deleteProduct(this)" id="delete-btn" type="button" class="btn btn-secondary">Delete</div>
		</div>
		</td>
		</tr>
		<?php
	}
?>
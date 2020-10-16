<?php
	$sqlProducts = "SELECT * FROM category";
	$productsResult = $connect->query($sqlProducts);
	while($row = mysqli_fetch_assoc($productsResult)){
	?>
	<tr>
		<td><?php echo $row["id"] ?></td>
		<td class="w-100"><?php echo $row["title"] ?></td>
		<td>
		<div class="btn-group mr-2" role="group" aria-label="First group">
			<a href="options/category/edit.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Edit</a>
			<div data-link="http://store.local/admin/options/category/delete.php?id=<?php echo $row["id"] ?>" onclick="deleteCategory(this)" id="delete-categ-btn" class="btn btn-danger">Delete</div>
		</div>
		</td>
		</tr>
	<?php
	}
?>
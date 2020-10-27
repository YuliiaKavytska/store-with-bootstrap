<div class="col-4 mb-3">
	<div class="card">
		<a href="product.php?id=<?php echo $product["id"]; ?>">
			<img src="img/1.jpg" class="card-img-top" alt="...">
		</a>
		<div class="card-body">
			<a href="product.php?id=<?php echo $product["id"]; ?>" class="text-decoration-none">
				<h5 class="card-title"><?php echo $product["title"]; ?></h5>
			</a>
			<p class="card-text"><?php echo $product["description"]; ?></p>
			<button class="btn btn-primary add-basket" data-id="<?php echo $product["id"] ?>">Add to the basket</button>
		</div>
	</div>
</div> <!-- col-4 -->
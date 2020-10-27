<?php
$page = "home";
include "configs/db.php";
include "parts/head.php";
?>

<div class="row" id="products-block">
	<?php
	$productSql = "SELECT * FROM products LIMIT 6";
	$productResult = $connect -> query($productSql);
	while($product = mysqli_fetch_assoc($productResult)){
		include $_SERVER['DOCUMENT_ROOT'] . "/parts/product-card.php";
	}
	$allProductsSql = "SELECT * FROM products";
	$resultAll = $connect -> query($allProductsSql);
	$quantity = mysqli_num_rows($resultAll);
	?>
	
</div>

<?php

	// 1. выводить на странице только 6 записей
	// 2. сделать клик по кнопке
	// 3. сделать запрос к базе данных на получение следующих 6 записей
	// 4. олучить следующие записи
	// 5. вывести записи на экран

	// выыести блок с корзиной в шапке сайта
	// сделать таблицу в базе данных для хранения заказов
	// сделать добавление товара в корзину
	// 	сделать клик по кнопке добавить в корзину
	// 	добавить товар в куки корзины
	// 	отобразить что товар добавился на корзине
	// сделать страницу корзины
	// сделать оформление заказа
	var_dump($_COOKIE);
?>
<div class="row mb-4 justify-content-center">
		<input type="hidden" name="number" id="number-page" value="1">
		<input type="hidden" name="quanitiy" value="<?php echo $quantity ?>">
		<button class="btn-primary btn-lg" id="show-more">Показать еще</button>
</div>
<div class="row mb-4 justify-content-center">
	<div class="btn-group " role="group" aria-label="Basic example">
		<?php
			$i = 1;
			if($quantity % 6 == 0){
				$num = $quantity / 6;
			}else{
				$num = $quantity / 6 +1;
			}
			while($i < $num){
				?>
				<button type="button" class="btn btn-primary" name="pagin-pages" data-link="/modules/products/pagin-page.php?pagin=<?php echo $i - 1 ?>&quantity=<?php echo $quantity ?>"><?php echo $i ?></button>
				<?php
				$i += 1;
			}
		?>
	</div>
</div>


<?php
include "parts/footer.php";
?>
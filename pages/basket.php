<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/parts/head.php";

?>

<h2 class="mb-4 text-center">Ваши заказы:</h2>

		<?php
		// заходим в корзину и проверяем существует ли наша куки
			if(isset($_COOKIE["basket"])){
				// превращаем нашу куку в обычный массив. вот массив например:

				// array(1) { ["basket"]=> array(12) { [0]=> string(1) "1" [1]=> string(1) "2" [2]=> string(2) "12" 
				// [3]=> string(2) "18" [4]=> string(2) "19" [5]=> string(1) "1" [6]=> string(1) "1" [7]=> string(1) "1" 
				// [8]=> string(1) "2" [9]=> string(1) "2" [10]=> string(2) "18" [11]=> string(2) "18" } }
				
				// єто наша кука
				// string(70) "{"basket":[{"product_id":"1","count":5},{"product_id":"2","count":1}]}"

				$basket = json_decode($_COOKIE["basket"], true);
				// это преобразованый с джейсон массив
				// array(1) { первый слой массива
				// ["basket"]=> это поле массива (ключ)
					// 	array(2) { второй слой массива
						// 	  [0]=> 1-е поле масива (ключ)
							// 	  array(2) { внутри хранится массив (это третий слой)
								// 		 ["product_id"]=> поле (ключ)
								// 		 string(1) "1" значение
								// 		 ["count"]=>
								// 		 int(5)
								// 	  }
						// 	  [1]=> 2-е поле массива
							// 	  array(2) { в этом втором поле хранится массив
								// 		 ["product_id"]=> поле (ключ)
								// 		 string(1) "2" значение
								// 		 ["count"]=>
								// 		 int(1)
							// 	  }
					// 	}
				//  }
					?>
					<table class="table">
						<thead class="table-success">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Title</th>
								<th scope="col">Quantity</th>
								<th scope="col">Sum</th>
								<th scope="col" class="text-center">Options</th>
							</tr>
						</thead>
						<tbody>
					<?php
					// создаем строку в которую будем записывать наш заказ.
					// $c = "";
					for ($i = 0; $i < count($basket["basket"]); $i++){
						// делаем запрос в базу даннх чтобы получить товар с айди который равен нашему ключу
						$findProductSql = "SELECT * FROM products WHERE id=" . $basket["basket"][$i]["product_id"];
						$findResult = $connect -> query($findProductSql);
						$product = mysqli_fetch_assoc($findResult);
						?>
						<tr>
							<th scope="row"><?php echo $i+1 ?></th>
							<td><?php echo $product["title"] ?></td>
							<td><input class="quantity" type="number" min="0" value="<?php echo $basket["basket"][$i]["count"] ?>" data-id="<?php echo $product['id'] ?>" data-price="<?php echo $product['price'] ?>"></td>
							<td class="grn"><?php echo $product['price'] * $basket["basket"][$i]["count"] ?></td>
							<td><button type="button" class="btn btn-danger w-100" onclick="deleteProductBasket(this, <?php echo $product['id'] . ', ' . $basket['basket'][$i]['count']; ?>)">Delete</button></td>
						</tr>
						<?php
						// записываю в строку наш заказ
						// $c = $c . $product["title"] . " " . $basket["basket"][$i]["count"] . " шт; ";
					}
				?>
					<tr>
						<th scope="row">Сумма</th>
						<td></td>
						<td id="quant-stuff">0</td>
						<td id="sum-price">0</td>
						<td></td>
						</tr>
					</tbody>
				</table>

				<!-- создаем отправку -->
				<h2 class="mb-4 text-center">Оформление заказа:</h2>

				<form method="POST" action="/modules/basket/order.php">
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Ваше ФИО:</label>
					<div class="col-sm-10">
						<input type="text" name="user" class="form-control" id="inputPassword">
						<!-- <input type="hidden" name="stuffs" value="<?php echo $c ?>"> -->
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Адрес новой почты:</label>
					<div class="col-sm-10">
						<input type="text" name="address" class="form-control" id="inputPassword">
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-sm-2 col-form-label">Ваш номер телефона:</label>
					<div class="col-sm-10">
						<input type="text" name="phone" class="form-control" id="phone">
					</div>
				</div>
				<button type="submit" name="create" class="btn btn-primary mb-2">Заказать</button>
				</form>
		<?php
			}else{
				// если куки не существует, пишем что корзна пуста
				?>
				<div class="alert alert-success" role="alert">
					Ваша корзина пуста
				</div>
			<?php
			}
		?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";
?>
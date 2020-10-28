<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/parts/head.php";

?>

<?php
	// проверяем существует ли запрос, если да, добавляем в базу заказ
	if(isset($_POST["create"])){
		$createOrderSql = "INSERT INTO orders (user_id, stuff, address) VALUES ('" . $_POST["id"] . "', '" . $_POST["stuffs"] . "', '" . $_POST["address"] . "')";
		mysqli_query($connect, $createOrderSql);
		// после добавления в базу данных, очищаем куку. и обновляем эту страницу
		setcookie("basket", "", 0, "/");
		header("Location: /pages/basket.php");
	}
?>
<h2 class="mb-4 text-center">Ваши заказы:</h2>

		<?php
		// заходим в корзину и проверяем существует ли наша куки
			if(isset($_COOKIE["basket"])){
				// превращаем нашу куку в обычный массив. вот массив например:

				// array(1) { ["basket"]=> array(12) { [0]=> string(1) "1" [1]=> string(1) "2" [2]=> string(2) "12" 
				// [3]=> string(2) "18" [4]=> string(2) "19" [5]=> string(1) "1" [6]=> string(1) "1" [7]=> string(1) "1" 
				// [8]=> string(1) "2" [9]=> string(1) "2" [10]=> string(2) "18" [11]=> string(2) "18" } }

				$basket = json_decode($_COOKIE["basket"], true);
				
					?>
					<table class="table">
						<thead class="table-success">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Title</th>
								<th scope="col">Quantity</th>
							</tr>
						</thead>
						<tbody>
					<?php
				
					// а теперь считает сколько раз встречаются все наши товары. получаем следующий массив с айди товара и его количеством. Наш массив:
					// array(5) { [1]=> int(4) [2]=> int(3) [12]=> int(1) [18]=> int(3) [19]=> int(1) }

					$arrayOfFrequency = array_count_values($basket["basket"]);
					
					// создаем переменную для нумерации
					$i = 1;
					// создаем строку в которую будем записывать наш заказ.
					$c = "";
					// делаем цикл, который пройдется по нашему массиву который определяет количетсов. этот цикл сделает столько повторений, какая длинна массива.
					// звучи так: для каждого эллемента в масиве, где ключ это кей, а значение это велью. 
					// Тоесть кей это наше айди, а ведью это количество раз
					foreach ($arrayOfFrequency as $key => $value){
						// делаем запрос в базу даннх чтобы получить товар с айди который равен нашему ключу
						$findProductSql = "SELECT * FROM products WHERE id=" . $key;
						$findResult = $connect -> query($findProductSql);
						$product = mysqli_fetch_assoc($findResult);
						?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td><?php echo $product["title"] ?></td>
							<td><?php echo $value ?></td>
						</tr>
						<?php

						// а это я пыталась создать два массива, атем совместить их и отправить в базу. 
						// но оно написало, что я пытаюсь преобразовать массив к строке. поэтому я спользую другой метод, 
						// но пусть этот будет сдесь чтобы я помнилакак это делается
						// $a[] = $product["title"];
						// $b[] = $value;
						// $c = array_combine($a, $b);

						// записываю в строку наш заказ
						$c = $c . $product["title"] . " " . $value . " шт; ";
						// увеличиваю счетчик айди
						$i += 1;
					}
				?>
					</tbody>
				</table>

				<!-- создаем отправку -->
				<h2 class="mb-4 text-center">Оформление заказа:</h2>

				<form method="POST">
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Ваше ФИО (айди):</label>
					<div class="col-sm-10">
						<input type="text" name="id" readonly class="form-control-plaintext" id="staticEmail" value="1">
						<input type="hidden" name="stuffs" value="<?php echo $c ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Адрес новой почты:</label>
					<div class="col-sm-10">
						<input type="text" name="address" class="form-control" id="inputPassword">
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
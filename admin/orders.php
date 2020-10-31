<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "orders";
?>

<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/head.php";
	$sql = "SELECT * FROM orders";
	$result = mysqli_query($connect , $sql);
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
	 	<a href="/admin">Home</a>
	 </li>
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
  </ol>
</nav>

<?php
	$i = mysqli_num_rows($result);
	while($i > 0){
		$order = mysqli_fetch_assoc($result);
		$userSql = "SELECT * FROM users WHERE id=" . $order["user_id"];
		$userResult = mysqli_query($connect, $userSql);
		$user = mysqli_fetch_assoc($userResult);
		$j = 0;
		$c = "";
		$sum = 0;
		$orderThings = json_decode($order["stuff"], true);
		while($j < count($orderThings["basket"])){
			$findProductSql = "SELECT * FROM products WHERE id=" . $orderThings["basket"][$i - 1]["product_id"];
			$findProductResult = mysqli_query($connect, $findProductSql);
			$productFind = mysqli_fetch_assoc($findProductResult);
			$c = $c . $productFind["title"] . " " . $orderThings["basket"][$i - 1]["count"] . " шт.";
			$sum += $productFind["price"] * $orderThings["basket"][$i - 1]["count"];
			$j++;
		}
		$c = $c . ". Общая сумма заказа: " . $sum . "грн.";
		?>
		<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order № <?php echo $order["id"] ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/admin/options/products/edit.php" id="edit-product-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>User name</label>
                                 <input type="text" class="form-control" disabled value="<?php echo $user["login"] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ordered stuff</label>
                                 <input type="text" class="form-control" disabled value="<?php echo $c ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ordered time</label>
                                 <input type="text" class="form-control" disabled value="<?php echo $order["created"] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                 <input type="text" class="form-control" disabled value="<?php echo $order["address"] ?>">
                            </div>
                        </div>
                    </div>
						  <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>STATUS</label>
											<select name="cloth-category" data-id="<?php echo $order["id"] ?>" class="form-control status-change" id="exampleFormControlSelect1">
                                    <option value="<?php echo $order["status"] ?>"><?php echo $order["status"] ?></option>
												<?php
												if($order["status"] == "Новый"){
													?>
													<option value="Отправлено клиенту">Отправлено клиенту</option>
													<?php
												}else{
													?>
													<option value="Новый">Новый</option>
													<?php
												}
												?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
	$i--;
	}

?>
<!--  My script    -->

<script src="/admin/assets/js/script.js"></script>
<?php
    include "parts/footer.php";
?>
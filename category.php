<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/parts/head.php";
$categorySql = "SELECT * FROM category WHERE id=" . $_GET["id"];
$categoryResult = $connect -> query($categorySql);
$category = mysqli_fetch_assoc($categoryResult);
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
	 	<a href="/">Home</a>
	 </li>
    <li class="breadcrumb-item active" aria-current="page">
	 <?php echo $category["title"] ?>
	 </li>
  </ol>
</nav>

<div class="row">
	<?php
	$productSql = "SELECT * FROM products WHERE category_id=" . $_GET["id"];
	$productResult = $connect -> query($productSql);
	$i = 0;
	while($product = mysqli_fetch_assoc($productResult)){
		$i = 1;
		include "parts/product-card.php";
	}
	?>
</div>
<?php
if($i == 0){
		echo "<h3 class='text-center mt-4 text-danger'>Нет в наличии.</h3>";
	}
	?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";
?>
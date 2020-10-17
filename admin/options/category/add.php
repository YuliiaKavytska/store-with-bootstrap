<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "catigories";

include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/head.php";

if(isset($_POST["add-category"])){
    $addSql = "INSERT INTO category (title) VALUES ('" . 
    $_POST["category-name"]  . "')";
    if(mysqli_query($connect, $addSql)){
        header("Location: /admin/category.php");
    }
}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
	 	<a href="/">Home</a>
	 </li>
    <li class="breadcrumb-item">
	 	<a href='/admin/category.php'>Category</a>
	 </li>
    <li class="breadcrumb-item active" aria-current="page">Add category</li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add new category</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/admin/options/category/add.php" id="add-category-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name of category</label>
                                <input type="text" class="form-control mr-2" name="category-name" placeholder="Category name">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="add-category" class="btn btn-info btn-fill pull-right">Add to Data Base</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div> 

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php";
?>
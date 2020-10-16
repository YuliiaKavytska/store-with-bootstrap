<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "add";
?>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/head.php";
?>


<?php 
if(isset($_GET)){
        $findSql = "SELECT * FROM products WHERE id = " . $_GET["id"];
        $findResult = mysqli_query($connect, $findSql);
        $product = mysqli_fetch_assoc($findResult);
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit clothe</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/admin/options/products/edit-product.php" id="edit-product-form">
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Name of thing</label>
                                <input type="text" class="form-control" name="cloth-name" value="<?php echo $product["title"]?>" placeholder="T-shirt">
                                <input type="hidden" name="cloth-id" value="<?php echo $product["id"]?>">
                            </div>
                        </div>
                        <div class="col-md-2 px-1">
                            <div class="form-group">
                                <label>Category of product</label>
                                <input type="text" class="form-control" value="<?php echo $product["category_id"]?>" name="cloth-category" placeholder="1">
                            </div>
                        </div>
                        <div class="col-md-5 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Src to image</label>
                                <input type="text" class="form-control" name="cloth-img" value="<?php echo $product["image"]?>" placeholder="/img/2.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title under cloth</label>
                                <textarea rows="4" cols="80" class="form-control" name="cloth-title" placeholder="Here can be a title"><?php echo $product["description"]?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description of cloth</label>
                                <textarea rows="4" cols="80" class="form-control" name="cloth-description" placeholder="Here can be a description"><?php echo $product["content"]?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="edit-product" class="btn btn-info btn-fill pull-right">Edit</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
    include "../../parts/footer.php";
?>
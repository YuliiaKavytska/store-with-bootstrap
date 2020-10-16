<?php 
    include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
    $page = "catigories";

    include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/head.php";

    if(isset($_GET)){
        $findSql = "SELECT * FROM category WHERE id = " . $_GET["id"];
        $findResult = mysqli_query($connect, $findSql);
        $category = mysqli_fetch_assoc($findResult);
    }
    if(isset($_POST["edit-category"])){
        $updateSql = "UPDATE category SET title = '" . $_POST["category-name"] . 
        "' WHERE category.id = " . $_POST["category-id"];
        if(mysqli_query($connect, $updateSql)){
            header("Location: /admin/category.php");
        }
    }
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit category</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/admin/options/category/edit.php" id="add-category-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name of category</label>
                                <input type="text" class="form-control mr-2" name="category-name" placeholder="Category name" value="<?php echo $category["title"]?>">
								<input type="hidden" name="category-id" value="<?php echo $category["id"]?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="edit-category" class="btn btn-info btn-fill pull-right">Add to Data Base</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div> 

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php";
?>
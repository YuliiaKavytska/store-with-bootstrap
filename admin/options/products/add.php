<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$page = "add";
?>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/head.php";
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add one new clothe</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/admin/options/products/add-product.php" id="add-product-form">
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Name of thing</label>
                                <input type="text" class="form-control" name="cloth-name" placeholder="T-shirt">
                            </div>
                        </div>
                        <div class="col-md-2 px-1">
                            <div class="form-group">
                                <label>Category of product</label>
                                <!-- <input type="text" class="form-control" name="cloth-category" placeholder="1"> -->
                                <select name="cloth-category" class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Src to image</label>
                                <input type="text" class="form-control" name="cloth-img" placeholder="/img/2.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title under cloth</label>
                                <textarea rows="4" cols="80" class="form-control" name="cloth-title" placeholder="Here can be a title"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description of cloth</label>
                                <textarea rows="4" cols="80" class="form-control" name="cloth-description" placeholder="Here can be a description"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="add-product" class="btn btn-info btn-fill pull-right">Add to Data Base</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div> 

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php";
?>
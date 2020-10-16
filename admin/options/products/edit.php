<?php 
include "../../../configs/db.php";
$page = "add";
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/admin" class="simple-text">
                        Our shop
                    </a>
					 </div>
					 <?php
					 	include "../../parts/nav.php";
					 ?>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Home </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
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
                                    <h4 class="card-title">Add one new clothe</h4>
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
                                        <button type="submit" name="edit-product" class="btn btn-info btn-fill pull-right">Add to Data Base</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
						  </div>
						  
            </div>
            
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in ../../assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>

</html>

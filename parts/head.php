<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/assets/style/style.css">
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<title>Store</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Cloth Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($page == "home"){ echo "active"; }?>">
        <a class="nav-link" href="/">Home </a>
      </li>
      <li class="nav-item <?php if($page == "about"){ echo "active"; }?>">
        <a class="nav-link" href="/pages/about.php">About</a>
      </li>
      <li class="nav-item <?php if($page == "contacts"){ echo "active"; }?>">
        <a class="nav-link" href="/pages/contacts.php">Contacts</a>
      </li>
      <li class="nav-item <?php if($page == "reg"){ echo "active"; }?>">
        <a class="nav-link" href="/registration.php">Registration</a>
      </li>
      <li class="nav-item <?php if($page == "log"){ echo "active"; }?>">
        <a class="nav-link" href="/log-in.php">Log In</a>
      </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
	 
	<div class="my-lg-0 ml-4">
	<a class="nav-link btn btn-success" href="/pages/basket.php">Go to the basket</a>
	</div>
	<div class="my-lg-0 ml-4">
		<a class="no-text-decoration grey-link" href="/pages/basket.php">
			<img src="/img/basket.png" class=" ml-3" alt="..." style="width:32px;">
			<?php
			$quant = 0;
			if(isset($_COOKIE['basket'])){
				// создаем обект типа джейсон который хранит в себемассив, с плем количество для того чтобы считать сколько товаров добавлено в корзину с помощью джс
				$basket = json_decode($_COOKIE["basket"], true);
				$quant = 0;
				for($i = 0; $i < count($basket["basket"]); $i++){
					$quant += $basket["basket"][$i]["count"];
				}
			}
			?>
			<div class="cart-item">
			<span class="display-6">Basket - </span><span id="count-basket"><?php echo $quant; ?></span>
		</div>
		</a>
	</div>

  </div>
</nav>

<div class="container-fluid pt-3">
	<div class="row">
		<div class="col-3">
		<?php
			include $_SERVER['DOCUMENT_ROOT'] . "/parts/category-nav.php";
		?>
		</div> <!-- col-3 -->
		<div class="col-9">
			<div class="container">
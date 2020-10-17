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
  <a class="navbar-brand" href="#">Cloth Store</a>
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
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
	 
	<div class="my-lg-0 ml-4">
		<a class="no-text-decoration grey-link" href="#">
			<img src="/img/basket.png" class=" ml-1" alt="..." style="width:32px;">
			<div class="cart-item">
				<span class="display-6">Basket</span>
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
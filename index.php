<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<title>Store</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Apple Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Price</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacts</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
	 
	<div class="my-lg-0 ml-4">
	<a class="no-text-decoreation grey-link" href="#"></a>
	<img src="img/basket.png" class=" ml-1" alt="..." style="width:32px;">
	<div class="cart-item">
		<span class="display-6">Basket</span>
	</div>
	</div>

  </div>
</nav>

<div class="container-fluid pt-3">
	<div class="row">
		<div class="col-3">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a class="nav-link active" href="#">All</a>
				<a class="nav-link" href="#">Trousers</a>
				<a class="nav-link" href="#">T-shirt</a>
				<a class="nav-link" href="#">Gloves</a>
			</div>
		</div> <!-- col-3 -->
		<div class="col-9">
			<div class="container">
				<div class="row">

					<div class="col-4 mb-3">
						<div class="card">
							<img src="img/1.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div> <!-- col-4 -->
					<div class="col-4 mb-3">
						<div class="card">
							<img src="img/2.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div> <!-- col-4 -->
					<div class="col-4 mb-3">
						<div class="card">
							<img src="img/3.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div> <!-- col-4 -->
					<div class="col-4 mb-3">
						<div class="card">
							<img src="img/4.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div> <!-- col-4 -->
					<div class="col-4 mb-3">
						<div class="card">
							<img src="img/5.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div> <!-- col-4 -->
					<div class="col-4 mb-3">
						<div class="card">
							<img src="img/6.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div> <!-- col-4 -->
				</div>
			</div>
		</div> <!-- col-9 -->
	</div> <!-- row -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/script.js"></script>
</body>
</html>
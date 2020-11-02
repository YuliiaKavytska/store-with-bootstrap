<?php

	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	$page = "log";
	if(isset($_GET["u_code"])){
		$changeSql = "SELECT * FROM users WHERE confirm_mail='" . $_GET["u_code"] . "'";
		$changeResult = mysqli_query($connect, $changeSql);
		if($changeResult->num_rows > 0){
			$user = mysqli_fetch_assoc($changeResult);
			$updateSql = "UPDATE users SET verifided = '1' WHERE `users`.`id` = " . $user["id"];
			if($connect->query($updateSql)){
				?>
				<div class="container">
					<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
						<strong>You just have been verifided!</strong> Log In.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<?php
			}
		}
	}

	if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST"){
		$password = md5($_POST["password"]);
		$logIn = "SELECT * FROM users WHERE email LIKE '" . $_POST["email"] . "' AND password LIKE '$password'";
		$result = $connect->query($logIn);
		if($result->num_rows > 0){
			$user = mysqli_fetch_assoc($result);
			if($user["verifided"] == 0){
			?>
			<div class="container">
				<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
					<strong>Unfortunately,</strong> Your account haven't been verify. Please, check your mail or <a href="/get-verify.php" class="font-italic alert-success"><strong> get a new one confirming link.</strong></a>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php
			}else{
				header("Location: /");
			}
		}else{
			?>
			<div class="container">
				<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
					An account haven't been found.<a href="/get-verify.php" class="font-italic alert-success"><strong> You can create your own one here.</strong></a>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php
		}
	}

	function createRandomString($lenght = 10){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charectersLenght = strlen($characters);
		$randomString = "";
		for($i = 0; $i < $lenght; $i++){
			$randomString .=$characters[rand(0, $charectersLenght - 1)];
		}
		return $randomString;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/assets/style/style.css">
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<title>Store</title>
</head>
<body class="bg-info">

<div class="container">
	<div class="card mt-5">
		<h5 class="card-header text-center">Log In</h5>
		<div class="card-body">
			<form method="POST" >
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="email@example.com">
					<small id="emailHelp" class="form-text text-muted">Fill in the email's field</small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
					<small id="emailHelp" class="form-text text-muted">Fill in the passwords's field.</small>
				</div>
				<button type="submit" class="btn btn-primary">Log In</button>
			</form>
		</div>
		<div class="card-footer">
			<small class="text-muted"><a href="/registration.php">I don't have an account.</a></small>
    	</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/script.js"></script>
</body>
</html>
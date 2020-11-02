<?php
	/*
	1. Сделать форму регистрации
	2. Сделать отправку формы
	3. Сделать отправку письма на подтверждение регистрации
	4. Сделать страницу с подтверждением регистрации
	*/
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	$page = "reg";

	if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST"){
		$password = md5($_POST["password"]);
		$u_code = createRandomString(20);
		$setSql = "INSERT INTO users(login, email, password, confirm_mail, verifided) VALUES ('" . $_POST["username"] . "', '" . $_POST["email"] . "', '" . $password . "', '$u_code', '0')";
		
		if($connect ->query($setSql)){?>
			<div class="container">
				<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
					<strong>Hurray!</strong> You just have been registrated. Now check your email to confirm your registration.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php
			$link = "<a href='http://store.local/log-in.php?u_code=$u_code'>Confirm your registration.</a>";
			mail($_POST["email"], 'Confirming', $link);
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
		<h5 class="card-header text-center">Registration</h5>
		<div class="card-body">
			<form method="POST" >
				<div class="form-group">
				<label for="exampleInputEmail">Your username</label>
				<div class="input-group mb-2 mr-sm-2">
					<div class="input-group-prepend">
						<div class="input-group-text">@</div>
					</div>
					<input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="username" placeholder="Username">
				</div>
				<small id="emailHelp" class="form-text text-muted">Create the most unique nickname.</small>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="email@example.com">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
					<small id="emailHelp" class="form-text text-muted">Your password will be high protect.</small>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="card-footer">
			<small class="text-muted"><a href="/log-in.php">I already have an account.</a></small>
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
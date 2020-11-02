<?php

	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	$page = "log";

	if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST"){
		$u_code = createRandomString(20);
		$sql = "SELECT * FROM users WHERE email LIKE '" . $_POST["email"] . "'";
		$result = $connect->query($sql);
		if($result->num_rows > 0){
			$userConfirm = mysqli_fetch_assoc($result);
			$link = "<a href='http://store.local/log-in.php?u_code=" . $userConfirm["confirm_mail"] . "'>Confirm your registration.</a>";
			mail($_POST["email"], 'Confirming', $link);
			header("Location: /log-in.php");
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
		<h5 class="card-header text-center">Send confim mail again.</h5>
		<div class="card-body">
			<form method="POST" >
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="email@example.com">
					<small id="emailHelp" class="form-text text-muted">Fill in the email's field</small>
				</div>
				<button type="submit" class="btn btn-primary">Send mail</button>
			</form>
		</div>
		<div class="card-footer">
			<small class="text-muted"><a href="/log-in.php">Back to log-in.</a></small>
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
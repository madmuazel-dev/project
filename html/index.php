
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<title>МЧС</title>
</head>
<body>

<div class="mainform">
	<form method="POST">
		<img id ="i" src="image/mchs.png" width ="80px">
		<h3>Авторизация</h3></br>
		<div class="form-cont">
 		<div class="mb-3">
   			<input type="text" class="form-control" name="username" placeholder="Введите логин">
 		</div>
 		<div class="mb-3">
   			<input type="password" class="form-control" name="password" placeholder="Введите пароль">
		</div>
 		</div>
 		<div class="btn-cont">
 		<p id="btn"><button type="submit" name="button_id" class="btn btn-primary">Войти</button></p>
 		</div>
	</form>
	<?php
require_once 'php_scripts/connect.php';

$result = mysqli_query($link, "SELECT * FROM users;");

    if(isset( $_POST['button_id']))
    {

        $log = $_POST['username'];
        $pass = $_POST['password'];

        while ($row = mysqli_fetch_row($result)) {
		if ($row[1] == $log && $row[2] == $pass){
			$check = 1;
			header('Location: main.html');
		}
	}
	if ($check == 1) {
		header('Location: main.html');
	}
	else{
		echo "<p style='color: red;'>Неверный логин или пароль</p>";
	}
    }


?>
</div>

</body>
</html>

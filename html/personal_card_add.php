<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/style_personal_card_add.css">
</head>
<body>
<?php
if (isset($_GET['func'])) {
     
    $surname = $_POST["surname"];
	$name = $_POST["name"];
	$secname = $_POST["secname"];
	$birthday = $_POST["birthday"];
	$sex = $_POST["sex"];
    try {
        $conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');
        $sql = "INSERT INTO personal (surname, name, secname, birthday, sex) VALUES ('$username', '$name', '$secname', '$birthday', '$sex')";
        $affectedRowsNumber = $conn->exec($sql);
        if($affectedRowsNumber > 0 ){
            echo "Data successfully added: name=$username  name= $name";  
        }
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>

<div class="conteiner">
	<div class="head">
		<h2>Добавить нового военнослужащего</h2>
	</div>
	<div class="content">
		<form method="post">
		<table class="table">
			<tr class="info"><td colspan="10"><h3>Основная информация</h3></td></tr>
			<tr>
				<td>Фамилия</td>
				<td><input type="text" name="surname"></td>
				<td>Имя</td>
				<td><input type="text" name="name"></td>
				<td>Отчество</td>
				<td><input type="text" name="secname"></td>
			</tr>
			<tr>
				<td>Дата рождения</td>
				<td><input type="date" name="birthday"></td>

				<td>Пол</td>
				<td><input type="text" name="sex"></td>

				<td>Снилс</td>
				<td><input type="" name=""></td>
			</tr>
			<tr>
				<td>Телефон 1</td>
				<td><input type="" name=""></td>
				<td>Телефон 2</td>
				<td><input type="" name=""></td>
			</tr>
			<tr class="info"><td colspan="10"><h3>Принадлежность</h3></td></tr>
			<tr>
				<td>Подразделение</td>
				<td><input type="text" name="departament"></td>
				<td>Рота</td>
				<td><input type="text" name="rota"></td>
				<td>Взвод</td>
				<td><input type="text" name="vzvod"></td>
				<td>Отделение</td>
				<td><input type="text" name="otdel"></td>
			</tr>
			<tr class="info"><td colspan="10"><h3>Звание</h3></td></tr>
			<tr>
				<td>Звание</td>
				<td><input type="text" name="rank"></td>
				<td>Дата присвоения</td>
				<td><input type="date" name="date"></td>
				<td>№ Приказа</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr class="info"><td colspan="10"><h3>Должность</h3></td></tr>
			<tr>
				<td>Должность</td>
				<td><input type="text" name=""></td>
				<td>Дата назначения</td>
				<td><input type="date" name=""></td>
				<td>№ Приказа</td>
				<td><input type="text" name=""></td>
			</tr>
			<tr class="info"><td colspan="10"><h3>Паспорт</h3></td></tr>
			<tr>
				<td>Серия</td>
				<td><input type="text" name=""></td>
				<td>Номер</td>
				<td><input type="text" name=""></td>
				<td>Ксерокопия</td>
				<td><input type="text" name=""></td>
			</tr>
			<tr class="info"><td colspan="10"><h3>водительское удостоверение</h3></td></tr>
			<tr>
				<td>Номер</td>
				<td><input type="text" name=""></td>
				<td>Действителен с</td>
				<td><input type="date" name=""></td>
				<td>Действителен по</td>
				<td><input type="date" name=""></td>
				<td>Категории</td>
				<td><input type="text" name=""></td>
				<td>Ксерокопии</td>
				<td><input type="text" name=""></td>
			</tr>
			<tr class="info"><td colspan="10"><h3>Военный билет</h3></td></tr>
			<tr>
				<td>Номер</td>
				<td><input type="text" name=""></td>
				<td>Ксерокопия</td>
				<td><input type="text" name=""></td>
			</tr>
			<tr class="info"><td colspan="10"><h3>Образование</h3></td></tr>
			<tr>
				<td>Специальность</td>
				<td><input type="text" name=""></td>
				<td>Учереждение</td>
				<td><input type="text" name=""></td>
				<td>Год окончания</td>
				<td><input type="text" name=""></td>
				<td>Ксерокопия</td>
				<td><input type="text" name=""></td>
			</tr>
		</table>
		<input id="sub" type="submit" name="func" value="Добавить">
		</form>
		<a href="info.php">Назад</a>
	</div>
</div>
</body>
</html>
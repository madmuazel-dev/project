<?php
$dep = $_POST['departament'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');
$sql = "SELECT
	r.id_personal,
	r.rank,
	p.surname,
	p.name,
	p.secname
	FROM
	    personal p
	INNER JOIN
	    rank r ON p.id_personal = r.id_personal
	INNER JOIN
	    inn i ON p.id_personal = i.id_personal
	WHERE i.pr2 = '$dep' AND p.surname != '' AND p.surname != 'ВАКАНТ' ORDER BY `p`.`surname` ASC";

	$result = $conn->query($sql);

	echo "<thead>
			<tr>
				<td><strong>Звание</strong></td>
				<td><strong>Фамилия</strong></td>
				<td><strong>Имя</strong></td>
				<td><strong>Отчество</strong></td>
				<td><strong>На лицо/отсутствует</strong></td>
			</tr>
			</thead>";

	echo "<tbody>";
	$i=1;
	while($row = $result->fetch()){

		echo "<tr class='selector'>
		<td>" . $row["rank"] . "</td><td>" . $row["surname"] . "</td><td>" . $row["name"] . "</td><td>" . $row["secname"] . "</td><td><select id='$i' name='$row[0]'><option value='на лицо'>На лицо</option><option value='отпуск'>Отпуск</option><option value='командировка'>Командировка</option><option value='госпиталь'>Госпиталь</option><option value='сан'>С/ч</option><option value='наряд'>Наряд</option><option value='увольнение'>Увольнение</option><option value='другие'>Другие причины</option></td>
		</tr>";
		$i++;
	}

	echo "</tbody>";

?>


<?php
$dep = $_POST['departament'];
$deps = join("', '",$dep);

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');
$sql = "SELECT
	i.departament,
	p.surname,
	p.name,
	p.secname,
	r.rank,
	du.start,
	du.end,
	i.id_personal,
	du.days
	FROM
	    inn i
	INNER JOIN
	    personal p ON i.id_personal = p.id_personal
	INNER JOIN
	    rank r ON r.id_personal = p.id_personal
	INNER JOIN
	    duty du ON du.id_personal = p.id_personal
	WHERE i.departament IN ('$deps')";

	$result = $conn->query($sql);

	echo "<thead>
			<tr>
				<td><strong>Звание</strong></td>
				<td><strong>ФИО</strong></td>
				<td><strong>Подразделение</strong></td>
				<td><strong>Начало</strong></td>
				<td><strong>Конец</strong></td>
				<td colspan='3'><strong>Всего дней</strong></td>
			</tr>
			</thead>";

	echo "<tbody>";

	while($row = $result->fetch()){

		echo "<tr>
		<td>$row[4]</td><td>$row[1]</td><td>$row[0]</td><td>$row[5]</td><td>$row[6]</td><td>$row[8]</td>
		<td style='width: 3%;'><button onclick='editDuty($row[7])' style='cursor:pointer;'><img style='width: 24px;' src='image/edit.png'></button></td>
		<td style='width: 3%;'><button onclick='deleteDuty($row[7])' style='cursor:pointer;'><img style='width: 24px;' src='image/delete.png'></button></td>
		</tr>";
	}

	echo "</tbody>";

?>
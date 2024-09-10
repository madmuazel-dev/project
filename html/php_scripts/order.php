<?php
$dep = $_POST['departament'];
$rank = $_POST['rank'];

$deps = join("', '",$dep);
$ranks = join("', '",$rank);
$id = $_POST['id'];
$type = $_POST['type'];
$arrow = $_POST['arrow'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT p.id_personal, p.surname, p.name, p.secname, r.rank, i.pr2, i.pr3, i.pr4, i.pr5, w.work
FROM personal p, inn i, rank r, works w
WHERE p.id_personal = i.id_personal AND p.id_personal = r.id_personal AND p.id_personal = w.id_personal AND i.pr2 IN ('$deps') AND r.rank IN ('$ranks')
		ORDER BY `$id` $type";

$result = $conn->query($sql);
echo($id);
echo '<tr class="table_row_head">
<td style="font-size:12px; width:5%;"><b>№</b></td>
<td class="item" style="font-size:12px width:13%;" id="surname"><b>Фамилия</b></td>
<td class="item" style="font-size:12px width:13%;" id="name"><b>Имя</b></td>
<td class="item" style="font-size:12px width:13%;" id="secname"><b>Отчество</b></td>
<td class="item" style="font-size:12px width:16%;" id="rank"><b>Звание</b></td>
<td class="item" style="font-size:12px width:25%;" id="rank"><b>Должность</b></td>
<td class="item" style="font-size:12px width:10%;" id="pr2"><b>Подразделение1</b></td>
<td class="item" style="font-size:12px width:10%;" id="pr3"><b>Подразделение2</b></td>
<td class="item" style="font-size:12px width:10%;" id="pr4"><b>Подразделение3</b></td>
<td class="item" style="font-size:12px width:10%;" id="pr5"><b>Подразделение4</b></td>
</tr>';
$i = 1;
while($row = $result->fetch()){
	
	echo '<tr class="table_row">';
	echo '<td style="width:50px;">' . $i . "</td>";
	echo '<td class="item" id="'.$row["id_personal"].'">' . $row["surname"] . "</td>";
	echo '<td>' . $row["name"] . "</td>";
	echo '<td>' . $row["secname"] . "</td>";
	echo '<td>' . $row["rank"] . "</td>";
	echo '<td>' . $row["work"] . "</td>";
	echo '<td>' . $row["pr2"] . "</td>";
	echo '<td>' . $row["pr3"] . "</td>";
	echo '<td>' . $row["pr4"] . "</td>";
	echo '<td>' . $row["pr5"] . "</td>";
	echo "</tr>";
	$i = $i+1;
}	

?>
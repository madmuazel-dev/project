<?php
$date = $_POST['date'];
$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT d.id_rsz, d.date_rsz, d.sign_rsz, c.deps, c.shtat, c.spisok, c.onface, m.duty, m.trip, m.vacation
FROM doc_rsz d, count_rsz c, miss_rsz m
WHERE d.id_rsz = c.id_rsz AND d.id_rsz = m.id_rsz AND d.date_rsz = '$date'";
$result = $conn->query($sql);

echo '<tr class="table_row_head">
<td style="font-size:12px;"><b>Дата</b></td>
<td style="font-size:12px;"><b>Номер</b></td>
<td style="font-size:12px;"><b>Кем подписан</b></td>
<td style="font-size:12px;"><b>Итог по штату</b></td>
<td style="font-size:12px;"><b>Итог по списку</b></td>
<td style="font-size:12px;"><b>Итог на лицо</b></td>
<td style="font-size:12px;"><b>Итог наряд</b></td>
<td style="font-size:12px;"><b>Итог командировка</b></td>
<td style="font-size:12px;"><b>Итог отпуск</b></td>
</tr>';
while($row = $result->fetch()){
	
	echo '<tr class="table_row">';
	echo '<td class="item" id="'.$row["id_rsz"].'">' . $row["date_rsz"] . "</td>";
	echo '<td class="table_col">' . $row["id_rsz"] . "</td>";
	echo '<td class="table_col">' . $row["sign_rsz"] . "</td>";
	echo '<td class="table_col">' . $row["shtat"] . "</td>";
	echo '<td class="table_col">' . $row["spisok"] . "</td>";
	echo '<td class="table_col">' . $row["onface"] . "</td>";
	echo '<td class="table_col">' . $row["duty"] . "</td>";
	echo '<td class="table_col">' . $row["trip"] . "</td>";
	echo '<td class="table_col">' . $row["vacation"] . "</td>";
	echo '<td><img class="img-delete" src="image/delete.png" width ="30px"></td>';
	echo "</tr>";
}	
?>
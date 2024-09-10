<?php

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql_shtat = "INSERT INTO shtat (`date`, shtat, spisok) 
SELECT 
	date_rsz,
    (SELECT COUNT(surname) FROM personal),
    (SELECT COUNT(surname) FROM personal WHERE surname != '' AND surname != 'ВАКАНТ')
FROM 
	doc_rsz";

$sql = "SELECT s.date, s.shtat, s.spisok, s.sign, COUNT(m.отпуск), COUNT(m.командировка), COUNT(m.наряд), COUNT(m.госпиталь), COUNT(m.увольнение), COUNT(m.сан), COUNT(m.другие) FROM shtat s
JOIN rsz_personal m ON s.date = m.date";

$result = $conn->query($sql);

echo '<tr class="table_row_head">
<td style="font-size:12px;"><b>Дата</b></td>
<td style="font-size:12px;"><b>Номер</b></td>
<td style="font-size:12px;"><b>Кем подписан</b></td>
<td style="font-size:12px;"><b>Итог по штату</b></td>
<td style="font-size:12px;"><b>Итог по списку</b></td>
<td style="font-size:12px;"><b>Итог на лицо</b></td>
<td style="font-size:12px;"><b>Итог отсутствует</b></td>
<td style="font-size:12px;"><b>Итог отпуск</b></td>
<td style="font-size:12px;"><b>Итог командировка</b></td>
<td style="font-size:12px;"><b>Итог госпиталь</b></td>
<td style="font-size:12px;"><b>Итог с/ч</b></td>
<td style="font-size:12px;"><b>Итог наряд</b></td>
<td style="font-size:12px;"><b>Итог уволены</b></td>
<td style="font-size:12px;"><b>Итог другие причины</b></td>
</tr>';
$i = 1;
while($row = $result->fetch()){
	$miss = $row[4]+$row[5]+$row[6]+$row[7]+$row[8]+$row[9]+$row[10];
	$face = $row[2]-$miss;
	
	echo '<tr class="table_row">';
	echo '<td class="item table_col" id="'.$row[0].'">' . $row[0] . "</td>";
	echo '<td class="table_col">' . $i . "</td>";
	echo '<td class="table_col">' . $row[3] . "</td>";
	echo '<td class="table_col">' . $row[1] . "</td>";
	echo '<td class="table_col">' . $row[2] . "</td>";
	echo '<td class="table_col">' . $face . "</td>";
	echo '<td class="table_col">' . $miss . "</td>";
	echo '<td class="table_col">' . $row[4] . "</td>";
	echo '<td class="table_col">' . $row[5] . "</td>";
	echo '<td class="table_col">' . $row[7] . "</td>";
	echo '<td class="table_col">' . $row[9] . "</td>";
	echo '<td class="table_col">' . $row[6] . "</td>";
	echo '<td class="table_col">' . $row[8] . "</td>";
	echo '<td class="table_col">' . $row[10] . "</td>";
	echo "</tr>";
	$i++;

}	
?>

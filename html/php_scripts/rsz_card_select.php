<?php

$date = $_POST['date'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT r.date, r.departament, r.shtat, r.spisok, COUNT(отпуск),COUNT(командировка),COUNT(наряд),COUNT(госпиталь),COUNT(увольнение),COUNT(сан),COUNT(другие)
FROM rsz_personal r WHERE `date` = '$date' GROUP BY r.departament";

$result = $conn->query($sql);



echo '
		<tr>
			<td rowspan="2">Подразделение</td>
			<td colspan="2" rowspan="2">Категория</td>
			<td rowspan="2">По штату</td>
			<td colspan="2">По списку</td>
			<td colspan="2">На лицо</td>
			<td colspan="2">Отсутствуют</td>
			<td colspan="2">Отпуск</td>
			<td colspan="2">Командировка</td>
			<td colspan="2">Госпиталь</td>
			<td colspan="2">с/ч</td>
			<td colspan="2">Наряд</td>
			<td colspan="2">Увольнение</td>
			<td colspan="2">Другие причины</td>
		</tr>
		<tr>
			<td>всего</td>
			<td>в т.ч.жен</td>
			<td>всего</td>
			<td>в т.ч.жен</td>
			<td>всего</td>
			<td>в т.ч.жен</td>
			<td>всего</td>
			<td>в т.ч.жен</td>
			<td>всего</td>
			<td>в т.ч.жен</td>
			<td>всего</td>
			<td>в т.ч.жен</td>
			<td>всего</td>
			<td>в т.ч.жен</td>
			<td>всего</td>
			<td>в т.ч.жен</td>
			<td>всего</td>
			<td>в т.ч.жен</td>
			<td>всего</td>
			<td>в т.ч.жен</td>
		</tr>';
		while($row = $result->fetch()){
		$miss = $row[4]+$row[5]+$row[6]+$row[7]+$row[8]+$row[9]+$row[10];	
		$face = $row["spisok"] - $miss;
		echo '
		<tr>
			<td rowspan="5"> '. $row["departament"] .' </td>
			<td colspan="2">Офицеры</td>
			<td>1</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
		</tr>
		<tr>
			<td colspan="2">Прапорщики</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>3</td>
			<td>4</td>
			<td>3</td>
			<td>4</td>
			<td>3</td>
			<td>4</td>
			<td>3</td>
			<td>43</td>
			<td>3</td>
			<td>4</td>
			<td>3</td>
			<td>4</td>
			<td>3</td>
			<td>4</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
		</tr>
		<tr>
			<td rowspan="2">Сержанты и рядовые</td>
			<td>Контракт</td>
			<td>3</td>
			<td>5</td>
			<td>6</td>
			<td>5</td>
			<td>6</td>
			<td>5</td>
			<td>6</td>
			<td>5</td>
			<td>6</td>
			<td>5</td>
			<td>6</td>
			<td>5</td>
			<td>6</td>
			<td>5</td>
			<td>6</td>
			<td>5</td>
			<td>6</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
		</tr>
		<tr>
			<td>По призыву</td>
			<td>4</td>
			<td>7</td>
			<td>8</td>
			<td>7</td>
			<td>8</td>
			<td>7</td>
			<td>8</td>
			<td>7</td>
			<td>8</td>
			<td>7</td>
			<td>8</td>
			<td>7</td>
			<td>8</td>
			<td>7</td>
			<td>8</td>
			<td>7</td>
			<td>8</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
		</tr>
		<tr>
			<td colspan="2">Итого</td>
			<td>'.$row["shtat"].'</td>
			<td>'.$row["spisok"].'</td>
			<td>'.$row["spisok"].'</td>
			<td>'.$face.'</td>
			<td>'.$face.'</td>
			<td>'.$miss.'</td>
			<td>'.$miss.'</td>
			<td>'.$row[4].'</td>
			<td>'.$row[4].'</td>
			<td>'.$row[5].'</td>
			<td>'.$row[5].'</td>
			<td>'.$row[7].'</td>
			<td>'.$row[7].'</td>
			<td>'.$row[9].'</td>
			<td>'.$row[9].'</td>
			<td>'.$row[6].'</td>
			<td>'.$row[6].'</td>
			<td>'.$row[8].'</td>
			<td>'.$row[8].'</td>
			<td>'.$row[10].'</td>
			<td>'.$row[10].'</td>
		</tr>';
	}
	?>




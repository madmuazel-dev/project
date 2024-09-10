<?php

$id = $_POST['id'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT w.work_history, w.work_date_history, w.work_num_history, w.id FROM work_history w WHERE w.id_personal = $id";

$result = $conn->query($sql);

$i = 1;
echo'<p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Должности:</b></p>';
echo "<table><tr style='font-size: 16px; font-weight: bold;'>
<td style='width: 30px;'>№</td>
<td style='width: 120px;'>Должность</td>
<td style='width: 120px;'>Дата приказа</td>
<td style='width: 140px;'>Номер приказа</td>
</tr></table><table>";
while($row = $result->fetch()){

echo'  
    <tr>
        <td style="width: 30px;">'.$i.'</td>

        <td style="width: 120px;">'.$row["work_history"].'</td>

        <td style="width: 120px;">'. $row["work_date_history"] .'</td>

        <td style="width: 140px;">'. $row["work_num_history"] .'</td>

        <td><button id="'.$row["id"].'" onclick="delet(this.id)">Удалить</button></td>

    </tr>

    ';
    $i++;
};

echo "</table>";

$sql1 = "SELECT r.rank_history, r.rank_date_history, r.rank_num_history FROM rank_history r WHERE r.id_personal = $id";

$result = $conn->query($sql1);

$i = 1;

while($row = $result->fetch()){
echo'<p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Звания:</b></p>
<table>
    <tr>
        <td style="width: 5px;">'.$i.'</td>
        <td style="padding-left: 8px;">Звание:</td>
        <td><input style="width: 100px;" type="text" name="" value="'. $row["rank_history"] .'"></td>
        <td>Дата приказа:</td>
        <td><input style="width: 100px;" type="date" name="" value="'. $row["rank_date_history"] .'"></td>
        <td>Номер приказа:</td>
        <td><input style="width: 100px;" type="text" name="" value="'. $row["rank_num_history"] .'"></td>

    </tr>
</table>
    ';
    $i++;
}
?>
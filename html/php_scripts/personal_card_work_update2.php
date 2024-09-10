<?php
$date = $_POST['date'];
$num = $_POST['num'];
$id = $_POST['id1'];
$id_new = $_POST['id2'];
$work_old = $_POST['work_old'];

$mass = $_POST['mass'];
$mas = join("', '",$mass);


$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "UPDATE works SET work = '". $mass[0] ."' WHERE id_personal = $id";

$result = $conn->query($sql);

$sql = "UPDATE works SET work = '". $work_old ."' WHERE id_personal = $id_new";

$result = $conn->query($sql);

$sql1 = "UPDATE inn SET departament = '". $mass[1] ."', rota = '". $mass[2] ."', vzvod = '". $mass[3] ."', otdel = '". $mass[4] ."' WHERE id_personal = $id";

$result = $conn->query($sql1);

$sql_inn = "INSERT INTO work_history (id_personal, work_history, work_date_history, work_num_history) VALUES ('". $id ."', '". $mass[0] ."', '". $date ."', '". $num ."')";

$result = $conn->query($sql_inn);

$sql2 = "UPDATE inn SET departament = '". $mass[5] ."', rota = '". $mass[6] ."', vzvod = '". $mass[7] ."', otdel = '". $mass[8] ."' WHERE id_personal = $id_new";

$result = $conn->query($sql2);

?>
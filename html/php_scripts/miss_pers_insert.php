<?php
$col = $_POST['col'];
$select = $_POST['select'];
$id = $_POST['id'];
$dep = $_POST['dep'];
$date = $_POST['date'];



$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');
$sql = "INSERT INTO rsz_personal (`date`,`departament`) VALUES ('$date','$dep')";
$result = $conn->query($sql);

$sql2 = "UPDATE `rsz_personal` SET spisok = (SELECT COUNT(surname) FROM personal p JOIN inn i ON i.id_personal = p.id_personal AND i.pr2 = '$dep' AND p.surname != '' AND p.surname != 'ВАКАНТ'), shtat = (SELECT COUNT(surname) FROM personal p JOIN inn i ON i.id_personal = p.id_personal AND i.pr2 = '$dep') WHERE `date` = '$date' AND `departament` = '$dep'";
$result2 = $conn->query($sql2);

for ($i=0; $i < $col; $i++) { 
	$sql1 = "UPDATE `rsz_personal` SET $select[$i] = '$id[$i]' WHERE `date` = '$date' AND `departament` = '$dep'";
	$result1 = $conn->query($sql1);
}

?>
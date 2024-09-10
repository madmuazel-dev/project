<?php


$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT p.birthday, p.id_personal, p.surname, p.name, p.secname, r.rank, i.pr1, i.pr2, i.pr3, i.pr4, i.pr5 FROM personal p, inn i, rank r WHERE p.id_personal = $id AND i.id_personal = $id AND r.id_personal = $id";

$result = $conn->query($sql);

    $row = $result->fetch();

$birthday = new \DateTime($row["birthday"]);
$interval = $birthday->diff(new \DateTime());
$age = $interval->y;
?>


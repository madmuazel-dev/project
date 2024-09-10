<?php
$id = $_POST['id'];
$id_main = $_POST['id_main'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT w.work FROM works w WHERE id_personal = $id";

$result = $conn->query($sql);

$row = $result->fetch();

echo $row["work"];
echo "/";

$sql1 = "SELECT i.departament, i.rota, i.vzvod, i.otdel FROM inn i WHERE id_personal = $id";

$result = $conn->query($sql1);

$row = $result->fetch();

echo $row["departament"];
echo "/";
echo $row["rota"];
echo "/";
echo $row["vzvod"];
echo "/";
echo $row["otdel"];
echo "/";

$sql2 = "SELECT i.departament, i.rota, i.vzvod, i.otdel FROM inn i WHERE id_personal = $id_main";

$result = $conn->query($sql2);

$row = $result->fetch();

echo $row["departament"];
echo "/";
echo $row["rota"];
echo "/";
echo $row["vzvod"];
echo "/";
echo $row["otdel"];
?>
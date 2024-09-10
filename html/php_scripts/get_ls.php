<?php

$id = $_POST['id'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT parents.l FROM ls l WHERE l.id_personal = $id";

$result = $conn->query($sql);

$row = $result->fetch();

echo "$row[0]";


?>
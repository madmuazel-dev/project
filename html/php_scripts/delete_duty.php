<?php
$id = $_POST['id'];


$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');
$sql = "UPDATE duty SET start= NULL, end= NULL, days= NULL WHERE id_personal = $id";
	$result = $conn->query($sql);


?>
<?php
$id = $_POST['id'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "DELETE * FROM personal, rank WHERE `id_personal` = $id";
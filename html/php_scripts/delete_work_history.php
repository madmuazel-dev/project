<?php

$id = $_POST['id'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "DELETE FROM work_history WHERE id = $id";

$result = $conn->query($sql);



?>
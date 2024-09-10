<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8" />
</head>
<body>
<?php
$id = 1;
for ($i=1; $i < 314; $i++) { 
    $conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "UPDATE `personal` SET `surname` = (SELECT `COL 6` FROM `tableconvert_com_hthcrk` WHERE `COL 1` = '$id')  WHERE `id_personal` = $id";

$result = $conn->query($sql);
$id++;
}
?>

</body>
</html>
<?php

$filt = $_POST['filter'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

if ($filt == 'deps') {
	$sql = "SELECT dep FROM deps ORDER BY dep";
}

else {$sql = "SELECT DISTINCT $filt FROM inn ORDER BY $filt;";}

$result = $conn->query($sql);



echo '<div class="checks"><li style="border-bottom:1px solid grey; height:22px; line-height: 22px;"><label><input type="checkbox" onclick="get_filt();" name="'.$filt.'" value="0"><b>Выбрать все</b></label></li>';
$i = 1;
while($row = $result->fetch()){
	echo '<li style="border-bottom:1px solid grey; height:22px; line-height: 22px;"><label><input type="checkbox" onclick="get_filt();" class="ss" name="'.$filt.'" value="'.$row[0].'">'.$row[0].'</label></li>';
	$i++;
}
echo "</div>";

?>
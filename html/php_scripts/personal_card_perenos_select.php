<?php

$id = $_POST['id'];

$filt = $_POST['filts'];
$filts = join("', '",$filt);

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT w.work, w.date, w.num FROM works w WHERE w.id_personal = $id";

$result = $conn->query($sql);

$i = 1;

while($row = $result->fetch()){
echo'
<table>
    <tr>
        <td style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 20px;"><b>Текущая должность:</b></td>
        <td style="font-size:16px;" id = "work_old">'.$row["work"].'</td>
    </tr>   
</table>

    ';
    $i++;
};
$sql1 = "SELECT p.id_personal, p.surname, p.name, p.secname, w.work, i.pr2
FROM personal p, inn i, works w
WHERE p.id_personal = i.id_personal AND p.id_personal = w.id_personal AND i.departament IN ('$filts')";

echo '<p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 20px;"><b>Новая должность:</b></p>';

echo '<div class ="filters" style="max-width:1340px; min-width:700px;"><table style="border-spacing: 0px;"><tr><td style="width: 100px;"></td><td style="width: 100px;"></td><td style="width: 100px;"></td><td style="width: 230px;"></td>';

echo '<td><div class="drop">
        <button>Принадлежность 1 &#9660</button>
        <div class="checkselect" id="checkselect1"></div>
      </div></td>';

echo '<td><div class="drop">
        <button>Принадлежность 2 &#9660</button>
        <div class="checkselect" id="checkselect2"></div>
      </div></td>';
echo '<td><div class="drop">
        <button>Принадлежность 3 &#9660</button>
        <div class="checkselect" id="checkselect3"></div>
      </div></td>';
echo '<td><div class="drop">
        <button>Принадлежность 4 &#9660</button>
        <div class="checkselect" id="checkselect4"></div>
      </div></td></tr></table></div>';


$result = $conn->query($sql1);
echo "<div style='max-width:1340px; min-width:700px; height:230px; overflow-y:scroll;'>";
echo "<table class='tbl' style='border-spacing: 0px;'>";
echo "<thead><tr style='font-size: 15px; font-weight: bold; background: #CCCCFF;'>
    <td style='width: 100px; border-right: 1px solid grey;'>Фамилия</td>
    <td style='width: 100px; border-right: 1px solid grey;'>Имя</td>
    <td style='width: 100px; border-right: 1px solid grey;'>Отчество</td>
    <td style='width: 230px; border-right: 1px solid grey;'>Должность</td>
    <td style='width: 150px; border-right: 1px solid grey;'>Принадлежность 1</td>
    <td style='width: 150px; border-right: 1px solid grey;'>Принадлежность 2</td>
    <td style='width: 150px; border-right: 1px solid grey;'>Принадлежность 3</td>
    <td style='width: 150px; border-right: 1px solid grey;'>Принадлежность 4</td>
    <td style='width: 180px;'>Заменить</td>

</tr> </thead>
<tbody>";

while($row = $result->fetch()){
    
    echo '  
    <tr id="'.$row[id_personal].'">
        <td style="width: 100px; border-right: 1px solid grey;">'.$row["surname"].'</td>
        <td style="width: 100px; border-right: 1px solid grey;">'.$row["name"].'</td>
        <td style="width: 100px; border-right: 1px solid grey;">'.$row["secname"].'</td>
        <td style="width: 230px; border-right: 1px solid grey;" class="work">'.$row["work"].'</td>
        <td style="width: 150px; border-right: 1px solid grey;">'.$row["pr2"].'</td>
        <td style="background:white; width: 180px;"><button id="'.$row[id_personal].'" onclick="perenos(this.id)">Заменить на должность</button></td>
    </tr>
    ';
    
}
echo "</tbody></table>";
echo "</div>";


?>
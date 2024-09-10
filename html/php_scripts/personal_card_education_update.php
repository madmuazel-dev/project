<?php

$id = $_POST['id'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT p.id_personal, r.rank, i.departament, i.rota, i.vzvod, i.otdel FROM personal p, inn i, rank r WHERE p.id_personal = i.id_personal = r.id_personal AND p.id_personal = $id";

$result = $conn->query($sql);

$row = $result->fetch();

echo 
'<p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Образование:</b></p>
<table>
    <tr>
    	<td style="padding-left: 8px;">Специальность:</td>
        <td><input style="margin-right: 32px;" type="text" name="" value="'. $row["departament"] .'"></td>
        <td>Учереждение:</td>
        <td><input style="width: 80px;" type="text" name="" value="'. $row["rota"] .'"></td>
        <td>Год окончания:</td>
        <td><input style="width: 80px;" type="text" name="" value="'. $row["vzvod"] .'"></td>
        <td>Ксерокопия:</td>
        <td><input style="width: 80px;" type="text" name="" value="'. $row["otdel"] .'"></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Дополнительное образование/специальность:</b></p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 8px;">Звание:</td>
        <td><input style="" type="text" name="" value="'. $row["rank"] .'"></td>
        <td>Дата присвоения:</td>
        <td><input style="" type="date" name="" value="'. $row["otdel"] .'"></td>
        <td>№ Приказа:</td>
        <td><input style="" type="text" name="" value="'. $row["otdel"] .'"></td>
    </tr>
</table>
';
?>
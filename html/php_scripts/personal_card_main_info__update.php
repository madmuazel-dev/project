<?php

$id = $_POST['id'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT p.id_personal, r.rank, i.departament, i.rota, i.vzvod, i.otdel FROM personal p, inn i, rank r WHERE i.id_personal = $id AND r.id_personal = $id AND p.id_personal = $id";

$result = $conn->query($sql);

$row = $result->fetch();

echo'<p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Принадлежность:</b></p>
<table>
    <tr>
    	<td style="padding-left: 8px;">Подразделение:</td>
        <td><input style="margin-right: 8px;" type="text" name="" value="'. $row["departament"] .'"></td>
        <td>Рота:</td>
        <td><input style="" type="text" name="" value="'. $row["rota"] .'"></td>
        <td>Взвод:</td>
        <td><input style="" type="text" name="" value="'. $row["vzvod"] .'"></td>
        <td>Отделение:</td>
        <td><input style="" type="text" name="" value="'. $row["otdel"] .'"></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Звание:</b></p>
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
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Должность:</b></p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 8px;">Должность:</td>
        <td><input style="" type="text" name="" value="'. $row["otdel"] .'"></td>
        <td>Дата назначения:</td>
        <td><input style="" type="date" name="" value="'. $row["otdel"] .'"></td>
        <td>№ Приказа:</td>
        <td><input style="" type="text" name="" value="'. $row["otdel"] .'"></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Контракт:</b></p>
        </td>
    </tr>
</table>
';
?>
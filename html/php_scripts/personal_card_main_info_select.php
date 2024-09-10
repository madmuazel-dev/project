<?php

$id = $_POST['id'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT p.id_personal, r.rank, i.pr2 FROM personal p, inn i, rank r WHERE i.id_personal = $id AND r.id_personal = $id AND p.id_personal = $id";

$result = $conn->query($sql);

$row = $result->fetch();

echo'<p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Принадлежность:</b></p>
<table>
    <tr>
    	<td style="padding-left: 8px;">Подразделение:</td>
        <td>'.$row['pr2'].'<select name="'.$row['pr2'].'" id="select-departament" style="width: 200px;">
            <option type="checkbox" name="departament" value="1СО">1 СО</option>
            <option type="checkbox" name="departament" value="2СО">2 СО</option>
            <option type="checkbox" name="departament" value="ИСР">ИСР</option>
            <option type="checkbox" name="departament" value="СРРХБЗ">СРРХБЗ</option>
            <option type="checkbox" name="departament" value="'.$row['pr2'].'">телекоммуникационный узел</option>
            <option type="checkbox" name="departament" value="ПСР">ПСР</option>
        </select></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Звание:</b></p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 8px;">Звание:</td>
        <td><select id="select-rank" name="'.$row['rank'].'" style="width: 200px;">
            <option type="checkbox" name="rank" value="Рядовой">Рядовой</option>
            <option type="checkbox" name="rank" value="Ефрейтор">Ефрейтор</option>
            <option type="checkbox" name="rank" value="Младший сержант">Младший сержант</option>
            <option type="checkbox" name="rank" value="Сержант">Сержант</option>
            <option type="checkbox" name="rank" value="Старший сержант">Старший сержант</option>
            <option type="checkbox" name="rank" value="Старшина">Старшина</option>
            <option type="checkbox" name="rank" value="Лейтенант">Лейтенант</option>
            <option type="checkbox" name="rank" value="Старший лейтенант">Старший лейтенант</option>
            <option type="checkbox" name="rank" value="капитан">капитан</option>
            <option type="checkbox" name="rank" value="Майор">Майор</option>
            <option type="checkbox" name="rank" value="Подполковник">Подполковник</option>
            <option type="checkbox" name="rank" value="Полковник">Полковник</option>
            <option type="checkbox" name="rank" value="Прапорщик">Прапорщик</option>
            <option type="checkbox" name="rank" value="Старший прапорщик">Старший прапорщик</option>
        </select></td>
        <td>Дата присвоения:</td>
        <td><input style="width: 100px;" type="date" name="" value="'. $row["pr2"] .'"></td>
        <td>№ Приказа:</td>
        <td><input style="width: 100px;" type="text" name="" value="'. $row["pr2"] .'"></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Должность:</b></p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 8px;">Должность:</td>
        <td><input style="width: 200px;" type="text" name="" value="'. $row["pr2"] .'"></td>
        <td>Дата назначения:</td>
        <td><input style="width: 100px;" type="date" name="" value="'. $row["pr2"] .'"></td>
        <td>№ Приказа:</td>
        <td><input style="width: 100px;" type="text" name="" value="'. $row["pr2"] .'"></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Контракт:</b></p>
        </td>
    </tr>
</table>
';
?>
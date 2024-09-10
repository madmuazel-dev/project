<?php

$id = $_POST['id'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT p.id_personal, r.rank, i.departament, i.rota, i.vzvod, i.otdel FROM personal p, inn i, rank r, phones ph WHERE p.id_personal = i.id_personal = r.id_personal AND ph.id_personal = $id AND p.id_personal = $id";

$result = $conn->query($sql);

$row = $result->fetch();

echo'<p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Паспорт:</b></p>
<table>
    <tr>
    	<td style="padding-left: 8px;">Серия:</td>
        <td><input style="" type="text" name="" value="'. $row["departament"] .'"></td>
        <td>Номер:</td>
        <td><input type="text" name="" value="'. $row["rota"] .'"></td>
        <td>Ксерокопия:</td>
        <td><input type="text" name="" value="'. $row["vzvod"] .'"></td>
    </tr>
    <tr>
        <td colspan="10 ">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Водительское удостоверение:</b></p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 8px;">Номер:</td>
        <td><input style="" type="text" name="" value="'. $row["rank"] .'"></td>
        <td>Действителен с:</td>
        <td><input style="" type="date" name="" value="'. $row["rank"] .'"></td>
        <td>по:</td>
        <td><input style="" type="date" name="" value="'. $row["departament"] .'"></td>
        <td>Категории:</td>
        <td><input style="" type="text" name="" value="'. $row["departament"] .'"></td>
        <td>Ксерокопии:</td>
        <td><input style="" type="text" name="" value="'. $row["departament"] .'"></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Военный билет:</b></p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 8px;">Номер:</td>
        <td><input style="" type="text" name="" value="'. $row["departament"] .'"></td>
        <td>Ксерокопия:</td>
        <td><input style="" type="date" name="" value="'. $row["departament"] .'"></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Прописка:</b></p>
        </td>
    </tr>
</table>
';
?>
<?php

$id = $_POST['id'];

$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$sql = "SELECT p.id_personal, pa.seria, pa.num, pa.scan FROM personal p, pasport pa WHERE p.id_personal = $id AND pa.id_personal = $id";

$result = $conn->query($sql);

$row = $result->fetch();

echo'<p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Паспорт:</b></p>
<table>
    <tr>
    	<td style="padding-left: 8px;">Серия:</td>
        <td><input style="width: 100px;" type="text" name="" value="'. $row["seria"] .'"></td>
        <td>Номер:</td>
        <td><input style="width: 100px;" type="text" name="" value="'. $row["num"] .'"></td>
        <td>Ксерокопия:</td>
        <td><img id="preview" src="" alt="Превью изображения" style="width: 100px;"/>
<input type="file" id="imageInput" accept="image/*" onchange="displayImage(this)"/>
        </td>
    </tr>
    <tr>
        <td colspan="10 ">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Водительское удостоверение:</b></p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 8px;">Номер:</td>
        <td><input style="width: 100px;" type="text" name="" value="'. $row["seria"] .'"></td>
        <td>Действителен с:</td>
        <td><input style="" type="date" name="" value="'. $row["seria"] .'"></td>
        <td>по:</td>
        <td><input style="" type="date" name="" value="'. $row["seria"] .'"></td>
        <td>Категории:</td>
        <td>
        <div class="dropdown" style="margin-left: 16px; width:80px;">
            <button>Категории &#9660</button>
            <div class="dropdown-content">
            <div id="controls_dep">
                <label><input type="checkbox" name="departament" value="1 СО">A</label>
                <label><input type="checkbox" name="departament" value="2 СО">B</label>
                <label><input type="checkbox" name="departament" value="ИСР">C</label>
                <label><input type="checkbox" name="departament" value="СРРХБЗ">D</label>
                <label><input type="checkbox" name="departament" value="ТКУ">E</label>
                <label><input type="checkbox" name="departament" value="ПСР">F</label>
            </div>
            </div>
        </div>
        </td>
        <td>Ксерокопии:</td>
        <td><input style="" type="text" name="" value="'. $row["seria"] .'"></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Военный билет:</b></p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 8px;">Номер:</td>
        <td><input style="width: 100px;" type="text" name="" value="'. $row["seria"] .'"></td>
        <td>Ксерокопия:</td>
        <td><input style="" type="date" name="" value="'. $row["seria"] .'"></td>
    </tr>
    <tr>
        <td colspan="8">
            <p style="margin: 0 auto; padding-left: 24px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;"><b>Прописка:</b></p>
        </td>
    </tr>
</table>
';
?>
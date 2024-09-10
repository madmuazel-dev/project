<?php
$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

$uploadname=basename($_FILES['file']['name']);//записываем имя файла
$uploadpath='files/'.$uploadname; //указываем куда грузить файл
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadpath)) { //перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)
        $sql="INSERT INTO `files` (`name`,`path`) VALUES ('$uploadname','$uploadpath')"; //составляем запрос на запись в базу имя и путь к файлу
        mysql_query($sql); //делаем запрос
        echo 'Успешно'; 
    }
    else echo 'Ошибка загрузки';
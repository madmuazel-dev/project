<?php

if($file = $_FILES['myFile']) {

    // Получаем наше изображение, имя которого мы указали в атрибуте `name="file"`

    $path =  __DIR__ . '/uploads/'; // Наш путь до папки загрузок

    $fileExt = end(explode('.', $file['name']));  // Получили расширение файла `jpg`

    $fileName = uniqid('image_') . "." . $fileExt;    // Сгенерировали уникальное имя нашему файлу, с расширением

    try {

        // Создаем экземпляр класса PDO
        $pdo = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');

        $sql = 'INSERT INTO `image`(path) VALUES(?)';   // Создаем SQL-запрос для вставки имени изображения

        $stmt = $pdo->prepare($sql);    // Подготавливаем наш запрос
        $stmt->execute([$fileName]);    // Выполняем наш запрос
        move_uploaded_file($file['tmp_name'], $path.$fileName); // Сохраняем картинку на сервере в '/uploads/'

    } catch (Exception $e) {

        echo $e->getMessage();

    }

}
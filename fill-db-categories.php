<?php

$categories = json_decode(file_get_contents('mock.json'), true);

$connection = mysqli_connect($host = 'localhost', $user = 'root', $password = null, $database = 'crown_api', $port = 3306);

foreach ($categories as $category) {
    $query = "INSERT INTO categories(title, image) VALUES ('{$category['title']}', '{$category['image']}')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo $category['title'] . " Added Successfully<br>";
    }
}

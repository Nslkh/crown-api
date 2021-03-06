<?php

$categories = json_decode(file_get_contents('mock.json'), true);

$connection = mysqli_connect($host = 'localhost', $user = 'root', $password = null, $database = 'crown_api', $port = 3306);

foreach ($categories as $category_id => $category) {
    foreach ($category['items'] as $product) {
        $query = "INSERT INTO products(name, img, price, category_id) VALUES ('{$product['name']}', '{$product['img']}','{$product['price']}','{$category_id}')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo $product['name'] . "  was added successfully to  " . $category['title']. "<br>";
        }
    }
}

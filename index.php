<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$config = require 'config.php';

$db_config = $config['mysql'];

$connection = mysqli_connect($db_config['host'], $db_config['user'], $db_config['password'], $db_config['database'], $db_config['port']);
$sql = "SELECT * FROM categories";
$query = mysqli_query($connection, $sql);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

// $data = json_decode(file_get_contents('mock.json'), true);

// echo "<pre>";
// var_dump($data);
// echo "</pre>";

$result = [];

foreach ($data as $category_id => $category) {
    $category['items'] = [

        "id" => 1,
        "img" =>"https://hosty.xxx/i/327d7a8b22217603d651476aed3ab739a4cbde78.jpg",
        "name"=>"Adidas NMD",
        "price"=>"$120",
    ];
    [
    
        "id" => 2,
        "img" =>"https://hosty.xxx/i/6260f27fba190108d1405100a4e47a9abc7dfdc9.jpg",
        "name"=>"Adidas Yeezy ",
        "price"=>"$50",
    ];
    $result[] = $category;
}


echo json_encode($result, JSON_PRETTY_PRINT);

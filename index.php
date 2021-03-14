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
    $sql = "SELECT * FROM products WHERE category_id = ' " . $category['id'] . "'";

    $query = mysqli_query($connection, $sql);
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

    $category['items'] = $data;
    $result[] = $category;
}


echo json_encode($result, JSON_PRETTY_PRINT);

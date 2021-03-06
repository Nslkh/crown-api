<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$connection = mysqli_connect($host = 'localhost', $user = 'root', $password = null, $database = 'crown_api', $port = 3306);
$sql = "SELECT * FROM categories";
$query = mysqli_query($connection, $sql);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

// $data = json_decode(file_get_contents('mock.json'), true);

// echo "<pre>";
// var_dump($data);
// echo "</pre>";


echo json_encode($data, JSON_PRETTY_PRINT);

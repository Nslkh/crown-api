<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents('mock.json'), true);

// echo "<pre>";
// var_dump($data);
// echo "</pre>";
echo json_encode($data, JSON_PRETTY_PRINT);

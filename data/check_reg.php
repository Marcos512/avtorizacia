<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/JsonBD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/RegClass.php";

$_POST = json_decode(file_get_contents("php://input"), true);

$obj = new RegClass($_POST); //проверяем введенные данные
$response = $obj->verify();
if (!$response['error']) //регистрируем если ошибок нет
    $obj->regData();

header('Content-Type: application/json');

echo json_encode($response, JSON_UNESCAPED_UNICODE);

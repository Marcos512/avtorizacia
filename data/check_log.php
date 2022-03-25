<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/JsonBD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/LoginClass.php";

if (!isset($_SERVER['CONTENT_TYPE']) || $_SERVER['CONTENT_TYPE'] !== "application/json") { //проверка на ajax запрос
    echo "Ошибка";
} else { //авторизация
    $_POST = json_decode(file_get_contents("php://input"), true);
    $obj = new LoginClass($_POST);

    //ответ
    $response = array(
        'error' => $obj->checkData());


    header('Content-Type: application/json');

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}
<?php
session_start();
//удаляем информацию о авторизации
unset($_SESSION['user']);
unset($_COOKIE['user']);
setcookie('user', null, -1, '/');

header('location: ../');
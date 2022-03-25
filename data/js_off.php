<?php
//шапка на случай отключенного JavaScript
if ($_SESSION['user'] == "") {
    echo "<h2>Добро пожаловать! Пожалуйста включите JavaScript чтобы авторизоваться или зарегистрироваться</h2>";
} else {
    echo "<h2>Hello, {$_SESSION['user']} </h2> <a href='/data/exit_zapros.php'; class='button'>Выйти</a>";
}
<?php session_start();
$title = "Форма авторизации";
require $_SERVER['DOCUMENT_ROOT'] . "/header.php";
?>


<div class='inner'>
    <form id="formaLog">
        <label>Введите логин </label>
        <input type="text" name="login" placeholder="Введите логин..."><br/><br/>

        <label>Введите пароль </label>
        <input type="password" name="password" placeholder="Введите пароль..."><br/><br/>

        <input type="submit" class='button' value="отправить" onclick="sendLogin('../data/check_log.php')"><br/>

        <div id="message"></div>

    </form>
</div>

<?php
require $_SERVER['DOCUMENT_ROOT'] . "/footer.php";
?>

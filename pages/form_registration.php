<?php session_start();

$title = "Форма регистрации";
require $_SERVER['DOCUMENT_ROOT'] . "/header.php";
?>


<div class='inner'>
    <form id="formaReg">
        <label>Введите логин: </label><br/>
        <input type="text" name="login" placeholder="Введите логин...">
        <div id="error_login"></div>
        <br/>

        <label>Введите пароль: </label><br/>
        <input type="password" name="password" placeholder="Введите пароль...">
        <div id="error_password"></div>
        <br/>

        <label>Повторите пароль: </label><br/>
        <input type="password" name="confirm_password" placeholder="Повторите пароль...">
        <div id="error_confirm_password"></div>
        <br/>

        <label>Введите email: </label><br/>
        <input type="text" name="email" placeholder="Введите email...">
        <div id="error_email"></div>
        <br/>

        <label>Ведите имя: </label><br/>
        <input type="text" name="name" placeholder="Введите имя...">
        <div id="error_name"></div>
        <br/>

        <input type="submit" class="button" value="Отправить" onclick="sendReg('../data/check_reg.php')">
    </form>

    <div id="message"></div>

</div>


<?php
require $_SERVER['DOCUMENT_ROOT'] . "/footer.php";
?>

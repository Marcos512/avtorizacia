//проверяем авторизацию при загрузке страницы и выводим кнопки

var cookieValue = "";
cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)user\s*\=\s*([^;]*).*$)|^.*$/, "$1");
$(document).ready(function () {
    if (cookieValue == "" || typeof cookieValue == 'undefined') {
        $(".header").html("<h2>Добро пожаловать! Пожалуйста авторизируйтесь или зарегистрируйтесь</h2><a href='/pages/form_login.php' class='button'>Войти</a> <a href='/pages/form_registration.php' class='button'>Регистрация</a>");
    } else {
        $(".header").html("<h2>Hello, " + cookieValue + "</h2> <a href='/data/exit_zapros.php'; class='button'>Выйти</a>");
    }
});
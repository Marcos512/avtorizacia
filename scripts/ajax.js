function sendRequest(url, body) { //функция отправки запроса
    return fetch(url, {
        method: 'POST',
        headers: {'Content-Type': 'application/json',},
        body: JSON.stringify(body)
    })
        .then(response => {
            return response.json()
        })
}

function sendReg(url) { //активация отправки запроса по нажатию кнопки на странице регистрации
    formaReg.onsubmit = function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData = Object.fromEntries(formData);

        sendRequest(url, formData)
            .then(data => {
                clearError();
                errorResponse(data);
            })
            .catch(err => console.log(err))
    };
}


function sendLogin(url) { //активация отправки запроса по нажатию кнопки на странице авторизации
    const forms = document.getElementsByTagName('form');

    formaLog.onsubmit = function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData = Object.fromEntries(formData);
        sendRequest(url, formData)
            .then(data => {
                console.log(data);
                errorResponseLogin(data);
            })
            .catch(err => console.log(err))
    };
}


function errorResponseLogin(data) { //вывод ответа на странице авторизации
    if (data['error']) {
        $('#message').text("Логин или пароль введены неверно!");
    } else
        window.location.href = '/';
}

function errorResponse(data) { //вывод ответов на экране регистрации
    if (data['error']) {
        $('#error_login').text(data['error_login']);
        $('#error_password').text(data['error_password']);
        $('#error_confirm_password').text(data['error_confirm_password']);
        $('#error_email').text(data['error_email']);
        $('#error_name').text(data['error_name']);

    } else
        $('#message').text("Пользователь успешно зарегистрирован!");
}

function clearError() { //очистка полей о ошибке на странице регистрации
    $('#error_login').text("");
    $('#error_password').text("");
    $('#error_confirm_password').text("");
    $('#error_email').text("");
    $('#error_name').text("");
    $('#message').text("");
}
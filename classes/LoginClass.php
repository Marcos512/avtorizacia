<?php

class LoginClass extends JsonBD
{

    public $login;
    public $password;

    public function __construct($array)
    {
        parent::__construct();
        foreach ($array as $key => $value) {
            $this->$key = filter_var(trim($value), FILTER_SANITIZE_STRING);
        }
    }

    public function checkData()
    {
        $data = parent::readBD();//подключаем и загружаем данные из бд
        $this->password = md5($this->password . "dg2f1dgs484df5"); //шифруем пороль для сравнения

        foreach ($data as $key => $value) {//проверяем есть ли совпадения
            if ($data[$key]['login'] == $this->login && $data[$key]['password'] == $this->password) {
                $_SESSION['user'] = $data[$key]['name'];//сохраняем пользователя в сессии и куки
                setcookie('user', $data[$key]['name'], time() + 3600 * 24 * 7, '/'); //сохраняем куки на 7 дней
                return false;
            }
            return true;
        }
    }
}
<?php

class RegClass extends JsonBD
{

    public $login;
    public $password;
    public $confirm_password;
    public $email;
    public $name;

    public function __construct($array)
    {
        parent::__construct();
        if (!file_exists($this->path))//если файла бд нет то создается новый
            $this->createBD();

        foreach ($array as $key => $value) {
            $this->$key = filter_var(trim($value), FILTER_SANITIZE_STRING);
        }
    }

    private function checkLogin($data) //сравниваем логин с данными бд и проверяем на валидность
    {
        $log = false;
        foreach ($data as $key => $value) {
            if ($data[$key]['login'] == $this->login) $log = true;
        }

        if (mb_strlen($this->login, 'UTF-8') < 6 || mb_strpos($this->login, ' ', 0, 'UTF-8') || $log)
            return true;
        else return false;
    }

    private function checkPassword() //проверяем пароль на валидность
    {
        if (mb_strlen($this->password, 'UTF-8') < 6 or !preg_match('/[0-9]+/', $this->password) or strpos($this->password, " ") or !preg_match('/[A-zА-я]+/', $this->password) or preg_match('/[{}@^!-+]+/', $this->password))
            return true;
        else return false;
    }

    private function checkEmail($data) //проверяем email на валидность и сравниваем с бд
    {
        $email = false;
        foreach ($data as $key => $value) {
            if ($data[$key]['email'] == $this->email) $email = true;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) or $email)
            return true;
        else return false;
    }

    private function checkName() //проверяем имя на валидность
    {
        if (mb_strlen($this->name, 'UTF-8') < 2 || !preg_match('/[A-zА-я]+/', $this->name) || preg_match('/[0-9{}@^!-\]]+/', $this->name) || mb_strpos($this->name, ' ', 0, 'UTF-8'))
            return true;
        else return false;
    }

    public function verify() //выполняем проверку введенных данных и готовим ответ для возврата
    {
        $error_login = "";
        $error_password = "";
        $error_confirm_password = "";
        $error_email = "";
        $error_name = "";
        $error = false;

        $data = parent::readBD();

        if ($this->checkLogin($data)) {
            $error_login = "Логин содержит меньше 6 символов или уже занят";
            $error = true;
        }

        if ($this->checkPassword()) {
            $error_password = "Пароль должен состоять из цифр и букв не меньше 6 символов";
            $error = true;
        }

        if ($this->password != $this->confirm_password) {
            $error_confirm_password = "Пароли не совподают";
            $error = true;
        }

        if ($this->checkEmail($data)) {
            $error_email = "Почта введина неверно или уже используеться";
            $error = true;
        }

        if ($this->checkName()) {
            $error_name = "Имя должно состоять только из букв не меньше 2 символов";
            $error = true;
        }

        //ответ
        return array(
            'error' => $error,
            'error_login' => $error_login,
            'error_password' => $error_password,
            'error_confirm_password' => $error_confirm_password,
            'error_email' => $error_email,
            'error_name' => $error_name);
    }

    public function regData() //добавление данных в бд
    {

        $this->password = md5($this->password . "dg2f1dgs484df5");
        $newdata = array(
            'login' => $this->login,
            'password' => $this->password,
            'email' => $this->email,
            'name' => $this->name);
        $this->addBD($newdata);
    }
}
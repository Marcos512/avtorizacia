<?php

class JsonBD
{

    public $path;

    public function __construct($path = '../bd/bd.json')
    {
        $this->path = $path;
    }

    public function createBD($data = []) //Создание БД файла
    {
        $json = json_encode($data);
        file_put_contents($this->path, $json);
    }

    public function addBD($newdata) //Добавление данных
    {
        $data = $this->readBD(); //Загружаем данные из БД
        $data[] = $newdata;    //Добовляем новые данные
        $json = json_encode($data);
        file_put_contents($this->path, $json);//Записываем данные в файл БД
    }

    public function updateBD($newdata) //Изменение данных
    {
        $data = $this->readBD();
        foreach ($data as $key => $value) {

            if ($data[$key]['login'] == $newdata['login']) {

                $data[$key]['password'] = $newdata['password'];//поиск и запись изменений в бд
                $data[$key]['email'] = $newdata['email'];
                $data[$key]['name'] = $newdata['name'];
                $json = json_encode($data);
                file_put_contents($this->path, $json);
            }
        }
    }

    public function deletBD($login) //удаление данных
    {
        $data = $this->readBD();
        foreach ($data as $key => $value) {
            if ($data[$key]['login'] == $login) {
                array_splice($data, $key, 1);//удаление и запись изменений в бд

                $json = json_encode($data);
                file_put_contents($this->path, $json);
            }
        }

    }

    public function readBD() //Получение данных из БД
    {
        $json = file_get_contents($this->path); //Прочитать данные из бд
        $data = json_decode($json, true);
        return $data;
    }

}
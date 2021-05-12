<?php


namespace Core;

use PDO;

class Model
{
//    protected $dataConnect;
    protected $database;

    protected function __construct()
    {
        $this->database = new Database();
//        $this->dataConnect = new PDO("mysql:host=localhost;dbname=blogData;charset=utf8", 'root', 'root');
    }


}
<?php


namespace Core;

use PDO;

class Model
{
    protected $dataConnect;

    protected function __construct()
    {
        $this->dataConnect = new PDO("mysql:host=localhost;dbname=blogData;charset=utf8", 'root', 'root');
    }

}
<?php

namespace Core;

use PDO;

class Model
{
    protected $database;

    protected function __construct()
    {
        $this->database = new Database();
    }
}

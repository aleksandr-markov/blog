<?php


namespace Core;

use PDO;
use PDOException;

require '../config.php';

class Database
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    public function __construct()
    {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName . ";charset=utf8";
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Allows us to write queries
    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    //Bind values
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    //Execute the prepared statement

    public function resultSet()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Return an array

    public function execute()
    {
        return $this->statement->execute();
    }

    //Return a specific row as an object

    public function singleSet()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    //Get's the row count
    public function rowCount()
    {
        return $this->statement->rowCount();
    }

    public function fetchColumn()
    {
        return $this->statement->fetchColumn();
    }

    //Counting rows returned by a SELECT statement
    public function columnCount()
    {
        return $this->statement->columnCount();
    }

    public function dumpErrorInfo()
    {
        return $this->statement->errorInfo();
    }

    public function executeQuery(string $statement, array $bindParams = null)
    {
        $this->query($statement);
        if ($bindParams == null) {
            return $this->execute();
        }

        foreach ($bindParams as $placeholders => $value) {
            $this->bind($placeholders, $value);
        }

        return $this->execute();
    }

    public function lastInsertId()
    {
        return $this->dbHandler->lastInsertId();
    }
}
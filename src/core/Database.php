<?php

class Database
{
    private $conn;
    private $tableName; //for query builder
    private $column = [];


    public function __construct()
    {
        $this->conn = $this->setConnection();
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    public function setColumn($column)
    {
        $this->column = $column;
    }

    protected function setConnection()
    {
        try {
            $host = DB_HOST;
            $user = DB_USER;
            $pass = DB_PASS;
            $db = DB_NAME;
            $port = DB_HOST;

            $conn = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query, $params = [])
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function get($params = [])
    {
        $column = implode(',', $this->column);
        $query = "select $column from {$this->tableName}";
        $paramValue = [];
        if (!empty($params)) {
            $query .= " where 1=1 ";
            foreach ($params as $key => $value) {
                $query .= " and {$key} = ? ";
                array_push($paramValue, $value);
            }
        }

        return $this->query($query, $paramValue);
    }

    public function insertData($data = [])
    {
        if (empty($data)) {
            return false;
        }

        $columnValue = [];
        $kolom = [];
        $param = [];

        foreach ($data as $key => $value) {
            array_push($kolom, $key);
            array_push($columnValue, $value);
            array_push($param, "?");
        }

        $kolom = implode(', ', $kolom);
        $param = implode(', ', $param);

        $query = "insert into {$this->tableName} ($kolom) values ($param)";
        return $this->query($query, $columnValue);
    }

    public function updateData($data = [], $param = [])
    {
        if (empty($data)) {
            return false;
        }

        $columnValue = [];
        $kolom = [];
        $query = "update {$this->tableName}";

        foreach ($data as $key => $value) {
            array_push($kolom, $key . "= ?");
            array_push($columnValue, $value);
        }

        $kolom = implode(", ", $kolom);
        $query = $query . " set $kolom where 1=1 ";
        $whereColumn = [];
        foreach ($param as $key => $value) {
            array_push($whereColumn, "and {$key} = ?");
            array_push($columnValue, $value);
        }

        $whereColumn = implode(", ", $whereColumn);
        $query = $query . $whereColumn;
        return $this->query($query, $columnValue);
    }

    public function deleteData($param = [])
    {
        if (empty($param)) {
            return false;
        }

        $query = "delete from {$this->tableName}";
        $paramValue = [];

        $query = $query . " where 1=1 ";
        foreach ($param as $key => $value) {
            $query .= " and {$key} = ? ";
            array_push($paramValue, $value);
        }

        return $this->query($query, $paramValue);
    }
}

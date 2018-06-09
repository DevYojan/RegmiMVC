<?php

/*
* Main Database class which connects to the database
* create prepared statements
* bind values
* and return results
*/

class Database {
    
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $password = DB_PASSWORD;

    private $conn;
    private $query;
    private $stmt;

    public function __construct(){
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try{
        $this->conn = new PDO($dsn, $this->user, $this->password, $options);
        } catch(PDOException $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
            die();
        }
    }

    // Prepare the query
    public function query($sql){
        $this->stmt = $this->conn->prepare($sql);
    }

    // bind the parameters
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
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
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the statement
    public function execute(){
        return $this->stmt->execute();
    }

    // Fetch the result as array of objects
    public function fetchObj(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
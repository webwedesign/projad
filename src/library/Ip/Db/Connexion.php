<?php

class Db_Connection{

    protected $db;
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct($dsn, $username, $password){
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->Connection();
    }

    public function Connection(){

        $conn = NULL;

        try{
            $conn = new PDO($this->dsn, $this->username, $this->password);
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }    

        $this->db = $conn;
    }
    
    public function getConnection(){
        return $this->db;
    }

    public function __sleep(){
        return array('dsn', 'username', 'password');
    }

    public function __wakeup(){
        $this->Connection();
    }
}

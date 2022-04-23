<?php 
class Database{
    private $host = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $dbName = "gest_comics";
    public function getConnection(){
        $db = new PDO("mysql:host=$this->host;dbname=$this->dbName;charset=utf8;",$this->usuario,$this->pass);
        return $db;
    }
    
}


?>
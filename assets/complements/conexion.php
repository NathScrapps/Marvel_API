<?php 
class database{
    public function getConnection(){
    $host = "localhost";
    $usuario = "root";
    $pass = "";
    $dbName = "gest_comics";
   
        try {
            $db = new PDO("mysql:host=$this->host;dbname=$this->dbName;charset=utf8;",$this->usuario,$this->pass);
            return $db;
        } catch (PDOException $e) {
            die('!Parece que hubo un error con la base de datos'. $e->getMessage());
        }
    }
    
}


?>
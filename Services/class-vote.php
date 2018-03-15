<?php
class Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

//initialisation des paramètres
    public function __construct($db_name = 'c-ballot', $db_user = 'root', $db_pass = '', $db_host = 'localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

//fonction qui privée qui connecte à la base de donnée
    public function getPDO(){
        if ($this->pdo === NULL){
            $pdo = new PDO('mysql:host=localhost;dbname=c-ballot;charset=utf8', 'root', '');
            $this->pdo = $pdo;
            return $pdo;
        }
    }
}
?>
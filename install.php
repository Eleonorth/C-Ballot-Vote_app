<?php


$host = '127.0.0.1'; 
$port = '3306';
$db = 'vote_bdd';
$login = 'root';
$password = '';

try {
    
    $conn = new PDO("mysql:host=$host", $login, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $db";
    $conn->exec($sql);
    echo "BDD ready";


} catch (PDOException $e) {
    
    var_dump($e->getMessage()); 

} 


$sql = 

&$pdo = exec($sql);
echo "Tables created";

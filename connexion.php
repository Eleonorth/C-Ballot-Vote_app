<?php

$host = '127.0.0.1'; 
$port = '3306';
$db = 'vote_bdd';
$login = 'root';
$password = '';

try {
    
<<<<<<< HEAD
    $conn = new PDO("mysql:host=$host", $login, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $sql = "CREATE DATABASE $db";
    // $conn->exec($sql);
    // echo "BDD ready";
=======
    $pdo = new PDO("mysql:host=$host", $login, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    $pdo->exec($sql);
    echo "BDD ready";
>>>>>>> 540baac16e443747cfd73b9288dc6c092551048a


} catch (PDOException $e) {
    
    var_dump($e->getMessage()); 

} 


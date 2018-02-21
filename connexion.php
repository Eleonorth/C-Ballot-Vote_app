<?php

$host = '127.0.0.1'; 
$port = '3306';
$db = 'vote_bdd';
$login = 'root';
$password = '';

try {
    
    $pdo = new PDO("mysql:host=$host", $login, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    $pdo->exec($sql);
    echo "BDD ready";


} catch (PDOException $e) {
    
    var_dump($e->getMessage()); 

} 


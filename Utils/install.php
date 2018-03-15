<?php


include 'generics.php';

function CreateBDD() {
    $host = '127.0.0.1';
    $port = '3306';
    $db = 'vote_bdd';
    $login = 'root';
    $password = '';

    try {

        $conn = new PDO("mysql:host=$host;", $login, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE $db";
        $conn->exec($sql);
        echo "BDD ready";


    } catch (PDOException $e) {

        var_dump($e->getMessage());

    }
}

function CreateTable() {

    $query = file_get_contents('install.sql');
    $conn = connectDb();
    $stmt = $conn->prepare($query);

    if ($stmt->execute()) {
        return true;
    }
    else {
        return false;
    }

}


CreateBDD();
CreateTable();
onDeleteCascade();



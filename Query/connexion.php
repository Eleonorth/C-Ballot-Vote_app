<?php

function connectDb()
{
    $host = '127.0.0.1';
    $port = '3306';
    $db = 'vote_bdd';
    $login = 'root';
    $password = '';

    try {

        $conn = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $db, $login, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {

        var_dump($e->getMessage());

    }

    return $conn;
}

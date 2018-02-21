<?php

include 'script_table.sql';

//Method d'ajout et recup par Php

// $name dans Campaign par = $nameCampaign
// Pour éviter les erreurs de compréhension

function optionChoice($nameCampaign,$name){
    try {
        $pdo->exec("INSERT INTO `option` (`idoption`, `idcampaign`, `name`) VALUES ('','','')");
    } catch (PDOException $e) {
        pdoErrors();
    } finally {
        $pdo = null;
    }
}
<?php

include '../Utils/connexion.php';



// Fonction générique qui permet de créer un nouveau champ dans une table
function create($tablename,$fields,$data) {

    for ($i=0;$i<count($data);$i++) {

        $data[$i] = "'" . $data[$i] . "'";
    }


    $fields_values= implode(',',$fields);
    $data_values=implode(',',$data);


    $sql= 'INSERT INTO '.$tablename.' ('.$fields_values.') '.'VALUES'.'('.$data_values.')';

    $pdo = connectDb();
    $pdo->exec($sql);
    $newId = $pdo->lastInsertId();
    return $newId;

}

// Fonction générique qui permet de supprimer un champ dans un table
function delete ($tablename,$field,$id){

    $sql= 'DELETE FROM '.$tablename.' WHERE '.$field.'='.$id;

    $pdo = connectDb();
    $pdo->exec($sql);

}

// Fonction générique qui permet d'éditer un ou plusieurs champs dans un table
function edit($tablename,$field,$data,$wherefield, $id) {


    $sql= 'UPDATE '.$tablename.' SET ';
    for ($i=0;$i <count($field)-1; $i++) {

        $sql .= $field[$i].' = '."'".$data[$i]."',";

    }
        $sql .= $field[$i].' = '."'".$data[$i]."'";

    $sql .= ' WHERE '.$wherefield.' = '.$id;

    var_dump($sql);
    
    $pdo= connectDb();
    $pdo->exec($sql);

}

// Fonction qui récupère le nombre d'entrées dans une table
function getNumberofEntry($id,$tablename) {

    $sql = 'SELECT COUNT('.$id.') AS number FROM '.$tablename;
    $pdo= connectDb();
    $reponse = $pdo->query($sql);
    $donnees = $reponse->fetch();
    $number = (int) $donnees['number'];
    return $number;

}



// Fonction qui permet de rechercher un champ via un ID
//function searchById($data,$tablename,$id, $field) {
//
//    $data_values=implode(", ",$data);
//
//    $sql = 'SELECT '.$data_values.' FROM '.$tablename.' WHERE '.$field.' = '.$id;
//
//    var_dump($sql);
//}







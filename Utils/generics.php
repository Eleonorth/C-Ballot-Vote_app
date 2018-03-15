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

    
    $pdo= connectDb();
    $pdo->exec($sql);

}

// Fonction qui modifie les contraintes de tables pour faciliter la suppression
function onDeleteCascade(){

    $tablename = ["organization","campaign","invitation","choice","vote"];
    $foreignkey =["organization_ibfk_1","campaign_ibfk_1","invitation_ibfk_1","choice_ibfk_1","vote_ibfk_1"];
    $field = ["idperson","idorganization","idcampaign","idcampaign","idoption"];
    $primaryTablename = ["person","organization","campaign","campaign","choice"];

    for ($i=0; $i<count($tablename); $i++) {
        $sql = 'ALTER TABLE ' .$tablename[$i].' DROP FOREIGN KEY ' .$foreignkey[$i]. '; ALTER TABLE ' .$tablename[$i]. ' ADD CONSTRAINT ' .$foreignkey[$i]. ' FOREIGN KEY (' .$field[$i]. ') REFERENCES ' .$primaryTablename[$i]. '('.$field[$i].') ON DELETE CASCADE ON UPDATE CASCADE;';
        $pdo = connectDb();
        $pdo->exec($sql);
        $pdo = null;


    }

}



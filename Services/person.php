<?php


include '../Utils/generics.php';


// Créer des profils aléatoires selon un nombre donné
function createPerson($lastname, $firstname, $email, $mdp) {

    $fields = array('firstname', 'lastname', 'email', 'password');

    $data = array($firstname, $lastname, $email, $mdp);
    create('person', $fields, $data);

}


// Modifier les paramètres de la BBD pour supprimer
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

function deletePerson($id){

    onDeleteCascade();
    delete('person','idperson',$id);

}


// createRandomPerson();

//
//deletePerson(6);




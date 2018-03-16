<?php


include '../Utils/generics.php';


// Crée un profil utilisateur
function createPerson($lastname, $firstname, $email, $mdp) {

    $fields = array('firstname', 'lastname', 'email', 'password');

    $data = array($firstname, $lastname, $email, $mdp);
    create('person', $fields, $data);

}





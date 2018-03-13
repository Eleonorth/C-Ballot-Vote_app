<?php

session_start();

include 'person.php';

//Fonction qui vérifie si l'email entré est déjà existant dans la bdd
function verifMail() {

    $email = $_POST['email'];
    $pdo = connectDb();

    //Requête qui permet de sélectionner les emails
    $sql = $pdo->query("SELECT email FROM person WHERE email ='".$email."'");
    $sql_fetch = $sql->fetch();

    //Condition qui permet de comparer l'adresse entré et celle déjè présente
    if ($sql_fetch['email'] != $email) {
        checkField($email);
    }

}


//Fonction qui va vérifier les champs pour l'inscription
function checkField($email) {

    //Tous les postes mis en variables
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $mdp = $_POST['mdp'];
    $mdpConfirm = $_POST['confirmMdp'];

    if (!empty($lastname) || !empty($firstname) || !empty($email) || !empty($mdp) || !empty($mdpConfirm)) {

        if ($mdp == $mdpConfirm) {
            //Envoie à la fonction qui permet d'enregistrer l'utilisateur dans la bdd
            createPerson($lastname, $firstname, $email, md5($mdp));

        }
    }

}


verifMail();
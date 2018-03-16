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

    //Condition qui permet de comparer l'adresse entrée et celles déjà présentes
    if ($sql_fetch['email'] != $email) {

        checkField($email);
        header('Location:../index.php');

    } else {

        $_SESSION['error_message'] = "Email déjà existant veuillez choisir une autre adresse";
        header('Location:../index.php');
    }

}

//Fonction qui permet d'inscrire une personne dans la base de données
function checkField($email) {

    //Tous les post mis en variables
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $mdp = md5($_POST['mdp']);
    $mdpConfirm = $_POST['confirmMdp'];

    //Envoie à la fonction qui permet d'enregistrer l'utilisateur dans la bdd
    createPerson($lastname, $firstname, $email, $mdp);

}


verifMail();
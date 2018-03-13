<?php

session_start();

include 'person.php';


//Fonction qui permet de vérifier si les champs de connexion sont vides ou pas
function fieldConnection() {

    $login = $_POST['email'];
    $password = $_POST['mdp'];

    if (!empty($login) || !empty($password)) {
        connection($login, md5($password));
    }

}

//Fonction qui permet de ce connecter
function connection($login, $password) {

    $pdo = connectDb();


    //Requête SQL permettant de sélectionner les email et les mot de passes
    $sqlmail = $pdo->query("SELECT email, idperson FROM person WHERE email ='".$login."'");
    $sqlpwd = $pdo->query("SELECT password FROM person WHERE password ='".$password."'");

    //On parcourt les éléments sélectionné grâce à fecth
    $sqlmail_fetch = $sqlmail->fetch();
    $sqlpwd_fetch = $sqlpwd->fetch();

    //Compare les éléments récupérer avec les éléments entré
    if ($sqlmail_fetch['email'] == $login && $sqlpwd_fetch['password'] == $password) {
        $_SESSION['idperson'] = $sqlmail_fetch['idperson'];
        header('Location:../Vues/organization.php');
    } else {
        echo "FUCK !!!!!";
    }

}

fieldConnection();
<?php

include 'person.php';
session_start();


//Fonction qui permet de se connecter
function connection() {

    $login = $_POST['email'];
    $password = md5($_POST['mdp']);

    $pdo = connectDb();


    //Requête SQL permettant de sélectionner les email et les mots de passe
    $sqlmail = $pdo->query("SELECT email, idperson FROM person WHERE email ='".$login."'");
    $sqlpwd = $pdo->query("SELECT password FROM person WHERE password ='".$password."'");

    //Parcoure les éléments sélectionnés grâce à fecth
    $sqlmail_fetch = $sqlmail->fetch();
    $sqlpwd_fetch = $sqlpwd->fetch();

    //Compare les éléments récupérés avec les éléments entrés : sont-ils les mêmes?
    if ($sqlmail_fetch['email'] == $login && $sqlpwd_fetch['password'] == $password) {
        $_SESSION['idperson'] = $sqlmail_fetch['idperson'];
        header('Location:../Vues/profile.php');

    } else {

        $_SESSION['error_message'] = "Email ou mot de passe incorrect";
        header('Location:../index.php');
    }

}

connection();
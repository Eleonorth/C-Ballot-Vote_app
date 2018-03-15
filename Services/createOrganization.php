<?php
session_start();

include '../Utils/generics.php';


// Creation d'une organisation
// Récupère le contenu du formulaire de Vues/login.php et l'injecte dans la base de données
// Récupère l'ID utilisateur connecté avec la variable de session
function createOrganization() {

    $name =  $_POST['name'];
    $userId = $_SESSION['idperson'];
    $fields = array('idperson', 'name');
    $data = array($userId,$name);

    create('organization', $fields, $data);
    header('Location:../Vues/profile.php');
}


createOrganization();
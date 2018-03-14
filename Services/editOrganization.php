<?php
include '../Utils/generics.php';


// Crée une campagne de vote liée à une organisation (et donc à un compte utilisateur)

function editOrganization() {

    $name =  $_POST['name'];
    $userId = $_SESSION['idperson'];
    $fields = array('idperson', 'name');
    $data = array($userId,$name);

    create('organization', $fields, $data);
    header('Location:../Vues/profile.php');
}


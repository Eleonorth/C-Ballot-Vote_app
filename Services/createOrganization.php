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


// Edition d'une organisation
function editOrganization(){
    // soit un href avec l'id de l'organisation que je modifie avec un ?id avec un GET

    $newName = $_POST['newName'];

    $field= array('name');
    $data = array($newName);
    $wherefield = 'idorganization';
    $id = 1;


    edit('organization', $field,$data,$wherefield,$id);

}


// Suppression d'une organisation
function deleteOrganization() {
    // soit un href avec l'id de l'organisation que je modifie avec un ?id avec un GET
    $field='idorganzation';
    $id = 1;

    delete('organization',$field,$id);

}




createOrganization();
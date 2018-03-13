<?php
session_start();

include '../Utils/generics.php';


// Creation d'une organisation
function createOrganization() {

    $name =  $_POST['name'];
    $userId = $_SESSION['idperson'];
    $fields = array('idperson', 'name');
    $data = array($userId,$name);

    create('organization', $fields, $data);
}


// Edition d'une organisation
function editOrganization(){

    $newName = $_POST['newName'];

    $field= array('name');
    $data = array($newName);
    $wherefield = 'idorganization';
    $id = 1;


    edit('organization', $field,$data,$wherefield,$id);

}


// Suppression d'une organisation
function deleteOrganization() {

    $field='idorganzation';
    $id = 1;

    delete('organization',$field,$id);

}

createOrganization();
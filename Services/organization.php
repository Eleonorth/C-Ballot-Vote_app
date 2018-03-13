<?php
session_start();

include '../Utils/generics.php';


// Creation d'une organisation
function createOrganization() {

    $name =  $_POST['name'];
    $userId = $_SESSION['id'];
    $fields = array('idperson', 'name');
    $data = array($userId,$name);

    create('organization', $fields, $data);
}


// Edition d'une organisation
function editOrganization(){

    $newName = $_POST['newName'];

    $field= array('name');
    $data = array($newName);

    edit('organization', $field,$data,$wherefield,$id);

}

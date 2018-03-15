<?php
include '../Utils/generics.php';


// Edite une organisation

function editOrganization() {

    $name =  $_POST['newname'];
    $field = array('name');
    $data = array($name);
    $id = $_POST['id'];
    edit('organization',$field,$data,'organization.idorganization', $id);

    header('Location:../Vues/profile.php');

}

editOrganization();
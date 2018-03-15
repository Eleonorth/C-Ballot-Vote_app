<?php
include '../Utils/generics.php';


// Supprime une organisation en récupérant son ID via un POST

function deleteOrganization() {

    $id = $_POST['id'];
    delete('organization','idorganization',$id);
    header('Location:../Vues/profile.php');


}

deleteOrganization();
<?php
include '../Utils/generics.php';


// Supprime une organisation

function deleteOrganization() {

    $id = $_POST['id'];
    delete('organization','idorganization',$id);
    header('Location:../Vues/profile.php');


}

deleteOrganization();
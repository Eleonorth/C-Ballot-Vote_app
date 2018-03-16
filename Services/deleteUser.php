<?php
include '../Utils/generics.php';


// Supprime un profil utilisateur et tout ce qui lui est lié

function deleteUser() {

    $id = $_POST['id'];
    delete('person','idperson',$id);
    header('Location: logout.php');


}

deleteUser();

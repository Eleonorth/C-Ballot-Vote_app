<?php
include '../Utils/generics.php';


// Edite un profil utilisateur

function editProfile() {

    $lastname =  $_POST['lastname'];
    $firstname =  $_POST['firstname'];
    $email =  $_POST['email'];
    $id = $_POST['id'];

    $field = array('lastname','firstname','email');
    $data = array($lastname, $firstname, $email);

    edit('person',$field,$data,'idperson', $id);

    header('Location:../Vues/profile.php');

}

editProfile();
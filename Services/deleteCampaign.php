<?php
include '../Utils/generics.php';


// Supprime une campagne en récupérer son id via un POST

function deleteCampaign() {

    $id = $_POST['id'];
    delete('campaign','idcampaign',$id);
    header('Location:../Vues/profile.php');


}

deleteCampaign();
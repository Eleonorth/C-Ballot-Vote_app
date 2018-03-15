<?php
include '../Utils/generics.php';


// Supprime une campagne

function deleteCampaign() {

    $id = $_POST['id'];
    delete('campaign','idcampaign',$id);
    header('Location:../Vues/profile.php');


}

deleteCampaign();
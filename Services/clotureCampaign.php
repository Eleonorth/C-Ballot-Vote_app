<?php
include '../Utils/generics.php';

$id = $_GET['id'];

// Clôturer une campagne

function clotureCampaign($id) {

    $enddate = date("Y-m-d");
    $field = array('enddate');
    $data = array($enddate);
    edit('campaign',$field,$data,'campaign.idcampaign', $id);
    header("Location:../Vues/profile.php");

}

clotureCampaign($id);
<?php
include '../Utils/generics.php';


// Edite une campagne

function editCampaign() {

    $name =  $_POST['newname'];
    $number = $_POST['newnumber'];
    $field = array('name','numberoptions');
    $data = array($name, $number);
    $id = $_POST['id'];
    edit('campaign',$field,$data,'campaign.idcampaign', $id);

    header('Location:../Vues/profile.php');

}

function editChoices (){

    $id = $_POST['id'];
    $name = $_POST['options'];
    $field = array('name');
    $data = array($name);

    edit('choice',$field,$data,'idcampaign', $id);

    header('Location:../Vues/profile.php');


}

editCampaign();
editChoices();
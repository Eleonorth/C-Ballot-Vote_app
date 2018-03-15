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


}

function editChoices ()
{
    $names = $_POST['option'];
    $idchoice = $_POST['idchoice'];
    $length = count($idchoice);

    for($i=0;$i<$length;$i++) {

        $field = array('name');
        $data = array($names[$i]);
        edit('choice',$field,$data,'idoption',$idchoice[$i]);
        }

    $newoptions = $_POST['newOption'];
    $lengthtab = count($newoptions);

    for($i=0;$i<$lengthtab;$i++) {

        $id = $_POST['id'];
        $field= array('name','idcampaign');
        $data = array($newoptions[$i],$id);
        create('choice',$field,$data);
    }



}

function newVoters() {

    $id = $_POST['id'];
    $emails = $_POST['emails'];
    $email = explode(',',$emails);
    $length= count($email);

    for($i=0;$i<$length;$i++) {

        $fields = array('idcampaign', 'email', 'code','hasvoted');
        $data = array($id,$email[$i],md5(uniqid()),'0');
        create('invitation', $fields, $data);
    }
    header('Location:../Vues/profile.php');


}

editCampaign();
editChoices();
newVoters();
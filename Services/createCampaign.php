<?php
include '../Utils/generics.php';


// Crée une campagne de vote liée à une organisation (et donc à un compte utilisateur)

function createCampaign() {

    $idorganization = $_POST['id'];
    $startdate= $_POST['startdate'];
    $enddate= $_POST['enddate'];
    $numberoptions= $_POST['numberoptions'];
    $name = $_POST['name'];
    $fields =array('idorganization','name','startdate','enddate','numberoptions');
    $data=array($idorganization,$name,$startdate,$enddate,$numberoptions);

   $newid= create('campaign',$fields,$data);

   return $newid;

}

// Définit les choix
function setChoices($idcampaign){

    $options= $_POST['option'];
    $length = count($options);

    for($i=0;$i<$length;$i++) {

        $fields = array('idcampaign', 'name');
        $data = array($idcampaign, $options[$i]);
        create('choice', $fields, $data);
    }

}

// Crée la campagne et envoie les invitations
function sentInvites() {

    $idcampaign = createCampaign();
    setChoices($idcampaign);

    $emails = $_POST['emails'];
    $email = explode(',',$emails);
    $length= count($email);

    for($i=0;$i<$length;$i++) {

    $fields = array('idcampaign', 'email', 'code','hasvoted');
    $data = array($idcampaign,$email[$i],md5(uniqid()),'0');
    create('invitation', $fields, $data);
    }
    header('Location:../Vues/profile.php');


}

sentInvites();

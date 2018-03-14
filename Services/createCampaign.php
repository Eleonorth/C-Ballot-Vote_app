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

// Crée la campagne et envoie les invitations
function sentInvites() {

    $idcampaign = createCampaign();
    $fields = array('idcampaign', 'email', 'code', 'emailsent','hasvoted');
    $data = array($idcampaign,'zut',md5(uniqid()),'1','0');
    create('invitation', $fields, $data);

}

sentInvites();

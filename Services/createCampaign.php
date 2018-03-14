<?php
include '../Utils/generics.php';


// pour récupérer toutes les organisations d'une personne et les mettre dans un menu déroulant
// SELECT name FROM organization WHERE idperson = $_SESSION['id']


// Crée une campagne de vote liée à une organisation (et donc à un compte utilisateur)
// Définit les choix
function createCampaign() {

    $idorganization = $_POST['id'];
    $name = $_POST['name'];
    $fields =array('idorganization','name','startdate','enddate','numberoptions');
    $data=array($idorganization,$name,'2018-03-07','2018-03-07',4);

   $newid= create('campaign',$fields,$data);

   $options = $_POST['textarea'];

   echo $options;
   return $newid;

}



// Crée la campagne et envoie les invitations
function sentInvites() {

    $idcampaign = createCampaign();
    $fields = array('idcampaign', 'email', 'code', 'emailsent','hasvoted');
    $data = array($idcampaign,'zut',md5(uniqid()),'1','0');
    create('invitation', $fields, $data);

}

sentInvites();

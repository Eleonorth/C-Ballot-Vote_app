<?php
include '../Utils/generics.php';


// pour récupérer toutes les organisations d'une personne et les mettre dans un menu déroulant
// SELECT name FROM organization WHERE idperson = $_SESSION['id']


// Crée une campagne de vote liée à une organisation (et donc à un compte utilisateur)
// Définit les choix
// Envoie les invitations


function createCampaign() {

    $name = $_POST['name'];
    $fields =array('idorganization','name','startdate','enddate','numberoptions');
    $data=array(2,$name,'2018-03-07','2018-03-07',4);

   $newid= create('campaign',$fields,$data);

   echo $newid;

}




//
//// générer le code unique pour les invitations : md5(uniqid());
//
//
//function sentInvites() {
//
//    $fields = array('idcampaign', 'email', 'code', 'emailsent','hasvoted');
//    $data = array();
//    create('invitation', $fields, $data);
//
//
//}

createCampaign();


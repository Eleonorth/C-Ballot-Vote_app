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

function editChoices ()
{
    $names = $_POST['option'];
    $idchoice = $_POST['idchoice'];
    $length = count($idchoice);

    for($i=0;$i<$length;$i++) {

        $field = array('name');
        $data = array($names[$i]);
        edit('choice',$field,$data,'idoption',$idchoice[$i]);
        // ajouter insert pour les nouveaux choix
        }


    header('Location:../Vues/profile.php');
}


editCampaign();
editChoices();
<?php


include '../Utils/generics.php';

// Génère des invitations par mail

function sentInvitations(){

    $nb =  $_POST['nbr'];
    $nbr = (int)$nb;

    $faker= Faker\Factory::create();
    $fields = array('idcampaign', 'email', 'code', 'emailsent','hasvoted');

    $nbtask = getNumberofEntry(idcampaign,campaign);


    for($ii=1;$ii<=$nbtask;$ii++){

        for($i = 0 ; $i < $nbr ; $i ++){

        $data = array(rand(1,$nbtask), $faker->email, rand(0, 100), rand(0, 1),rand(0, 1));
        create('invitation', $fields, $data);

        }
    }

    header('Location: index.php');
}

sentInvitations();




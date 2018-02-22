<?php


include '../vendor/autoload.php';
include 'generics.php';


// Génère des invitations par mail
function sentInvitations() {

    // mails aléatoires
    // code aléatoires
    // emailsent = 0 pour false et 1 pour true aléatoire


    $nb =  $_POST['nbrinvite'];
    $nbr = (int)$nb;

    var_dump($nbr);
    $faker= Faker\Factory::create();
    $fields = array('idcampaign', 'email', 'code', 'emailsent');

    for($i=0;$i<=$nbr;$i++) {

        $data = array(1, $faker->email, rand(0,100),rand(0,1));
        create('invitation', $fields, $data);
    }

    header('Location: index.php');
}


sentInvitations();

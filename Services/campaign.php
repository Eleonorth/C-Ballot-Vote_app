<?php

include '../Utils/generics.php';


function createRandomCampaign() {

    $nb =  $_POST['nbr'];
    $nbr = (int)$nb;


    $faker= Faker\Factory::create();
    $fields = array('idorganization', 'name', 'startdate', 'enddate', 'numberoptions');


    $number = getNumberofEntry('idorganization', 'organization');

    for($i=0;$i<$nbr;$i++) {

        $data = array(rand(1,$number), $faker->name, '2018-02-01 00:00:00', '2018-02-26 00:00:00', $faker->randomDigitNotNull);
        create('campaign', $fields, $data);
    }

     header('Location: index.php');

}


// Recherche le nombre d'options à créer dans une campagne
function getNumberOptions($idcampaign) {

    $sql = 'SELECT numberoptions AS number FROM campaign WHERE idcampaign ='.$idcampaign;
    $pdo= connectDb();
    $reponse = $pdo->query($sql);
    $donnees = $reponse->fetch();
    $number = (int) $donnees['number'];
    return $number;

}

// Crée des options aléatoires lorsqu'une campagne est générée
function createRandomChoices() {

    $faker= Faker\Factory::create();
    $fields = array('idcampaign', 'name');


    $number= getNumberofEntry('idcampaign','campaign');

    for($i=1;$i<=$number;$i++) {

        $results = getNumberOptions($i);
        $randomint= rand($results+1,10);
        for ($j=0;$j<=$randomint;$j++) {

            $data = array($i, $faker->firstName);
            create('choice', $fields, $data);
        }

    }

}

createRandomCampaign();
createRandomChoices();
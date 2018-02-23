<?php

include 'generics.php';
include '../vendor/autoload.php';


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

createRandomChoices();

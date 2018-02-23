<?php
include '../vendor/autoload.php';
include 'generics.php';



// Creation d'une organisation
function createOrganization() {

    $nb =  $_POST['nbr'];
    $nbr = (int)$nb;


    $faker= Faker\Factory::create();
    $fields = array('idperson', 'name');


    $number = getNumberofEntry('idperson','person');

    for($i=0;$i<$nbr;$i++) {

        $data = array(rand(1,$number), $faker->name);
        create('organization', $fields, $data);

    }

    header('Location: index.php');
}

createOrganization();

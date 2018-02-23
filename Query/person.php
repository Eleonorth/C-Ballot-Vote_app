<?php

include '../vendor/autoload.php';
include 'generics.php';


// Créer des profils aléatoires selon un nombre donné
function createRandomPerson() {

    $nb =  $_POST['nbr'];
    $nbr = (int)$nb;

    var_dump($nbr);
    $faker= Faker\Factory::create();
    $fields = array('firstname', 'lastname', 'email', 'password');

    for($i=0;$i<$nbr;$i++) {

        $data = array($faker->firstName, $faker->lastName, $faker->email, $faker->name);
        create('person', $fields, $data);
    }

    header('Location: index.php');
}


createRandomPerson();









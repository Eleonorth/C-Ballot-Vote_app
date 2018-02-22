<?php

include '../vendor/autoload.php';
include 'generics.php';


// Créer des profils aléatoires selon un nombre donné
function createRandomPerson($nb) {

    $faker= Faker\Factory::create();
    $fields = array('firstname', 'lastname', 'email', 'password');

    for($i=0;$i<=$nb;$i++) {

        $data = array($faker->firstName, $faker->lastName, $faker->email, $faker->name);
        create('person', $fields, $data);
    }

}





<?php
include '../vendor/autoload.php';
include 'generics.php';



// Creation d'une organisation 
function createOrganization() {

    $nb =  $_POST['nbrinvite'];
    $nbr = (int)$nb;


    $faker= Faker\Factory::create();
    $fields = array('idperson', 'name');

    $sql = 'SELECT COUNT(idperson) AS number FROM organization';
    $pdo = connectDb();
    $reponse = $pdo->query($sql);
    $donnees = $reponse->fetch();
    $number = (int) $donnees['number'];

    for($i=0;$i<$nbr;$i++) {

        $data = array(rand(1,$number), $faker->name);
        create('organization', $fields, $data);

    }

    header('Location: index.php');
}

createOrganization();

// Edition d'une organisation


/*function editOrganization(&$conn,$idorganization,$newname) {

    $conn->exec('UPDATE `organization` SET `name` = $newname WHERE `idorganization` = $idorganization)');

    echo 'Edition succeeded !';
}


// Suppression d'une organisation

function deleteOrganization(&$conn,$idorganization) {

    $conn->exec('DELETE FROM `organization` WHERE `idorganization` = $idorganization)');

    echo 'Deletion succeeded !';

} 

// Recherche d'une organisation par son nom 

function searchOrganization(&$conn,$idperson) {

    $results = $conn->query('SELECT `idorganization`, `name` FROM `organization` 
                            INNER JOIN `person` ON `organization`.`idperson`=`person`.`idperson`
                             WHERE `idperson` LIKE $idperson)');

    while($result = $results->fetchAll()) {

	    var_dump($result['idorganization'], $result['name']);

    }

}*/





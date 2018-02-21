<?php

include 'connexion.php';



// Creation d'une organisation 
function createOrganization(&$conn,$lastname,$name) {

    $conn->exec('INSERT INTO `organization` (`idperson`, `name`) 
                VALUES ( (SELECT idperson FROM person WHERE lastname = $lastname), $name)');

    echo 'Creation succeeded !';

}

// Edition d'une organisation


function editOrganization(&$conn,$name,$newname) {

    $conn->exec('UPDATE `organization` SET `name` = $newname WHERE `name` = $name)');

    echo 'Edition succeeded !';
}


// Suppression d'une organisation

function deleteOrganization(&$conn,$name) {

    $conn->exec('DELETE FROM `organization` WHERE `name` = $name)');

    echo 'Deletion succeeded !';

} 

// Recherche d'une organisation par son nom 

function searchOrganization(&$conn,$name) {

    $results = $conn->query('SELECT `name`,`firstname`,`lastname` FROM `organization` 
                            INNER JOIN `person` ON `organization`.`idperson`=`person`.`idperson`
                             WHERE `name` LIKE $name)');

    while($result = $results->fetchAll()) {

	    var_dump($result['name'], $result['firstname'], $result['lastname']);

    }

}





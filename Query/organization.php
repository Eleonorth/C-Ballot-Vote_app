<?php

include 'connexion.php';



// Creation d'une organisation 
function createOrganization(&$conn,$lastname,$name) {

    $conn->exec('INSERT INTO `organization` (`idperson`, `name`) 
                VALUES ( (SELECT idperson FROM person WHERE lastname = $lastname), $name)');

    echo 'Creation succeeded !';

}

// Edition d'une organisation


function editOrganization(&$conn,$idorganization,$newname) {

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

}





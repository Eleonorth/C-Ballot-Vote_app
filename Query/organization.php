<?php

include 'connexion.php';



// Creation d'une organisation 
function createOrganization(&$conn,$lastname,$name) {

$conn->exec(INSERT INTO `organization` (`idorganization`, `idperson`, `name`) VALUES ('', (SELECT idperson FROM person WHERE lastname = $lastname), $name););

echo 'Creation succeed !';
}



// Edition d'une organisation


function editOrganization(&$conn,$name,$newname) {

$conn->exec(UPDATE `organization` SET `name` = $newname WHERE `name` = $name;);

echo 'Edition succeed !';

}


// Suppression d'une organisation

function deleteOrganization(&$conn,$name) {

$conn->exec(DELETE FROM `organization` WHERE `name` = $name;);

echo 'Deletion succeed !';

} 

// Recherche d'une organisation par son nom 

function searchOrganization(&$conn,$name) {

$results = $conn->exec(SELECT * FROM `organization` WHERE `name` LIKE $name;);

while($result = $results->fetchAll()) {

	var_dump($result);

}


}



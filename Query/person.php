<?php
include 'connexion.php';

//Créer une personne
//function createPerson($email, $password, $firstname, $lastname)
//{
//    $conn = connectDb();
//    $sql = "INSERT INTO person(email,password,firstname,lastname)VALUES('$email','$password','$firstname','$lastname')";
//    $conn->exec($sql);
//    var_dump($sql);
//
//
//
//
//}
//
////Editer l'email
//function editEmail(&$conn, $email, $idperson)
//{
//    $conn->exec("UPDATE person SET email = $email WHERE idperson = $idperson");
//}
//
////Editer le mot de passe
//function editPassword(&$conn, $password, $idperson)
//{
//    $conn->exec("UPDATE person SET password = $password WHERE idperson = $idperson");
//}
//
////Editer le prénom
//function editFirstname(&$conn, $firstname, $idperson)
//{
//    $conn->exec("UPDATE person SET firstname = $firstname WHERE idperson = $idperson");
//}
//
////Editer le nom
//function editLastname(&$conn, $lastname, $idperson)
//{
//    $conn->exec("UPDATE person SET lastname = $lastname WHERE idperson = $idperson");
//}
//
////Supprimer une personne
//function deletePerson(&$conn, $idperson)
//{
//    $conn->exec("DELETE FROM person WHERE idperson = $idperson");
//}
//
//
////Rechercher une personne
//function searchPerson(&$conn,$idperson)
//{
//    $conn->query("SELECT * FROM person WHERE idperson = $idperson");
//}
//
//// Rechercher une personne par l'ID de son organisation
//
//function searchByOrganization(&$conn,$idorganization)
//{
//    $conn->query("SELECT * FROM person
//                  INNER JOIN organization ON person.idperson = organization.idperson
//                  WHERE idorganization = $idorganization");
//}






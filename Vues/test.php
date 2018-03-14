<?php
include '../Utils/Connexion.php';

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
      <title>Test</title>
</head>
<body>

    <?php

    $sql = ' SELECT name FROM organization WHERE idperson = $_SESSION['id']';
    $pdo = connectDb();
    $data = $pdo->exec($sql);
    
       ?>


</body>
</html>

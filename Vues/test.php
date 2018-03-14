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

    $sql = " SELECT name FROM organization WHERE `idperson` = '6'";
    $pdo = connectDb();
    $data = $pdo->query($sql);

       ?>

<table>
    <thread>
        <tr>
            <th>Nom de l'organisation</th>
        </tr>
    </thread>
<tbody>
<?php
    while ($results = $data->fetch()){

        ?>
<tr>
    <td><?php echo $results['name']?></td>
</tr>
<?php
} ?>




</tbody>
</table>

</body>
</html>

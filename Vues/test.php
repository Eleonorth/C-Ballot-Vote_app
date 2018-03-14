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
    $id = $_SESSION['idperson'];
    $pdo = connectDb();

    $request = "SELECT firstname, lastname, email FROM person WHERE idperson = $id";
    $profile= $pdo->query($request);


    $sql = " SELECT name FROM organization WHERE `idperson` = $id";
    $data = $pdo->query($sql);

    $sql2 = " SELECT organization.name, campaign.name, startdate, enddate FROM campaign
                  INNER JOIN organization ON campaign.idorganization=organization.idorganization 
                  INNER JOIN person ON organization.idperson=person.idperson
                  WHERE person.idperson = $id
                  ORDER BY campaign.idorganization ASC";
    $datas = $pdo->query($sql2);


?>

<?php
$user = $profile->fetch();
?>
<p> Nom : <?php echo $user['lastname'] ?></p>
<p> Prénom : <?php echo $user['firstname'] ?> </p>
<p> Adresse mail : <?php echo $user['email'] ?></p>


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


    <table>
        <thread>
            <tr>
                <th>Nom de l'organisation</th>
                <th>Nom de la campagne</th>
                <th>Date de début</th>
                <th>Date de fin</th>
            </tr>
        </thread>
        <tbody>
        <?php
        while ($result = $datas->fetch()){

            ?>
            <tr>
                <td><?php echo $result[0]?></td>
                <td><?php echo $result[1]?></td>
                <td><?php echo $result[2]?></td>
                <td><?php echo $result[3]?></td>
            </tr>
            <?php
        } ?>




        </tbody>
    </table>


<form action="../Services/createCampaign.php" method="post">
    <input placeholder="Nom de la campagne"  type="text" name="name">
    <button class="btn btn-primary" type="submit">Valider</button>
</form>


</body>
</html>

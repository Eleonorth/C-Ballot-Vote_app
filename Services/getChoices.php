<?php
include '../Utils/connexion.php';

$pdo = connectDb();
$stmt = $pdo->query('SELECT * FROM choice');

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
while ($data = $stmt->fetch()) {
    ?>
    <form action="hasVoted.php" method="post">
        <input type="radio" name="idoption" value="male"><?php echo $data['name']; ?><br>
        <?php
        };
        ?>
        <button type="submit" class="btn btn-light">Valider</button>
    </form>

</body>
</html>

<?php
include '../Utils/connexion.php';

$pdo = connectDb();
$idcampaign = $_GET['id'];
$stmt = $pdo->query('SELECT name, idoption FROM choice WHERE idcampaign ='. $idcampaign);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../src/style.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Finger+Paint|PT+Sans+Narrow" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php"><h1>C-Ballot</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">Mon profil<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form action="../Services/logout.php">
            <button type="submit" id="logout" class="btn btn-light" style="float: right">
                <img src="../src/logout.svg" width="20" height="20">
                <span class="gestion">Se déconnecter</span>
            </button>
        </form>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col">
            <?php

            while ($data = $stmt->fetch()) {
            ?>
            <form class="form-group" action="../Services/hasVoted.php" method="post">
                <input type="hidden" name="idoption" value="<?php echo $data['idoption']; ?>">
                <input type="radio" name="name[]" value="<?php echo $data['idoption']; ?>"><?php echo $data['name']; ?><br>
                <?php }; ?>
                <button type="submit" class="btn btn-light">Valider</button>
            </form>
        </div>
    </div>
</div>

<footer>
    C-Ballot &#169; 2018 - Hein Team
</footer>

</body>
</html>

<?php
session_start();

include '../Utils/connexion.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../src/style.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Finger+Paint" rel="stylesheet">
    <title>Modifier une campagne</title>

</head>

<body>

<?php
$id = $_GET['id'];
$pdo = connectDb();


$sql = "SELECT name, numberoptions FROM campaign WHERE campaign.idcampaign=$id";
$datas = $pdo->query($sql);

$sql2 = "SELECT name FROM choice WHERE idcampaign=$id";
$data = $pdo->query($sql2);

?>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">
        <img src="../src/logo.png" width="200" height="100" class="d-inline-block align-top" alt="">
    </a>
    <h1>C-Ballot</h1>
</nav>

<div class="container">

    <div class="row">

        <div class="col-0 col-sm-0 col-md-0 col-lg-3 col-xl-3"></div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <h2>Modifier une campagne</h2>
            <br>
            <form class="form-group" action="../Services/editCampaign.php" method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">

                <?php
                    $results = $datas->fetch();
                ?>
<!--                <input type="hidden" name="id" value="--><?php //echo $_GET['id']?><!--">-->
                <label for="campaignName">Nom de la campagne :</label>
                <input type="text" id="campaignName" name="newname" value="<?php echo $results[0]?>" class="form-control">

                <label for="optionsNb">Nombre de choix à faire :</label>
                <input type="number" id="optionsNb" name="newnumber" value="<?php echo $results[1]?>" class="form-control">


                <label for="options">Options de vote : </label>
                <?php
                while ($result = $data->fetch()){

                ?>

                <input type="text" id="options" name="options" value="<?php echo $result['name']?>" class="form-control">

                <?php }
                ?>
                <span><img src="../src/plus.svg" width="19" height="19" alt="Ajouter une option"> Ajouter une option</span>

                <label for="emails">Ajouter des votants :</label>
                <textarea id="emails" name="" class="form-control"></textarea>

                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <button type="submit" class="btn btn-light">Modifier la campagne</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>


            </form>
        </div>
        <div class="col-0 col-sm-0 col-md-0 col-lg-3 col-xl-3"></div>

    </div>

    <div class="row"><br></div>


    <footer>
        C-Ballot &#169; 2018 - Hein Team
    </footer>

</div>


</body>

</html>
<?php
include '../Services/class-vote.php';

$dbh = new Database('vote');
$db = $dbh->getPDO();

$nbchoix = $db->query("SELECT MAX(idoption) FROM vote")->fetchColumn();

if ((isset($_POST['sub']) AND $_POST['sub']=='Afficher')) {
    for ($id=0; $id<=$nbchoix; $id++) {
        $optvote = $db->query("SELECT COUNT(*) AS idoption FROM vote WHERE idoption=$id")->fetchColumn();
        $choix = $db->query("SELECT name FROM choice WHERE idoption=$id")->fetchColumn();
        $dataPoints = array("label"=> "$choix", "y"=> $optvote);
        $array[] = $dataPoints;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Résultat du vote</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../src/style.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Finger+Paint" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title:{
                    text: "Résultats du vote :"
                },
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    yValueFormatString: "฿#,##0",
                    dataPoints: <?php echo json_encode($array, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
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
                    <a class="nav-link" href="profile.php">Mon profil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer mes informations
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="editProfile.php">Modifier mon profil</a>
                        <a class="dropdown-item" href="deleteUser.php" style="color: #F3193A">Supprimer mon compte</a>
                    </div>
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

        <div class="row"><br></div>

        <div class="row">
            <form class="form" action="" method="post" enctype="multipart/form-data">
                <button type="submit" name="sub" class="btn btn-dark">Afficher les résultats</button>
            </form>
        </div>

        <div class="row"><br></div>

        <div class="row">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script class="diagram" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>

        <div class="row">
            <div class="col"></div>
            <div class="col">
                <?php
                $idcampaign = $_GET['id'];

                if ((isset($_POST['sub']) AND $_POST['sub']=='Afficher')) {
                $nbvotes = $db->query("SELECT COUNT(*) FROM vote")->fetchColumn();
                ?><br/>
                <?php
                echo "<strong style='font-size:30px; border-radius:50px; color:#F3193A;'>Total votes : $nbvotes</strong>";
                ?><br/><br/>
                <?php
                for ($id=0; $id<=$nbchoix; $id++) {
                $optvote = $db->query("SELECT COUNT(*) AS idoption FROM vote WHERE idoption=$id")->fetchColumn();
                $choix = $db->query("SELECT name FROM choice WHERE idoption=$id")->fetchColumn();


                ?>
            </div>
            <div class="col"></div>
        </div>

        <div class="row">
            <div class="col"></div>
            <div class="col">
                <?php
                echo "<strong style='font-size:30px;'>Total $choix: $optvote</strong>";
                $dataPoints = array("label"=> "Option $id", "y"=> $optvote);
                $array[] = $dataPoints;
                }
                }
                ?>
            </div>
            <div class="col"></div>
        </div>

        <div class="row"><br></div>
        <div class="row"><br></div>

    </div> <!-- Fin du container -->

    <footer>
        C-Ballot &#169; 2018 - Hein Team
    </footer>

</body>
</html>

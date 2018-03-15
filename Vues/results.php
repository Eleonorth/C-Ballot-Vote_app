<?php
include 'class-vote.php';
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
    <title></title>
    <link rel="stylesheet" href="style.css" />
    <div class="">

    </div>
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
<section id="content">
    <center>
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <input type="submit" value="Afficher" name="sub"</>
        <br/><br/><br/>
        </form>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script class="diagram" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


        <?php
        if ((isset($_POST['sub']) AND $_POST['sub']=='Afficher')) {
            $nbvotes = $db->query("SELECT COUNT(*) FROM vote")->fetchColumn();
            ?><br/><br/><br/><br/>
            <?php
            echo "<strong style='font-size:30px; border-radius:50px; color:red;'>Total votes : $nbvotes</strong>";
            ?><br/><br/><?php
            for ($id=0; $id<=$nbchoix; $id++) {
                $optvote = $db->query("SELECT COUNT(*) AS idoption FROM vote WHERE idoption=$id")->fetchColumn();
                $choix = $db->query("SELECT name FROM choice WHERE idoption=$id")->fetchColumn();
                ?><br/>
                <?php
                echo "<strong style='font-size:30px;'>Total $choix: $optvote</strong>";
                $dataPoints = array("label"=> "Option $id", "y"=> $optvote);
                $array[] = $dataPoints;
            }
        }
        ?>
    </center>
</section>
</body>
</html>

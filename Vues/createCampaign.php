<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../src/style.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Finger+Paint" rel="stylesheet">
    <title>Créer une campagne</title>

</head>

<body>
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
            <h2>Créer une campagne</h2>
            <br>
            <form class="form-group" action="../Services/createCampaign.php" method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                <label for="campaignName">Nom de la campagne :</label>
                <input type="text" id="campaignName" name="name" class="form-control">

                <label for="startDate">Date de début :</label>
                <input type="date" id="startDate" name="startdate" class="form-control">

                <label for="endDate">Date de fin :</label>
                <input type="date" id="endDate" name="enddate" class="form-control">

                <label for="optionsNb">Nombre de choix attendus :</label>
                <input type="number" id="optionsNb" name="numberoptions" class="form-control">

                <label for="options">Options de vote : </label>
                <input type="text" id="options" name="" class="form-control">
                <span><img src="../src/plus.svg" width="19" height="19" alt="Ajouter une option"> Ajouter une option</span>


                <label for="emails">Emails des votants :</label>
                <textarea name="textarea" id="emails" class="form-control" ></textarea>

                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <button type="submit" class="btn btn-light">Créer la campagne</button>
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
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
                    <a class="nav-link" href="../Vues/profile.php">Mon profil<span class="sr-only">(current)</span></a>
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

                    <label for="optionsNb">Nombre de choix à faire :</label>
                    <input type="number" id="numberoptions" name="numberoptions" class="form-control">

                    <label for="options">Options de vote : </label>
                    <input type="text" id="options" name="option[]" class="form-control">
                    </br>
                    <span id="span0"></span>
                    <a href="javascript:addField()">
                        <span style="color: #FFFFFF">
                            <img src="../src/plus.svg" width="19" height="19" alt="Ajouter une option">
                            Ajouter une option
                        </span>
                    </a>

                    <label for="emails">Emails des votants :</label>
                    <textarea id="emails" name ="textarea" class="form-control"></textarea>

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

    <script>

        //Variable à incrémenter
        var i = 0;
        //Variable qui contient un saut de ligne pour éviter d'avoir un message undefined
        var input = '<br>';

        //Fonction qui permet d'ajouter des inputs dans le fomulaire
        function addField() {

            var recup_field = document.getElementById('span'+i);
            i++;
            input = '<input class=form-control name="option[]"></br><span id=\"span'+i+'\"></span>';
            var create_field = recup_field.innerHTML = input;
        }

    </script>

</body>

</html>
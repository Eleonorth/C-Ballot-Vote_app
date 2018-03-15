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
    <title>Modifier une organisation</title>

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
                    <a class="nav-link" href="#">Mon profil<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <button id="logout" class="btn btn-light" style="float: right">
                <img src="../src/logout.svg" width="20" height="20">
                <span class="gestion">Se déconnecter</span>
            </button>
        </div>
    </nav>

    <div class="container">

        <div class="row">

            <div class="col-0 col-sm-0 col-md-0 col-lg-3 col-xl-3"></div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h2>Modifier une organisation</h2>
                <br>
                <form class="form-group" action="../Services/editOrganization.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                    <label for="organizationName">Nom de l'organisation :</label>
                    <input type="text" id="organizationName" name="newname" class="form-control">

                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-light">Modifier l'organisation</button>
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
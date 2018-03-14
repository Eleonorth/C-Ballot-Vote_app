<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="src/style.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Finger+Paint" rel="stylesheet">
    <title>C-Ballot</title>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="src/logo.png" width="200" height="100" class="d-inline-block align-top" alt="">
        </a>
        <h1>C-Ballot</h1>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-0 col-sm-0 col-md-1 col-lg-1 col-xl-1"></div>
            <div id="description" class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <h2>Qui sommes-nous ?</h2>
                <p>
                    C-Ballot est une plateforme de vote en ligne qui vous permet de créer une organisation
                    ainsi que des campagnes de votes liées à votre organisation.
                    <br>
                    Vous pouvez donc ouvrir une campagne, ajouter des choix de votes et une liste de votants, et le tour est joué !
                    <br>
                    Et si vous changez d'avis, vous pouvez arrêter une campagne à tous moments.
                </p>
            </div>
            <div class="col-0 col-sm-0 col-md-1 col-lg-1 col-xl-1"></div>
        </div>

        <div class="row">

            <div id="login" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h2>Se connecter</h2>
                <form class="form-group" action="Services/login.php"  method="post">
                    <label>Email :</label>
                    <input type="email" name="email" class="form-control">

                    <label>Mot de passe :</label>
                    <input type="password" name="mdp" class="form-control">
                    <hr>

                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-light">Connexion</button>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>

                </form>
            </div>

            <div id="register" class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h2>S'inscrire</h2>
                <form class="form-group" action="Services/signup.php" method="post">
                    <label>Nom :</label>
                    <input type="text" name="lastname" class="form-control">

                    <label>Prénom :</label>
                    <input type="text" name="firstname" class="form-control">

                    <label>Email :</label>
                    <input type="email" name="email" class="form-control">

                    <label>Mot de passe :</label>
                    <input type="password" name="mdp" class="form-control">

                    <label>Confirmation mot de passe :</label>
                    <input type="password" name="confirmMdp" class="form-control">
                    <hr>

                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-light">S'inscrire</button>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>

                </form>
            </div>

        </div>

        <div class="row"><br></div>


    <footer>
        C-Ballot &#169; 2018 - Hein Team
    </footer>

    </div>  <!-- Fin du container -->

</body>
</html>


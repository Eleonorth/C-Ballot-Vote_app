<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="src/style.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Finger+Paint|PT+Sans+Narrow" rel="stylesheet">
    <title>C-Ballot</title>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.html">
            <img src="src/logo.png" width="200" height="100" class="d-inline-block align-center" alt="">
            <h1>C-Ballot</h1>
        </a>
    </nav>

    <div class="container">

        <div class="row">
            <div id="description" class="col">
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
        </div>

        <div class="row">

            <div id="login" class="col">
                <h2>Se connecter</h2>
                <form class="form-group" action="../Services/login.php"  method="post">
                    <label>Email :</label>
                    <input type="email" name="email" class="form-control">

                    <label>Mot de passe :</label>
                    <input type="password" name="mdp" class="form-control">

                    <button type="submit">Connexion</button>
                </form>
            </div>

            <div id="register" class="col">
                <h2>S'inscrire</h2>
                <form class="form-group" action="../Services/signup.php" method="post">
                    <label>Nom :</label>
                    <input type="text" name="lastname" class="form-control">

                    <label>Prénom</label>
                    <input type="text" name="firstname" class="form-control">

                    <label>Email :</label>
                    <input type="email" name="email" class="form-control">

                    <label>Mot de passe :</label>
                    <input type="password" name="mdp" class="form-control">

                    <label>Confirmation mot de passe :</label>
                    <input type="password" name="confirmMdp" class="form-control">

                    <button type="submit">S'inscrire</button>
                </form>
            </div>
        </div>

        <div class="row">allo</div>


    <footer>
        C-Ballot &#169; 2018 - Hein Team
    </footer>

    </div>  <!-- Fin du container -->

</body>
</html>


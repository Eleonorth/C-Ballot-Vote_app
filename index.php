<?php
session_start();

if(isset($_SESSION['error_message'])) {
    $error = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

if(isset($_SESSION['success_message'])) {
    $success = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><h1>C-Ballot</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Vues/profile.php">Mon profil <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form action="Services/logout.php">
            <button type="submit" id="logout" class="btn btn-light" style="float: right">
                <img src="src/logout.svg" width="20" height="20">
                <span class="gestion">Se déconnecter</span>
            </button>
            </form>
        </div>
    </nav>

    <?php if(isset($error)): ?>
        <div class="alert alert-warning" role="alert" style="text-align: center;">
            <?php echo $error ?>
        </div>
    <?php endif; ?>

    <?php if(isset($success)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $success ?>
        </div>
    <?php endif; ?>

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
                    Et si vous changez d'avis, vous pouvez arrêter une campagne à tout moment.
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
                    <input type="text" name="lastname" class="form-control" id="lastname" onkeyup="registerInput()">

                    <label>Prénom :</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" onkeyup="registerInput()">

                    <label>Email :</label>
                    <input type="email" name="email" class="form-control" id="email" onkeyup="connectInput()">

                    <label>Mot de passe :</label>
                    <input type="password" name="mdp" class="form-control" id="password" onkeyup="registerMdp()">

                    <label>Confirmation mot de passe :</label>
                    <input type="password" name="confirmMdp" class="form-control" id="passwordconf" onkeyup="registerMdp()">
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

    <script src="Script/main.js"></script>


</body>
</html>


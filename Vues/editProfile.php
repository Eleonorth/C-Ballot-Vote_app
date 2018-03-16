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
$id = $_SESSION['idperson'];
$pdo = connectDb();


$sql = "SELECT firstname, lastname, email, password FROM person WHERE idperson=$id";
$datas = $pdo->query($sql);



?>

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
        </ul>
        <form action="../Services/logout.php">
            <button id="logout" class="btn btn-light" style="float: right">
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
            <h2>Editer mon profil</h2>
            <br>
            <form class="form-group" action="../Services/editProfile.php" method="post">
                <input type="hidden" name="id" value="<?php echo $_SESSION['idperson']?>">
                <?php
                $results = $datas->fetch();
                ?>
                <label for="userName">Nom :</label>
                <input type="text" id="userName" name="lastname" value="<?php echo $results[0]?>" class="form-control">

                <label for="firstName">Prénom :</label>
                <input type="text" id="firstName" name="firstname" value="<?php echo $results[1]?>" class="form-control">

                <label for="mail">Adresse mail :</label>
                <input type="text" id="mail" name="email" value="<?php echo $results[2]?>" class="form-control">

                <!--                <label for="password">Mot de passe :</label>-->
                <!--                <input type="password" id="password" name="password" value="--><?php //echo $results[3]?><!--" class="form-control">-->
                <!---->
                <!--                <label for="confirmpassword">Confirmer le mot de passe :</label>-->
                <!--                <input type="password" id="confirmpassword" name="confirmpassword" value="--><?php //echo $results[3]?><!--" class="form-control">-->

                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <button type="submit" class="btn btn-light">Modifier le profil</button>
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
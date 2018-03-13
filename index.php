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

    <div class="login" style="padding-bottom: 5%;">
        <form action="../Services/login.php"  method="post">
            <label>Email :</label>
            <input type="email" name="email">

            <label>Mot de passe :</label>
            <input type="password" name="mdp">

            <button type="submit">Connexion</button>
        </form>
    </div>

    <div class="register">
        <form action="../Services/signup.php" method="post">
            <label>Nom :</label>
            <input type="text" name="lastname">

            <label>Prénom</label>
            <input type="text" name="firstname">

            <label>Email :</label>
            <input type="email" name="email">

            <label>Mot de passe :</label>
            <input type="password" name="mdp">

            <label>Confirmation mot de passe :</label>
            <input type="password" name="confirmMdp">

            <button type="submit">S'inscrire</button>
        </form>
    </div>

    <footer>
        C-Ballot &#169; 2018 - Hein Team
    </footer>

</body>
</html>


<?php

session_start();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login/inscription</title>
</head>
<body>

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

</body>
</html>



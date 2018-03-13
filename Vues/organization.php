<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Organization</title>
</head>
<body>

        <form action="../Services/createOrganization.php" method="post">
            <input placeholder="Nom de l'organisation"  type="text" name="name">
            <button class="btn btn-primary" type="submit">Valider</button>
        </form>



</body>
</html>




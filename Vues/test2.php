<?php

session_start();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>


<form action="../Services/createCampaign.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    <input placeholder="Nom de la campagne"  type="text" name="name">
    <textarea name="textarea" rows="10" cols="50">
    </textarea>
    <button class="btn btn-primary" type="submit">Valider</button>
</form>


</body>
</html>
<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="../Services/createVote.php" method="post">
        <input type="radio" name="id" value="" > Cannibale<br>
        <input type="radio" name="id" value="female"> 4 Fromages<br>
        <input type="radio" name="id" value="other"> Reine
        <button class="btn btn-primary" type="submit">Valider</button>
    </form>
</body>
</html>

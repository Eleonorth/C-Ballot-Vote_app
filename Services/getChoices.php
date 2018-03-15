<?php
include '../Utils/connexion.php';

$pdo = connectDb();
$stmt = $pdo->query('SELECT * FROM choice');
while ($data = $stmt->fetch()){
    $list[] = $data;
};

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php foreach ($list as $item):?>
    <p><?php echo $list['idoption']; ?></p>
<?php endforeach; ?>
</body>
</html>

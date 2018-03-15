<?php

include '../Utils/connexion.php';

session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../src/style.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Finger+Paint|PT+Sans+Narrow" rel="stylesheet">
    <title>C-Ballot-Profile</title>
</head>

<body>

<?php
$id = $_SESSION['idperson'];
$pdo = connectDb();

$request = "SELECT firstname, lastname, email FROM person WHERE idperson = $id";
$profile = $pdo->query($request);


$sql = " SELECT name , idorganization FROM organization WHERE idperson = $id";
$data = $pdo->query($sql);

$sql2 = " SELECT organization.name, campaign.name, startdate, enddate, campaign.idcampaign FROM campaign
                  INNER JOIN organization ON campaign.idorganization=organization.idorganization 
                  INNER JOIN person ON organization.idperson=person.idperson
                  WHERE person.idperson = $id
                  ORDER BY campaign.idorganization ASC";
$datas = $pdo->query($sql2);


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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Mon profil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer mes informations
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="editProfile.php">Modifier mon profil</a>
                        <a class="dropdown-item" href="deleteUser.php" style="color: #F3193A">Supprimer mon compte</a>
                    </div>
                </li>
            </ul>
            <form action="../Services/logout.php">
                <button type="submit" id="logout" class="btn btn-light" style="float: right">
                    <img src="../src/logout.svg" width="20" height="20">
                    <span class="gestion">Se déconnecter</span>
                </button>
            </form>
        </div>
    </nav>

    <div class="container">



        <!-- Ligne informations utilisateurs-->
        <div class="row">

            <div class="col" id="IDinfo">

                <div class="col">
                    <img src="../src/user.png" width="150" height="150">
                </div>

                <div class="col">
                    <?php $user = $profile->fetch(); ?>
                    <p> Nom : <?php echo $user['lastname'] ?> </p>
                    <p> Prénom : <?php echo $user['firstname'] ?> </p>
                    <p> Adresse mail : <?php echo $user['email'] ?> </p>
                </div>
            </div>
        </div>
        <!-- Fin ligne informations utilisateurs-->

        <div class="row"><br></div>

        <!-- Div organisations -->
        <div class="row">
            <div class="col">
                <h3>Mes organisations :</h3>
            </div>

            <div class="col"></div>

            <div class="col">
                <div style="float: right">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">
                        Ajouter une organisation <img src="../src/add.png" style="margin-left: 2px;">
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une organisation :</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../Services/createOrganization.php" method="post">
                                        Entrez le nom de l'organisation à créer : <input type="text" name="name">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Créer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col resTab">
                <table class="table">
                    <thread>
                        <tr>
                            <th>Nom de l'organisation</th>
                        </tr>
                    </thread>
                    <tbody>
                    <?php while ($results = $data->fetch()){ ?>
                        <tr>
                            <td> <?php echo $results['name']?> </td>
                            <td><a href="editOrganization.php?id=<?php echo $results[1]?>">Editer</a></td>
                            <td><form action="../Services/deleteOrganization.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $results[1]?>">
                                    <input name="supprimer" type="submit" onclick="if(!confirm('Voulez-vous supprimer cette organisation?')) return false;" value="Supprimer" />
                                </form>
<!--                                <a href="deleteOrganization.php?id=--><?php //echo $results[1]?><!--">Supprimer</a></td>-->
                            <td> <a href="createCampaign.php?id=<?php echo $results[1]?>">Créer une campagne</a> </td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fin div organisations -->


        <!-- Div campagnes -->
        <div id="IDcampaign">

            <div class="row">
                <div class="col">
                    <h3>Mes campagnes :</h3>
                </div>
            </div>

            <div class="row">
                <div class="col resTab">
                    <table class="table">
                        <thread>
                            <tr>
                                <th>Nom de l'organisation</th>
                                <th>Nom de la campagne</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                            </tr>
                        </thread>
                        <tbody>
                        <?php while ($result = $datas->fetch()){ ?>
                            <tr>
                                <td><?php echo $result[0]?></td>
                                <td><?php echo $result[1]?></td>
                                <td><?php echo $result[2]?></td>
                                <td><?php echo $result[3]?></td>
                                <td><a href="#">Clôturer</a></td>
                                <td><a href="editCampaign.php?id=<?php echo $result[4]?>">Editer</a></td>
                                <td><a href="vote.php?id=<?php echo $result[4]?>">Voter</a></td>
                                <td><form action="../Services/deleteCampaign.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $result[4]?>">
                                    <input name="supprimer" type="submit" onclick="if(!confirm('Voulez-vous supprimer cette campagne?')) return false;" value="Supprimer" />
                                </form></td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Fin div campagnes -->

        <div class="row"><br></div>
        <div class="row"><br></div>
    </div>
<!-- Fin du container -->


    <footer>
        C-Ballot &#169; 2018 - Hein Team
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>


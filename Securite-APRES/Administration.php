<?php

    session_start();
    if (!isset($_SESSION['id']) or ($_SESSION['id_groupe'] != 1) or (!isset($_SESSION['identifiant'])))
    {
        header("Location:./Index.php");
    }

?>
<!DOCTYPE html>
<html lang="fr" id="HTML">
    <head>
        <meta charset="UTF-8" />
        <title>EDF - Immobilier</title>
        <link rel="icon" href="favicon.ico">

        <!-- Bootstrap core CSS -->
        <link href="./BootstrapFrameworks/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="./BootstrapFrameworks/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="./BootstrapFrameworks/css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="./BootstrapFrameworks/css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="./css/style.css" media="all" type"text/css" />
    </head>

    <body id="Body">
        <table id="TableauAccueil">
            <tr>
                <td class="gauche"><a href="./Consultation.php"><img src="./Images/logo_edf2.png" id="image_accueil" title="Retour à la page d’accueil"></a></td>
                <td class="milieu"><h1 id="bvn">Logiciel de traitement immobilier</h1></td>
                <td class="droite"><a href="./Index.php" class="btn btn-danger" title="Déconnexion">Deconnexion</a></td>
            </tr>
        </table>

        <!-- AFFICHER LA LISTE DES UTILISATEURS ET REINITIALISER PASSWORD AVEC UNE FONCTION, AINSI QUE LES OPTIONS -->
        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="./Utilisateurs.php"><img src="./Images/User.jpg"></a>
                <div class="desc">
                    <a href="./Utilisateurs.php">Administration des utilisateurs</a>
                </div>
            </div>
        </div>
        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="./Options.php"><img src="./Images/Options.jpg"></a>
                <div class="desc">
                    <a href="./Options.php">Administration générale du site</a>
                </div>
            </div>
        </div>

        <div class="row card-group mx-auto" style="width:900px;">
            <div class="col-sm-3 mx-auto">
            <a href="./Utilisateurs.php">Administration des utilisateurs</a>
                    <div class="card" style="width: 13rem;">
                        <img class="card-img-top" src="./img/user.png">
                        <div class="card-footer mt-1">
                            <h6 class="card-text text-center">Utilisateurs</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 mx-auto">
            <a href="./Options.php">Administration générale du site</a>
                    <div class="card" style="width: 13rem;">
                        <img class="card-img-top" src="./img/desk.png">
                        <div class="card-footer mt-1">
                            <h6 class="card-text text-center">Locaux</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div id="footer">
            <center>
                <hr border="2" color="black">
                <table>
                    <tr>
                        <td class="gauche">Copyright: EDF CNPE de Cattenom</td>
                        <td class="milieu">Mentions légales</td>
                        <td>
                            <?php
                                setlocale(LC_ALL,'french');
                                echo "Mis à jour le ".date("d/m/Y", getlastmod());
                            ?>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
    </body>
</html>

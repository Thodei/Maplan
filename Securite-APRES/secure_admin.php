<?php
//Permet de rediriger tous les utilisateurs qui ne sont pas admin à la page d'accueil
require './nav.php';

if (!isset($_SESSION['id']) OR !isset($_SESSION['pseudo']) OR ($_SESSION['groupe'] != 2))
{//On vérifie individuellement toutes les variables
  header("Location: Connexion.php");
}
?>

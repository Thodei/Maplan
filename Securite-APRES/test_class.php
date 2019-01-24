<!DOCTYPE html>
<html>
<?php
  require_once("class_connexion.php");

  $co = new Connexion("admin","admin");
  if ($co->connecter())
    echo "L'utilisateur '" . $co . "' est autorisé à se connecter.<br>";
  else
    echo "Erreur : " . $co . "--> accès interdit ou nom/mdp incorrect.<br>";

  $co2 = new Connexion("Thomas","pata");
  if ($co2->connecter())
    echo "L'utilisateur '" . $co2 . "' est autorisé à se connecter.<br>";
  else
    echo "Erreur : " . $co2 . "--> accès intedit ou nom/mdp incorrect.<br>";
?>
</html>

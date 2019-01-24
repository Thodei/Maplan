<?php
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=maplan;charset=utf8','root', '');
  }
  catch (Exception $e)
  {
      die('Erreur BDD : ' . $e->getMessage());
  }

  $id = substr($_POST["v1"],5);
  echo $id;
  $query = $bdd->prepare('DELETE FROM maplan.local WHERE id = :id');
  if(!$query->execute(array('id' => $id)))
    echo '<script>alert("Erreur lors de la suppression du point.")</script>';
  $query->closeCursor();
 ?>

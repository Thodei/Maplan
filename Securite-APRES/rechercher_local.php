<?php
require_once('class_point.php');

if (!empty($_POST)) //On teste si l'utilisateur a envoyé le formulaire
{
  if ((!empty($_POST["nomlocal"])))
  {//Le champ n'est pas vide
    //On masque les alerts
    echo '<script>document.getElementById("EntrerLocal").style.display="none";</script>';
    echo '<script>document.getElementById("LocalInexistant").style.display="none";</script>';
    echo '<script>document.getElementById("Loading").style.display="none";</script>';

    try
    {
      $p = new Point($_POST["nomlocal"]);
    } catch (\Exception $e) {
      die ('<script>document.getElementById("LocalInexistant").style.display="block";</script>');
    }


    if(true)
    {
      $p->ajouterLargeur(-17);
      $p->ajouterHauteur(64 - 17);

      //Affiche "Recherche en cours ..." jusqu'au chargement de l'img
      echo'<script>document.getElementById("Loading").style.display="block"</script>';

      //Affiche l'image
      $image = "./img/" . $p->getImage();
      echo '<img id="map" class="style="display:none" src="' . $image . '" onDragStart="return false" onload="deleteloader()"/>';
      ?>
      <script>
      //Masque la barre de recherche, affiche l'image
      function deleteloader()
      {
        document.getElementById("recherche").style.display="none";
        document.getElementById("map").style.display="block";
      }
      </script>
      <?php
      //Affiche le(s) point(s)
      $p->afficherPoint();
    }
  }
  else
  {//Le champ est vide
    echo '<script>document.getElementById("EntrerLocal").style.display="block";</script>';
  }
}
?>

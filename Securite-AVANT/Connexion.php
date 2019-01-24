<?php require './nav.php'; ?> <!-- Affiche la barre de navigation et inclut les scripts & stylesheets bootstrap -->
<?php
if (null !== session_id())
{
  session_unset();
  session_destroy();
}
?>
<!doctype html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="./Connexion.css">
</head>
<body>
  <div class="container" id="MainConnexion">
    <form name='f' id='f' action="#" method="post">
      <input type="text"      name="user"   class="form-control" placeholder="Nom d'utilisateur" />
      <div id=espace></div>
      <input type="password"  name="mdp"    class="form-control" placeholder="Mot de passe" />
      <div id=espace></div>
      <input type='submit'    name="submit" class="btn btn-sm btn-primary btn-block" role="button" value="Connexion"/>
      <div style="margin-top: 10px;"></div>
      <div id="UserMDPI1" class="alert alert-danger" role="alert">Entrez un nom d'utilisateur ainsi qu'un mot de passe</div>
      <div id="MauvaisCaptcha" class="alert alert-danger" role="alert">Vous n'êtes pas autorisé à vous connecter, désolé.</div>
      <div id="UserI"     class="alert alert-danger" role="alert">Entrez un nom d'utilisateur</div>
      <div id="MDPI"      class="alert alert-danger" role="alert">Entrez un mot de passe</div>
      <div id="UserMDPI"  class="alert alert-danger" role="alert">Nom d'utilisateur ou mot de passe incorrect</div>
      <div id="ConnexionReussie"  class="alert alert-info font-weight-light text-center" role="alert">Connexion réussie.<br> Si vous n'êtes pas redirigé, <a href="index">cliquez ici</a></div>
    </form>
  </div>
</body>

<?php

if (!empty($_POST)) //On teste si l'utilisateur a envoyé le formulaire
{
  
  echo '<script>document.getElementById("UserMDPI1").style.display="none";';
    echo 'document.getElementById("UserMDPI").style.display="none";';
    echo 'document.getElementById("MDPI").style.display="none";';
    echo 'document.getElementById("UserI").style.display="none";';
    echo 'document.getElementById("MauvaisCaptcha").style.display="none";</script>';
    
    //On vérifie qu'aucun des champs n'est vide
    if ((empty($_POST["user"])) OR (empty($_POST["mdp"])))
    {
      if((empty($_POST["user"]) AND (empty($_POST["mdp"])))) // Si les DEUX champs sont vides
      {
        echo '<script>document.getElementById("UserMDPI1").style.display="block";</script>';
      }
      else
      {
        if (empty($_POST["user"])) // Si c'est user qui est vide
        {
          echo '<script>document.getElementById("UserI").style.display="block";</script>';
        }
        else // Si c'est le mdp qui est vide
        {
          echo '<script>document.getElementById("MDPI").style.display="block";</script>';
        }
      }
    }
    else //Aucun des champs n'est vide, on peut contacter la BDD
    {
      //On se conecte à la BDD
      require_once("entrer_bdd.php");
      
      //On récupère la ligne grâce à l'utilisateur
      $requete = 'SELECT * FROM maplan.membres WHERE pseudo ="' . $_POST["user"] .'"';
      if($query = $bdd->query($requete)) // On vérifie qu'il n'y a pas d'erreur dans la commande
      {
        if($query->rowCount() > 0)
        {
          while ($data = $query->fetch())
          {
            if ($_POST["mdp"] == $data['pass']) //Vérifie si le mdp hashé dans la bdd correspond
            {
              if($data['id_groupe'] == 2)
              {
                header("Location: Accueil_admin");
                exit;
              }
              else
              {
                //On redirige l'utilisateur vers la page d'index si c'est un utilisateur normal
                echo '<script>document.getElementById("ConnexionReussie").style.display="block";</script>';
                header("refresh:0;index");
                exit;
              }
            }
            else //Le MDP n'existe pas dans la BDD
            echo '<script>document.getElementById("UserMDPI").style.display="block";</script>';
          }
        }
        else //Le login n'existe pas dans la BDD
        echo '<script>document.getElementById("UserMDPI").style.display="block";</script>';
      }
      else
		echo "Erreur SQL";
    }
  }
  
  
  require 'scripts_bootstrap.php';
  ?>
  </html>

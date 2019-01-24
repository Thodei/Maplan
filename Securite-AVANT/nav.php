<?php session_start();?>
<!doctype html>
<html lang="fr">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE-edge"> <!-- Pour améliorer l'affichage sur IE, eviter quirks -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<style>body{background-color:rgb(240, 240, 240)};</style>
<nav id="barrenav" class="navbar navbar-expand-sm navbar-dark bg-dark" style="opacity:0.95">
  <a class="navbar-brand" href="./index">Maplan</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown dropleft">
        <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="./img/rouage.png" onmouseover="this.src='./img/rouage2.png'" onmouseout="this.src='./img/rouage.png'" class="nav-item"></img>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./Accueil_admin" id="lienadmin">Administration</a>
          <a class="dropdown-item" href="Connexion" id="lienconnexion">Connexion</a>
          <a class="dropdown-item" href="Deconnexion" id="liendeconnexion">Déconnexion</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./apropos">&#192; propos</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

</body>

<?php
if (null !== session_id() && isset($SESSION_["groupe"]))
{//L'utilisateur s'est déjà connecté

  //On affiche le lien de Déconnexion
  echo '<script>document.getElementById("liendeconnexion").style.display="block";</script>';
  //On masque le lien de Connexion
  echo '<script>document.getElementById("lienconnexion").style.display="none";</script>';

  if($_SESSION['groupe'] == 2)
  {//Si l'utilisateur est un administrateur
    //On affiche le lien d'Administration'
    echo '<script>document.getElementById("lienadmin").style.display="block";</script>';
  }
  else
  {//L'utilisateur est connecté mais n'est pas admin
    //On masque le lien d'Administration
    echo '<script>document.getElementById("lienadmin").style.display="none";</script>';
  }
}
else
{//L'utilisateur ne s'est pas connecté
  //On masque le lien d'Administration
  echo '<script>document.getElementById("lienadmin").style.display="none";</script>';
  //On masque le lien de Déconnexion
  echo '<script>document.getElementById("liendeconnexion").style.display="none";</script>';
  //On affiche le lien de Connexion
  echo '<script>document.getElementById("lienconnexion").style.display="block";</script>';
} ?>
</html>

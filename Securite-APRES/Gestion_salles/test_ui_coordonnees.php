<?php
  ###################################################
  ###                                             ###
  ##            LIEN DU PLAN A MODIFIER            ##
  ###                                             ###
  ###################################################Essayer de stocker les points en % pour le placer peu importe la resolution de l'img
  session_start();
  $_SESSION["lien_plan"] = "img/reacteur.png";
?>
<!doctype html>
<html lang="fr">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE-edge"> <!-- Pour améliorer l'affichage sur IE (quirks) -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="test_plan.css" rel="stylesheet">
</head>

<body>
  <div id="aide" data-toggle="modal" data-target="#exampleModalCenter">  <img src="./img/info.png" onmouseover="this.src='./img/info_s.png'" onmouseout="this.src='/Tho/img/info.png'" id="img_info"></img></div>
  <div class="row">
    <div class="column col-xs-10">
      <img
        src="<?php echo $_SESSION["lien_plan"] ?>"
        alt=""
        usemap="#map1"
        onDragStart="return false"
        id="image"
      />
    </div>
    <div class="column col-xs-2" id="conteneur">
      <form id="f" class="bg-secondary" method="POST">
        <div style="margin-top: 5px;"></div>
        <label for="posx">X:</label>
        <input type="text" id="posx" name="posx" class="form-control" placeholder="Coordonnées x"/>
        <div style="margin-top: 10px;"></div>
        <label for="posy">Y:</label>
        <input type="text" id="posy" name="posy" class="form-control" placeholder="Coordonnées y"/>
        <div style="margin-top: 10px;"></div>
        <label for="nomlocal">Nom du local:</label>
        <input type="text" id="nomlocal" name="nomlocal" class="form-control" placeholder="Nom du local"/>
        <div style="margin-top: 10px;"></div>
        <label for="nomfichier">Nom du fichier:</label>
        <input type="text" id="nomfichier" name="nomfichier" class="form-control" placeholder="Nom du fichier"/>
        <div style="margin-top: 10px;"></div>
        <input type='submit' name="submit" class="btn btn-sm btn-primary btn-block" role="button" value="Envoyer"/>
      </form>
    </div>
  </div>
  <!-- Faire en sorte que le menu puisse se retracter -->



<!-- MODAL -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Voulez-vous vraiment supprimer ce point ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Confirmer</button>
      </div>
    </div>
  </div>
</div>


  <script src="test_ui_coordonnees.js"/>

  <?php
    require '../scripts_bootstrap.php';
    require 'afficher_points.php';
    require 'ajouter_local.php';
    afficher_points();
  ?>

    </body>
</html>

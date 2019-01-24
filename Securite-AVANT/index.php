<!doctype html>
<html lang="fr">

<head>
  <title>Maplan - Accueil</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <?php require 'nav.php';?>

  <div class="container" id="recherche">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8" style="margin-top:25%">
        <form name='f' id='f' action="" method="POST" class="card card-sm">
          <div class="card-body row no-gutters align-items-center">
            <div class="col">
              <input id="nomlocal" name="nomlocal" class="form-control form-control-borderless" type="search" placeholder="Rechercher un local">
            </div>
            <div class="col-auto">
              <input class="btn btn-sm btn-primary btn-block mx-auto" role="button" type="submit" value="Rechercher"/>
            </div>
          </div>
        </form>
        <div id="EntrerLocal" class="alert alert-info alert-dismissible fade show" role="alert" style="display:none;">
          <strong>Erreur : </strong> Veuillez entrer un n° de local.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="LocalInexistant" class="alert alert-info alert-dismissible fade show" role="alert" style="display:none;">
          <strong>Erreur : </strong> N° de local inexistant.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="Loading" class="alert alert-info alert-dismissible fade show" role="alert" style="display:none;">
          Recherche en cours ...
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <?php require 'rechercher_local.php'; ?>
  <?php require 'scripts_bootstrap.php'; ?>
</body>
</html>

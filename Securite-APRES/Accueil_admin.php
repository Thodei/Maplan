<?php require 'secure_admin.php';?>

<!doctype html>
<html lang="fr">

<head>
  <title>Administration</title>
</head>

</body>

<h1 class="text-center mb-5 mt-3">Administration<h1>

<div class="row card-group mx-auto" style="width:900px;">

  <div class="col-sm-3 mx-auto">
    <a href="./Utilisateurs.php">
      <div class="card" style="width: 13rem;">
        <img class="card-img-top" src="./img/user.png">
        <div class="card-footer mt-1">
          <h6 class="card-text text-center">Utilisateurs</h6>
        </div>
      </div>
    </a>
  </div>
  <div class="col-sm-3 mx-auto">
    <a href="./Gestion_salles/test_ui_coordonnees.php">
      <div class="card" style="width: 13rem;">
        <img class="card-img-top" src="./img/desk.png">
        <div class="card-footer mt-1">
          <h6 class="card-text text-center">Locaux</h6>
        </div>
      </div>
    </a>
  </div>
  <div class="col-sm-3 mx-auto">
    <a href="./Options.php">
      <div class="card" style="width: 13rem;">
        <img class="card-img-top" src="./img/tools.png">
        <div class="card-footer mt-1">
          <h6 class="card-text text-center">Options</h6>
        </div>
      </div>
    </a>
  </div>
</div>

<?php require './scripts_bootstrap.php'; ?>
</body>
</html>

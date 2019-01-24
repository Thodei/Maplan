<?php
  session_start();
  $_SESSION = array();

  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }

  session_unset();
  session_destroy();
  header("Location: index");
?>
<!doctype html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="./Deconnexion.css">
  <title>D��connexion en cours...</title>
</head>
</html>

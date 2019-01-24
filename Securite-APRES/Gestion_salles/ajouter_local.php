
<?php
  ###################################################
  ###                                             ###
  ##          INSERE UN LOCAL DANS LA BDD          ##
  ###                                             ###
  ###################################################
  if (!empty($_POST)) //On teste si l'utilisateur a envoyé le formulaire
  {
    if(!empty($_POST["posx"]) AND !empty($_POST["posy"]) AND !empty($_POST["nomfichier"]) AND !empty($_POST["nomlocal"]))
    {
      try
      {
          $bdd = new PDO('mysql:host=localhost; //Data Source Name
                              dbname=maplan;    //Nom de la base
                              charset=utf8',    //Encodage
                              'root', '');     //Login, mdp
      }
      catch (Exception $e) {
          //S'il y a une erreur lors de la connexion
          die('Erreur BDD : ' . $e->getMessage());
      }

      $requete = $bdd->prepare('INSERT INTO maplan.local (nom,posx,posy,nomfichier) VALUES(:nom, :posx, :posy, :nomfichier)');

      $local = $_POST["nomlocal"];
      $posx = $_POST["posx"];
      $posy = $_POST["posy"];
      $fichier =$_POST["nomfichier"];

      if(!$requete->execute(array('nom' => $local, 'posx' =>$posx, 'posy' => $posy, 'nomfichier' => $fichier)))
        print_r($requete->errorInfo());

        afficher_points();
        $requete->closeCursor();
    }
    else
    {
      if(empty($_POST["posx"]))
        echo '<script>document.getElementById("posx").style.backgroundColor ="rgb(249, 80, 80)";</script>';
      if(empty($_POST["posy"]))
        echo '<script>document.getElementById("posy").style.backgroundColor ="rgb(249, 80, 80)";</script>';
      if(empty($_POST["nomlocal"]))
        echo '<script>document.getElementById("nomlocal").style.backgroundColor ="rgb(249, 80, 80)";</script>';
      if(empty($_POST["nomfichier"]))
        echo '<script>document.getElementById("nomfichier").style.backgroundColor ="rgb(249, 80, 80)";</script>';
    }
  }
  ###################################################
  ?>

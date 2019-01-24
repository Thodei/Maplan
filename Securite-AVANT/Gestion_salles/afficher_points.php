
  <?php
  function afficher_points()
    {
      ###################################################
      ###                                             ###
      ##         AFFICHE LES SALLES DÉJÀ FAITES        ##
      ###                                             ###
      ###################################################
      #                       BDD                       #
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
      ###################################################
      #           RECUPERATION DU LIEN DE L'IMG         #
      $lien = $_SESSION["lien_plan"];
        for ($i=1;$i<strlen($lien)-1;$i++)
        {//On récupère tout ce qu'il y a derriere le dernier '/'
          if(strrpos(substr($lien, -$i),"/") === false)
          {
            $fichier = substr($lien, -$i);
          }
          else
            break 1; //On sort de la boucle dès le premier '/'
        }
      ####################################################
      #                REQUETE + AFFICHAGE               #

      $query = $bdd->prepare('SELECT * FROM maplan.local WHERE nomfichier = :fichier');
      if($query->execute(array('fichier' => $fichier))) // On vérifie qu'il n'y a pas d'erreur dans la commande
      {
        if($query->rowCount() > 0)
        {

          //On supprime tous les points avant de les afficher pour éviter les doublons
          echo'
            <script>
            var element = document.getElementById("points");
            while (element.firstChild)
            {
              element.removeChild(element.firstChild);
            }
            if (element.parentNode)
            {
              element.parentNode.removeChild(element);
            }
            </script>
          ';

          echo '<div id="points">';
          while ($data = $query->fetch())
          {
            //HTML
            echo '<div onclick="supprimer_point_js(\'local' . $data["id"] . '\', event)';
            echo ' "class="local' . $data["id"] . '" id="local'.$data["id"].'"> </div>';

            //CSS
            echo '<style>.local';
            echo $data["id"];
            echo '{position : absolute;background-color: red;border:1px;border-radius:250px;opacity:0.3;left:';
            echo $data["posx"]-25;
            echo 'px;top:';
            echo $data["posy"]-25;
            echo 'px;width:';
            echo '50';
            echo 'px;height:';
            echo '50';
            echo 'px;}</style>';
          }
          echo '</div>';
        }
      }
      else
        echo "Erreur requete SQL [SURL]";

      $query->closeCursor();
      ###################################################
  }
?>

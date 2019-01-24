<?php
/*  *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *  **
*                                   POINT.php                                   *
**  *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *  **
*   Créer un point sur 2 axes                                                   *
*   /!\La classe condidère que l'utilisateur sait l'utiliser                    *
*                                                                               *
*   @param String                   : Recherche un point dans la BDD.           *
*   @param int, int, string, string : Créé un point avec toutes les infos       *
*                                     nécessaires.                              *
*                                                                               *
*   @var x       : Coordonnée X                                                 *
*   @var y       : Coordonnée Y                                                 *
*   @var image   : Plan sur lequel le point est représenté                      *
*   @var etat    : false = masqué | true = affiché                              *
*   @var suivant : Point ayant le même nom dans la BDD (se répète à l'infini)   *
*   @var nom     : Nom du local                                                 *
*   @var id      : ID du div (nom + x + y)                                      *

*   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   */

class Point
{
  private $x;
  private $y;
  private $image;
  private $etat;
  private $suivant;
  private $nom;
  private $id;


  /******************************************************
  * Dirige vers un des deux "constructeurs" en fonction *
  *                 du nombre d'argument                *
  *******************************************************/
  function __construct()
  {
    $this->etat = false;
    $nb = func_num_args();
    $args = func_get_args();
    switch ($nb) {
      case 1:
        if(!$this->creerPointString($args[0]))
          throw new Exception("Le local n'existe pas dans la base de données.");
        break;
      case 4:
        $this->creerPoint($args[0],$args[1],$args[2],$args[3]);
      break;
      default:
        die("Erreur d'initialisation : nombre d'arguments incorrects.");
        break;
    }
  }
  /************************************************
  *               Constructeur n°1                *
  * Récupère x, y et le nom de l'image dans la BDD*
  ************************************************/
  function creerPointString($nom)
  {
      $this->nom = $nom;
      $local = str_replace(" ","",$nom);
      require_once("entrer_bdd.php");

      $query = $bdd->prepare('SELECT * FROM maplan.local WHERE nom = :nom');
      if($query->execute(array('nom' => $local)))
      {
        if($query->rowCount() > 0)
        {
          $i = 0;
          while($data = $query->fetch())
          {
            if ($i == 0)
            {
              $this->x = $data["posx"];
              $this->y = $data["posy"];
              $this->id = $this->nom . $this->x . $this->y;
              $this->image = $data["nomfichier"];
            }
            else
            {
              if($this->image == $data["nomfichier"]) //Vérifie que le point est bien sur le même plan
                $this->ajouterSuiv($data["posx"], $data["posy"], $data["nomfichier"],$data["nom"]);
            }
            $i++;
          }
          return true;
        }
      }
      else
        return false;
  }

  /*************************************************
  *                Constructeur n°2                *
  * Créé un objet point à partir des infos fournies*
  *************************************************/
  function creerPoint($x,$y,$image,$nom)
  {
    $this->x = $x;
    $this->y = $y;
    $this->image = $image;
    $this->nom = $nom;
    $this->id = $this->nom . $this->x . $this->y;
  }

  /*************************************************
  * Affiche un point en fonction de ses coordonnées*
  * Génère une balise <div> et <style> à l'endroit *
  *                     appellé                    *
  *              ID div : nom + x + y              *
  *************************************************/
  function afficherPoint()
  {
    //Point
    echo '<div class="point" id="' . $this->id . '">';
    echo '</div>';
    //Style
    echo "
    <style>
    #" .  $this->id ."
    {
      left: ". $this->x ."px;
      top:". $this->y ."px;
    }</style>";

    $this->etat = true;

    if(isset($this->suivant))
    {
      $this->suivant->afficherPoint();
    }
  }

  /*************************************
  * Masque un point sans le supprimer *
  *************************************/
  function masquerPoint()
  {
    echo '<script>document.getElementById("' . $this->id . '").style.display="none";</script>';
    $this->etat = false;
    if(isset($this->suivant))
      $this->suivant->masquerPoint();
  }

  /*******************************************************
  * Ajoute un point à la liste de point ayant le même nom*
  *******************************************************/
  function ajouterSuiv($x,$y,$img,$nom)
  {
    if(!isset($this->suivant))
    {
      $this->suivant = new Point($x,$y,$img,$nom);
    }
    else
    {
      $this->suivant->ajouterSuiv($x,$y,$img,$nom);
    }
  }

  /********************************************
  * Ajoute de la largeur à partir de la droite*
  ********************************************/
  function ajouterLargeur($w)
  {
    $this->x += $w;
    if(isset($this->suivant))
      $this->suivant->ajouterLargeur($w);
  }

  /***************************************
  * Ajoute de la hauteur à partir du haut*
  ***************************************/
  function ajouterHauteur($h)
  {
    $this->y += $h;
    if(isset($this->suivant))
      $this->suivant->ajouterHauteur($h);
  }

  public function __toString()
  {
    return "[" . $this->x . "," . $this->y . "]";
  }

  function getX()
  {
    return $this->x;
  }

  function getY()
  {
    return $this->y;
  }

  function getImage()
  {
    return $this->image;
  }

  function getNom()
  {
    return $this->nom;
  }

  function getId()
  {
    return $this->id;
  }

  function getEtat()
  {
    return $this->etat;
  }
}
?>

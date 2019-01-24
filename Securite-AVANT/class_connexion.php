<?php
/*  *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *  **
*                                   CONNEXION.php                               *
**  *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *  **
*                                                                               *
*   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   */

class Connexion
{
  private $user;
  private $pass;
  private $groupe;

  /******************************************************
  *******************************************************/
  function __construct($user,$mdp)
  {
    $this->user = $user;
    $this->pass = $mdp;
  }

  function connecter()
  {
    try
    {
      $bdd = new PDO('mysql:host=localhost; //Data Source Name
                            dbname=maplan;  //Nom de la base
                            charset=utf8',  //Encodage
                            'root', '');    //Login, mdp
    } catch (Exception $e)
    {
      //S'il y a une erreur lors de la connexion
      die('Erreur BDD : ' . $e->getMessage());
    }

    $query = $bdd->prepare('SELECT * FROM maplan.membres WHERE pseudo = :pseudo');
    if($query->execute(array('pseudo' => $this->user))) // On vérifie qu'il n'y a pas d'erreur dans la commande
    {
      if($query->rowCount() > 0)
      {
        while ($data = $query->fetch())
        {
          if (password_verify($this->pass, $data['pass'])) //Vérifie si le mdp hashé dans la bdd correspond
          {
            $this->groupe = $data["id_groupe"];
            return true;
          }
        }
      }
    }
    return false;
  }

function estAdmin()
{
  if ($this->groupe == 2)
  return true;
  else
  return false;
}

public function __toString()
{
  return $this->user;
}

function getuser()
{
  return $this->user;
}

function getpass()
{
  return $this->pass;
}

}

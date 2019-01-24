<?php
    //On se conecte à la BDD
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
?>

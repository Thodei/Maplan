
  ////////////////////////////////////////////////////
  //    RÉCUPERE LE NOM DE L'IMG POUR L'AFFICHER    //
  ////////////////////////////////////////////////////
  window.onload = function()
  {
    var temp = document.getElementById("image").src;
    var temp2;

    for (var i = 0; i < temp.length; i++)
    {
      if (temp.substring(temp.length - i).indexOf("/") == -1)
        temp2 = temp.substring(temp.length - i);
    }
    document.getElementById("nomfichier").value = temp2;
  }

    ////////////////////////////////////////////////////
    //    Affiche les coordonnées avec SHIFT+CLICK    //
    ////////////////////////////////////////////////////
    document.addEventListener('click', function(e) {
      if(e.shiftKey)
      {
        document.getElementById("posx").value=e.clientX;
        document.getElementById("posy").value=e.clientY;
      }
    })

    ////////////////////////////////////////////////////
    //      SUPPRIME UN POINT SUR LEQUEL ON CLIQUE    //
    // AFFICHE UN MODAL POUR CONFIRMER LA SUPPRESSION //
    ////////////////////////////////////////////////////
    function supprimer_point_js(id, event)
    {
      //AFFICHER LE MODAL

      if(event.shiftKey) // Si l'utilisateur confirme la suppression
      {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://10.168.1.99/Tho/Gestion_salles/supprimer_point.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("v1=" + id);

        xhr.onreadystatechange = function()
        {
          if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
          {
            //On supprime le div
            document.getElementById("points").removeChild(document.getElementById(id));
          }
        };
      }
      else  //Si l'utilisateur refuse
      {
        //On ferme le modal
      }
    }

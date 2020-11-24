
    /*Apparition formulaire d'inscription*/
    var inscription1 = document.getElementById('formulaire_inscription')
    inscription1.addEventListener('click', function () {
      document.getElementById('inscription')
      inscription.style.visibility = 'visible';
      connexion.style.visibility = 'hidden';
      arrierePlan_identifications.style.visibility = 'visible';
      arrierePlan_identifications.style.opacity = 'visible';
    })

    arrierePlan_identifications.addEventListener('click', function () {
      document.getElementById('arrierePlan_identifications')
      arrierePlan_identifications.style.visibility = 'hidden';
      inscription.style.visibility = 'hidden';
      connexion.style.visibility = 'hidden';
      
    })


    /*Apparition formulaire de connexion*/
    var connexion1 = document.getElementById('formulaire_connexion')
    connexion1.addEventListener('click', function () {
        document.getElementById('connexion')
        connexion.style.visibility = 'visible';
        inscription.style.visibility = 'hidden';
        arrierePlan_identifications.style.visibility = 'visible';
    })

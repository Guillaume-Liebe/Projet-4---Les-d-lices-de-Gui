<?php 
session_start();
  $host_name = 'db5000514656.hosting-data.io';
  $database = 'dbs494142';
  $user_name = 'dbu854808';
  $password = 'Guizmo-34800';
  $bdd = null;

  try {
    $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <title>Les délices de Gui</title>
    </head>

    <body>

    <div id="arrierePlan_identifications"></div>
    
        <header>
            <nav id="identifications"> <!---- Identifications ---->
                <ul>
                    <div id="formulaire_inscription"><li><a>Inscription</a></div></li></div>
                    <div class="barre"><li><a>|</a></li></div>
                    <div id="formulaire_connexion"><li><a>Connexion</a></div></li></div>
                </ul>
            </nav>
            
            <div id="logo"></div>               
            <nav> <!---- Menu ---->
                <ul>
                <div id="icone_bol_melangeur"><div id="coulure"></div>
                </div>
                    <li><a href=index.php><div id="effect_rubrique_menu">Home</a></div></li>
                    <li><a href=gateaux.php><div id="effect_rubrique_menu">Gâteaux</a></div></li>
                    <li><a href=patisseries.php><div id="effect_rubrique_menu">Pâtisseries</a></div></li>
                    <li><a href=a_propos.php><div id="effect_rubrique_menu">À propos</a></div></li>
                </ul> 
            </nav> 
        </header>

        <?php
            include("inscription.php");
        ?>

        <?php
            include("connexion.php");
        ?>


        <div class="ensemble_de_gateau"></div>

        <section class="laboratoire_de_patisseries">
   
            <div class="cartouche_blanc">
                <h2 class="h-2">Welcome !</h2>
                <div id="chantilly"></div>
                <div class="container">
                    <div class="row">
                    <div class="col-sm-8" id="texte_accueil">
                        <br><p>Fondé en 2020<b> la boulangerie virtuelle "Les délices de Gui"</b> vous proposent <b>une panelle de gâteaux</b> <br>et <b>pâtisseries</b> réalisée uniquement <b>en 3D</b> !
                        <br>Découvrez dès à présents leurs recettes inspirées de vrai créations.
                        <br><br>Savoir-faire français et créations du monde.</p>
                    </div>
                    <div class="col-sm">
                        <div id="petit_cuisinier"></div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-sm">
                        <div class="welcome-gateau"></div>
                    </div>
                    <div class="col-sm">
                      <h3 class="h-3">Gâteaux</h3>
                      <div id="chantilly_2"></div>
                      <p class="paragraphe_p">Fraisier, Tarte framboise, Entremet, Paris Brest...</p>
                      <a href=gateaux.php><button><div class="arrow-right"></div>Déguster</button></a>
                      <div id="pointille"></div>
                      <h3 class="h-3">Pâtisseries</h3>
                      <div id="chantilly_2"></div>
                      <p class="paragraphe_p">Macarons, Mille Feuille, Baba au Rhum, Choux Caramel...</p>
                      <a href=patisseries.php><button><div class="arrow-right"></div>Déguster</button></a>
                    </div>
                  </div>
              </div>
            </div> 

        </section>

        <?php
            include("footer.php");
        ?> 

        <script src="js/elements.js"></script>
        <script src="js/formulaires.js"></script>
    </body>
</html>
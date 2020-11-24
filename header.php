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

        <script src="js/elements.js"></script>
    </body>
</html>
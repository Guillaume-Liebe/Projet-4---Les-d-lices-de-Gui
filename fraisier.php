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
    <div id="arrierePlan"></div> 
        <?php
            include("header.php");
        ?>
        <div class="col-md-12 col-xl-6"><div id="photos_fraisier_1_agrandi"></div></div>
        <div class="col-md-12 col-xl-6"><div id="photos_fraisier_2_agrandi"></div></div>
        <div class="col-md-12 col-xl-6"><div id="photos_fraisier_3_agrandi"></div></div>
        <div class="col-md-12 col-xl-6"><div id="photos_fraisier_4_agrandi"></div></div>
        <section class="laboratoire_de_patisseries_fraisier">

            <div class="cartouche_blanc_fraisier">
                <h2 class="h-2">Fraisier</h2>
                <div id="chantilly_4"></div>
                <!--- <a href="#chantilly_3"><p class="voir_recette">>>> Voir la recette <<<</a></p> --->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xl-6">
                            <div id="photos_fraisier_1"></div>
                        </div>

                        <div class="col-md-12 col-xl-6">
                            <div id="photos_fraisier_2"></div>
                        </div>

                        <div class="col-md-12 col-xl-6">
                            <div id="photos_fraisier_3"></div>
                        </div>

                        <div class="col-md-12 col-xl-6">
                            <div id="photos_fraisier_4"></div>  
                        </div>                 
                    </div>
                </div>         

            <!---<h5 class="h-5">Recette !</h5>
            <div id="chantilly_3"></div>

            <b><h6 class="h-6">Ingrédients (8 personnes)</h6></b><br>
            <p class="recettes">
            Génoise<br>
            4 œufs<br>
            125g de faine<br>
            En direct des producteurs sur Logo Pourdebon<br>
            90g de sucre<br>
            1 demi sachet de levure chimique<br>
            Mousseline<br>
            1kg de fraise label rouge<br>
            50 cl de lait<br>
            150g de beurre<br>
            100g de sucre<br>
            4 jaunes d'œuf<br>
            55g de maizena<br>
            Gousse de vanille
            </p>

            <b><h6 class="h-6">Préparation</h6></b><br>
            <p class="recettes">
            ÉTAPE 1 :
            Génoise
            Mettre dans le robot les blancs avec le sel et faire monter en neige puis rajouter en fine pluie le sucre.<br><br>

            ÉTAPE 2 :
            Mettre un à un les jaunes en continuant de battre et mettre la farine tamisée.<br><br>

            ÉTAPE 3 :
            Beurrer un moule et enfourner la préparation à 180°C dans un four préchauffé 3 min.<br><br>

            ÉTAPE 4 :
            Crème pâtissière: chauffer le lait avec la moitié du sucre et la gousse de vanille.<br><br>

            ÉTAPE 5 :
            Blanchir les jaunes avec l'autre moitié de sucre et y mettre la maizena.<br><br>

            ÉTAPE 6 :
            Versez le lait chaud dessus en remuant et remettre sur le feu et tournant jusqu'à epaississement.<br><br>

            ÉTAPE 7 :
            Mettre la crème à refroidir.<br><br>

            ÉTAPE 8 :
            Mettre la crème refroidie dans le batteur et battre. Rajouter le beurre et voilà votre crème mousseline (on peut mettre de la pâte de pistache) est prête.<br><br>

            ÉTAPE 9 :
            Découper la génoise refroidie et mettre dans un cercle de la génoise et des fraises sur tout le contour.<br><br>

            ÉTAPE 10 :
            Mettre de la crème et des fraises en étant généreux. Refermer avec l'autre génoise et serrez bien avec le reste de crème. Mettre un peu de colorant et recouvrir votre gâteau.<br><br>

            ÉTAPE 11 :
            Décorez-le.
            </p> --->
        </section>

        <div id="footer_fraisier"><?php include("footer.php"); ?></div>

        <script src="js/elements.js"></script>
        <script src="js/formulaires.js"></script>
    </body>
</html>
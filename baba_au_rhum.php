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
        <div class="col-md-12 col-xl-6"><div id="photos_baba_au_rhum_1_agrandi"></div></div>
        <div class="col-md-12 col-xl-6"><div id="photos_baba_au_rhum_2_agrandi"></div></div>
        <div class="col-md-12 col-xl-6"><div id="photos_baba_au_rhum_3_agrandi"></div></div>
        <section class="laboratoire_de_patisseries_gateaux">

            <div class="cartouche_blanc_fraisier">
                <h2 class="h-2">Baba au rhum</h2>
                <div id="chantilly_4"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xl-6">
                            <div id="photos_baba_au_rhum_1"></div>
                        </div>

                        <div class="col-md-12 col-xl-6">
                            <div id="photos_baba_au_rhum_2"></div>
                        </div>

                        <div class="col-md-12 col-xl-6">
                            <div id="photos_baba_au_rhum_3"></div>
                        </div>
                    </div>
                </div>         
            </div>

        </section>

        <div id="footer_baba_au_rhum"><?php include("footer.php"); ?></div>

        <script src="js/elements_8.js"></script>
        <script src="js/formulaires.js"></script>
    </body>
</html>
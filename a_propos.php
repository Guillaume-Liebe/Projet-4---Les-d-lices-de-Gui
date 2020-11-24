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

        <?php
            include("header.php");
        ?>

        <section class="laboratoire_de_patisseries_4">
            <div class="cartouche_blanc_4">
                <h2 class="h-2">À propos</h2>
                <div id="chantilly_4"></div>
                <div class="container">
                    <div class="row">
                    <div class="col-sm">
                    <p class="textes_a_propos"><b>Bonjour et bienvenue sur mon site web "Les délices de Gui" !</b></p>
                    <p><b>Qui suis-je ?</b><br>
                    Je m'appelle Guillaume Liebe et je vis dans le Sud près du soleil et de la mer :)<br>
                    J'ai réalisé plusieurs formations dans le domaine de l'infographie, la conception 3D et du Développement Web.<br><br>
                    J'espère que vous trouverez votre bonheur parmi tous les gâteaux et pâtisseries en 3D.<br><br>
                    Bonne visite !<br>
                    </p>

                    <p><em>Guillaume Liebe</em></p>
                    </div>
                </div>
        </section>

        <div id="footer_a_propos"><?php include("footer.php"); ?></div>

        <script src="js/elements.js"></script>
        <script src="js/formulaires.js"></script>
    </body>
</html>
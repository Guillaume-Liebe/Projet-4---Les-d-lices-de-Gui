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

        <div align="center">
            <h2>Profil de</h2> <?php echo $userinfo['pseudo'];?>
            <br /><br />
            <h2>Pseudo =</h2> <?php echo $userinfo['pseudo'];?>
            <br /><br />
            <h2>Mail =</h2> <?php echo $userinfo['mail'];?>
            <br />
            <?php
            if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
            {
            ?>
            <div id="formulaire_edition_profil"><a>Editer mon profil</a></div>
            <a href="deconnexion.php">Se déconnecter</a>
            <?php
            }
            ?>
        </div>
        
        <script src="js/elements.js"></script>
        <script src="js/formulaires.js"></script>
    </body>
</html>
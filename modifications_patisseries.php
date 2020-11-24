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

//Préparation de la requête
$modifier = $bdd->prepare('SELECT * FROM commentaires_patisseries WHERE id=:commentaire');


//Lliaison de paramètre nommé
$modifier->bindValue(':commentaire', $_GET['commentaireUtilisateur'], PDO::PARAM_INT);


//exécution de la requête 
$executeOk = $modifier->execute();

$utilisateur = $modifier->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <title>Les délices de Gui</title>
    </head>

    <body>

    <?php include('header.php'); ?>

      <section class="laboratoire_de_patisseries_2">
        <div class="wallpaper_2"></div>
        <div class="cadre_modifier_commentaire">
          <table>         
              <tr>
                  <td class="modifier_com">
                    <h2 class="h-2">Modifier le commentaire<div style="margin-bottom:40px;"></div></h2>
                    <?php if(!empty($_SESSION['id'])){
                      ?>
                        <form action ="modifier_patisseries.php?id=<?= $_GET['commentaireUtilisateur']; ?>#scroll" method= "POST">
                            <div id="pseudo"><?php echo '<b>Pseudo : </b>' . $_SESSION['pseudo'] ?></div>
                            <textarea name="commentaire" id="commentaire" placeholder=" Taper votre commentaire..." cols="50" rows="5"><?= $utilisateur['commentaire']; ?></textarea><br />
                            <input type="submit" id="poster" value="Poster" name="submit_commentaire" />
                        </form>
                      <?php
                    } ?> 
                  </td>
              </tr>
          </table> 
        </div>
      </section>

      <?php include('footer.php'); ?>
        <!----- <script src="js/modifications_gateaux.js"></script> ----->
    </body>
</html>

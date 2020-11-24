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

<?php

if(isset($_SESSION['id']))
{
    $req=$bdd->prepare('SELECT * FROM membres WHERE id= ?');
    $req->execute(array($_SESSION['id']));
    $utilisateur = $req->fetch();

    // Mettre à jour le pseudo
    if(isset($_POST['nouveau_pseudo']) AND !empty($_POST['nouveau_pseudo']) AND $_POST['nouveau_pseudo'] != $utilisateur['pseudo'])
    {
        $nouveau_pseudo = htmlspecialchars($_POST['nouveau_pseudo']);
        $inserer_pseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id= ?");
        $inserer_pseudo->execute(array($nouveau_pseudo, $_SESSION['id']));
        header('Location: index.php?id='.$_SESSION['id']);
    } 

    // Mettre à jour l'email
    if(isset($_POST['nouveau_mail']) AND !empty($_POST['nouveau_mail']) AND $_POST['nouveau_mail'] != $utilisateur['mail'])
    {
        $nouveau_email = htmlspecialchars($_POST['nouveau_mail']);
        $inserer_email = $bdd->prepare("UPDATE membres SET mail = ? WHERE id= ?");
        $inserer_email->execute(array($nouveau_email, $_SESSION['id']));
        header('Location: index.php?id='.$_SESSION['id']);
    }

    // Mettre à jour le mot de passse
    if(isset($_POST['mot_de_passe']) AND !empty($_POST['mot_de_passe']) AND isset($_POST['nouveau_mot_de_passe']) AND !empty($_POST['nouveau_mot_de_passe']))
    {
        $mot_de_passe = sha1($_POST['mot_de_passe']);
        $nouveau_mot_de_passe = sha1($_POST['nouveau_mot_de_passe']);
        if($mot_de_passe == $nouveau_mot_de_passe)
        {
            $inserer_mot_de_passe = $bdd->prepare("UPDATE membres SET mot_de_passe = ? WHERE id= ?");
            $inserer_mot_de_passe->execute(array($mot_de_passe, $_SESSION['id']));
            header('Location: index.php?id='.$_SESSION['id']);

        } else {
            $message = "Vos deux mots de passe ne correspondent pas";
        }
    }

    if(isset($_POST['nouveau_pseudo']) AND $_POST['nouveau_pseudo'] == !$utilisateur['pseudo'])
    {
        header('Location: index.php?id='.$_SESSION['id']);
    } 
?>
        <?php include('header.php'); ?>

        <section class="laboratoire_de_patisseries_2">
        <div class="wallpaper_2"></div>
            <form method="POST" action="">
                <div class="cadre_modifier_commentaire">
                    <table>
                        <tr>        
                            <td><h2 class="h-2">Modifier mon profil :</h2>
                                <label>Pseudo : </label>
                                <input type = "text" name="nouveau_pseudo" placeholder="Pseudo" value="<?php echo $utilisateur['pseudo'];?>"/><br />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email : </label>
                                <input type = "text" name="nouveau_mail" placeholder="mail" value="<?php echo $utilisateur['mail'];?>"/><br />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mot de passe : </label>
                                <input type = "password" name="mot_de_passe" placeholder="Mot de passe" /><br />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label> Nouveau mot de passe : </label>
                                <input type = "password" name="nouveau_mot_de_passe" placeholder="Nouveau mot de passe" /><br />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <br />
                                <input type = "submit" value="Mettre le profil à jour" /><br />
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
            <?php if(isset($message)) { echo '<font color="red";>' . $message . '</font>'; } ?>

        </section>

        <?php include('footer.php'); ?>


<?php
} else {
    header("Location: connexion.php");
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
        <!-------<script src="js/edition_profil.js"></script> ----->
    </body>
</html>
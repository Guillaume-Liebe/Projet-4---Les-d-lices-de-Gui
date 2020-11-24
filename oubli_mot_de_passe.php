
<?php
$host_name = 'db5000514656.hosting-data.io';
$database = 'dbs494142';
$user_name = 'dbu854808';
$password = '***********';
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
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <title>Mot de passe oublié</title>
    </head>
    <body>

    <?php include('header.php'); ?>
    <section class="laboratoire_de_patisseries_2">

    <div class="wallpaper_2"></div>
    <div class="cadre_modifier_commentaire">
          <table>         
                <tr>
                    <td class="modifier_com">
                        <h2 class="h-2">Mot de passe oublié<div style="margin-bottom:40px;"></div></h2>
                        <form method="post">
                            <label for="mail"><b>Mail :</b></label>
                            <input type="mail" placeholder="Entrer votre mail" name="mail" required><br /><br />
                            <button type="submit"style="border-radius: 10px;margin-left: 20px;padding-right: 30px;background-color: #0089d3;">Envoyer la demande</button>
                        </form>
                    </td>
                </tr>
          </table> 
        </div>



        <?php
            if(isset($_POST['mail']))
            {
                $token = uniqid();
                $url = "http://localhost/password/token?token=$token.php";

                $message = "Bonjour, voici le lien pour la réinitialisation du mot de passe : $url";
                $headers = 'Content-Type: text/plain; charset="utf-8"'." ";

                if(mail($_POST['mail'], 'Mot de passe oublié', $message, $headers))
                {
                    $sql = "UPDATE membres SET token = ? WHERE mail = ?";
                    $stmt = $bdd->prepare($sql);
                    $stmt->execute([$token, $_POST['mail']]);
                    echo "Mail envoyé";
                }
                else {
                    echo "Une erreur est survenue...";
                }
            }
        ?>

    </section>

    <?php include('footer.php'); ?>

    </body>
</html>

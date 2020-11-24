<?php
session_start();
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

if(isset($_GET['token']) AND $_GET['token'] != '')
{
    $stmt = $bdd->prepare('SELECT mail FROM membres WHERE token = ?');
    $stmt->execute([$_GET['token']]);
    $mail = $stmt->fetchColumn();

    if($mail)
    {
    ?> 

        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <link rel="stylesheet" href="css/style.css" />
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
                <title>Récupération du mot de passe</title>
            </head>

            <body>
                <form method="post">
                    <label for="newPassword">Nouveau mot de passe :</label>
                    <input type="password" name="newPassword">
                    <input type="submit" value="Confirmer">
                </form>
            </body>
        </html>
    <?php
    } else {
        echo "erreur";
    }
}

if(isset($_POST['newPassword']))
{
    $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $sql = "UPDATE membres SET mot_de_passe = ?, token = NULL WHERE mail = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$hashedPassword, $mail]);
    echo "Le mot de passe a été modifié avec succès !";
}

?>

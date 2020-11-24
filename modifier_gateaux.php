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

//Préparation de la requête
$modifier = $bdd->prepare('UPDATE commentaires_gateaux SET commentaire = :commentaire WHERE id = :id');

//Liaison de paramètre nommé
$modifier->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);
$modifier->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

//exécution de la requête
$executeOk = $modifier->execute();

if($executeOk) {
    $_SESSION['message'] = '<div id="envoie"><font color="green">Le commentaire a été modifié</font></div>';
}
header("Location:gateaux.php");
?>

<script src="js/modifications_gateaux.js"></script>  

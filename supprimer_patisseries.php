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
$supp = $bdd->prepare('DELETE FROM commentaires_patisseries WHERE id=:commentaire LIMIT 1');

//Lliaison de paramètre nommé
$supp->bindValue(':commentaire', $_GET['commentaireUtilisateur'], PDO::PARAM_INT);

//exécution de la requête 
$executeOk = $supp->execute();
if($executeOk) {
    $_SESSION['message'] = '<div id="envoie"><font color="green">Le commentaire a été supprimé</font></div>';
}
header("Location:patisseries.php");
?>


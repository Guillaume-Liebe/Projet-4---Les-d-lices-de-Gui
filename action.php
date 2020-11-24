<?php
try
{
    $bdd = new PDO('mysql:host=localhost; port=3308;dbname=espace_membre;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];

    $sessionid = $_SESSION['id'];

    $check = $bdd->prepare('SELECT id FROM membres WHERE id = ?');
    $check->execute(array($getid));

    if($check->rowCount() == 1) {
        if($gett == 1) {
            $check_like = $bdd->prepare('SELECT id FROM likes WHERE membre = ? AND id_membre = ?');
            

            $ins = $bdd->prepare('INSERT INTO likes (id_membre) VALUES (?)');
            $ins->execute(array($getid, $sessionid));
        } elseif($gett == 2) {
            $ins = $bdd->prepare('INSERT INTO dislike (id_membre) VALUES (?)');
            $ins->execute(array($getid, $sessionid));
        }
        header('Location: http://localhost/projet_5/gateaux.php?id=' .$getid]);
    } else {
        exit('Erreur fatale. <a href="http://localhost/projet_5/gateaux.php">Revenir à l\'accueil</a>');
    }
} else {
    exit('Erreur fatale. <a href="http://localhost/projet_5/gateaux.php">Revenir à l\'accueil</a>');
}



?>
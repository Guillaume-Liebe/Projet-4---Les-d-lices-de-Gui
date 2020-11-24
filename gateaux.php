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

    if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $get_id = htmlspecialchars($_GET['id']);

        if($membres->rowCount() == 1) {
            $likes = $bdd->prepare('SELECT id FROM likes WHERE id_membre = ?');
            $likes->execute(array($id));
            $likes = $likes->rowCount();

            $dislike = $bdd->prepare('SELECT id FROM dislike WHERE id_membre = ?');
            $dislike->execute(array($id));
            $dislike = $like->rowCount();
        }
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

        <section class="laboratoire_de_patisseries_2">
            <div class="wallpaper"></div>
            <div class="cartouche_blanc_2">
                <h2 class="h-2">Gâteaux</h2>
                <div id="chantilly_4"></div>
                <div class="container">
                <div class="row">
                <div class="col-md-12 col-xl-4">
                    <h4>Fraisier</h4>                    
                    <a href="fraisier.php"><div id="photos_gateau_1">

                    
                    <div class="likes_dislikes">
                        <!----<a href="action.php?t=1&id=<?= $id ?>">J'aime</a> (<?= $likes ?>)
                        <a href="action.php?t=2&id=<?= $id ?>">J'aime pas</a> (<?= $dislike ?>)---->
                    </div></div></a>
                    </div>

                    <div class="col-md-12 col-xl-4">
                    <h4>Tarte aux fruits</h4>
                    <a href="tarte_aux_fruits.php"><div id="photos_gateau_2"></div></a>
                    </div>

                    <div class="col-md-12 col-xl-4">
                    <h4>Entremet</h4>
                    <a href="entremet.php"><div id="photos_gateau_3"></div></a>
                    </div>

                    <div class="col-md-12 col-xl-4">
                    <h4>Pithiviers</h4>
                    <a href="pithiviers.php"><div id="photos_gateau_4"></div></a>
                    </div>

                    <div class="col-md-12 col-xl-4">
                    <h4>Paris Brest</h4>
                    <a href="paris_brest.php"><div id="photos_gateau_5"></div></a>
                    </div>
                </div>

                <div id="scroll"><h2 class="h-2">Commentaires</h2></div>

                <?php
                    if(isset($_SESSION['id'])) {

                        if(isset($_POST['submit_commentaire'])) {
                            if(!empty($_SESSION['pseudo']) AND !empty($_POST['commentaire'])) {
                                $pseudo = $_SESSION['pseudo'];
                                $commentaire = $_POST['commentaire'];

                                $inserer = $bdd->prepare('INSERT INTO commentaires_gateaux (pseudo, commentaire) VALUES (?, ?)');
                                if($inserer->execute(array($pseudo, $commentaire)))

                                $envoie = "Votre commentaire a bien été posté !";

                            } else {
                                $erreur = "Tous les champs doivent être complétés !";
                            }

                            if (isset($envoie))
                            {
                                echo '<div id="envoie"><font color="green">' . $envoie . "</font></div>";
                            }
                            if (isset($erreur))
                            {
                                echo '<div id="erreur"><font color="red">' . $erreur . "</font></div>";
                            }
                        }
                    }
                    
                    $commentairesParPage = 5;
                    $commentaireTotalsReq = $bdd->query("SELECT id FROM commentaires_gateaux");
                    $commentaireTotals = $commentaireTotalsReq->rowCount();
                    $pageTotales = ceil($commentaireTotals/$commentairesParPage);

                    // Afficage du formulaire que si connecté
                    if(!empty($_SESSION['id'])){
                        ?>
                        <?php    
                            if(!empty($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                $_SESSION['message'] = "";
                            }
                        ?>

                        <form method="POST" action="#scroll">
                            <div id="pseudo"><?php echo '<b>Pseudo : </b>' . $_SESSION['pseudo'] ?></div>
                            <textarea name="commentaire" id="commentaire" placeholder=" Taper votre commentaire..." cols="50" rows="5"></textarea><br />
                            <input type="submit" id="poster" value="Poster" name="submit_commentaire" />
                        </form>
                        
                        <?php
                    } else {
                        ?><p class="phrase_connectezVous">Connectez-vous pour pouvoir laisser votre message !<p>
                        <?php
                    }
                    if( !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pageTotales)
                    {
                        // $_GET['page'] = intval($_GET['page']);
                        $pageCourante = intval($_GET['page']);
                    } else {
                        $pageCourante = 1;
                    }

                    $depart = ($pageCourante-1)*$commentairesParPage;

                    $commentaire = $bdd->prepare('SELECT * FROM commentaires_gateaux ORDER BY id DESC LIMIT '.$depart.','.$commentairesParPage);
                    $commentaire->execute();

                    while($c = $commentaire->fetch()) {
                        ?>
                        <div class="informations_commentaires">
                            Posté par &nbsp; <b><?= $c['pseudo'];?> &nbsp;</b> le <?= $c['date_commentaire']; 

                        if(!empty($_SESSION['id'])){                            

                            if (($_SESSION['pseudo']) == ($c['pseudo'])) {?>

                            <div id= "modifications"><a href= "modifications_gateaux.php?commentaireUtilisateur=<?=$c['id']?>">Modifier</a></div>
                            <div id= "suppressions"><a href= "supprimer_gateaux.php?commentaireUtilisateur=<?=$c['id']?>#scroll">Supprimer</a></div><?php
                            } else { ?>
                            <div id= "modifications"><a href= "modifications_gateaux.php?commentaireUtilisateur=<?=$c['id']?>"></a></div>
                            <div id= "suppressions"><a href= "supprimer_gateaux.php?commentaireUtilisateur=<?=$c['id']?>#scroll"></a></div><?php 
                            }
                        }?>

                        </div>
                        <div class="commentaires">
                        <?= htmlspecialchars($c['commentaire']);?><br />        
                        </div>
                        <?php 
                    }

                    // Pagination
                    for($i=1;$i<=$commentaireTotals; $i++) {
                        if($i == $pageCourante)
                        {
                            echo $i. ' '; 
                        } else {
                            echo'<a href="gateaux.php?page=' .$i. '#scroll">'.$i.'</a> ';
                        }
                    }
                ?>
             </section>

                <div id="footer_gateaux">
                    <?php include("footer.php"); ?>            
                </div>

        <script src="js/elements.js"></script>
        <script src="js/formulaires.js"></script>
        <script src="js/modifications_gateaux.js"></script>
    </body>
</html>
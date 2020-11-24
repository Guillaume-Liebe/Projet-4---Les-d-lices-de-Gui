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

if (isset($_POST['formconnexion']))
{
    $pseudo_connection = htmlspecialchars($_POST['pseudo_connection']);
    $mail_connection = htmlspecialchars($_POST['mail_connection']);
    $mot_de_passe_connection = sha1($_POST['mot_de_passe_connection']);
    if(!empty($pseudo_connection) AND !empty($mail_connection) AND !empty($mot_de_passe_connection))
    {
        $req= $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND mail = ? AND mot_de_passe = ?");
        $req->execute(array($pseudo_connection, $mail_connection, $mot_de_passe_connection));
        $userexist = $req->rowCount();
        if($userexist == 1)
        {
            $userinfo = $req->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            
            if(isset($_SESSION['id']))
            {
                ?>
                <div class="cadre_bienvenue">
                    <table>                            
                        <tr>
                            <td><br />
                                <?php echo '<font color="#0089d3";>' . "Bonjour" . " " . $_SESSION['pseudo'] . " " . "tu es connecté :)" . "</font>";?>
                                <br />
                                <li><a href="edition_profil.php">Editer mon profil</a></li>
                            </td>
                        </tr>
                    </table> 
                </div>
                <?php
            }
        }
        
        else
        {
            $erreur = "Mauvais mail ou mot de passe";
            ?><?php
        }

    } else
    {
        $erreur = "Tous les champs doivent être rempli";
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
        if(isset($_SESSION['id']))
        {
        ?>
            <div class ="deconnexion"><a href="deconnexion.php">Se déconnecter</a></div>
            <style>
            #identifications a {
                visibility:hidden;
            }
            </style>
        <?php
        }?>

        <!--- <div id="arrierePlan_identifications"></div> --->

         <!--- Formulaire de connexion --->
         <div id="connexion">
                
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>
                            <br>
                            <h4>Connexion</h4>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pseudo">Pseudo :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo_connection" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mail">Mail :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre mail" id="mail" name="mail_connection" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mot_de_passe">Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Mot de passe" id="mot_de_passe" name="mot_de_passe_connection" /><br />
                            <a href="oubli_mot_de_passe.php">Mot de passe oublié ?</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="submit">
                            <input type="submit" name="formconnexion" value="S'identifier" />
                        </td>
                    </tr>  
                </table>
            </form>
            <?php
            if (isset($erreur))
            {
                echo '<font color="red";>' . $erreur . "</font>";
            }
            
            if (isset($envoie))
            {
                echo '<font color="green";>' . $envoie . "</font>";
            }
            ?>
        </div>

        <!-------<script src="js/edition_profil.js"></script> ----->
        <script src="js/formulaires.js"></script>
    </body>
</html>
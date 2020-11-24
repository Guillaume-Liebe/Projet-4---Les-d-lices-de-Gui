<?php 
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

if(isset($_POST['forminscription']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail_confirmation = htmlspecialchars($_POST['mail_confirmation']);
    $mot_de_passe = sha1($_POST['mot_de_passe']);
    $confirmation_mot_de_passe = sha1($_POST['confirmation_mot_de_passe']);


    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail_confirmation']) AND !empty($_POST['mot_de_passe']) AND !empty($_POST['confirmation_mot_de_passe']))
    {

        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        {
           if($mail == $mail_confirmation)
           {
               if (filter_var($mail, FILTER_VALIDATE_EMAIL))
               {
                    $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();

                    if ($mailexist == 0)
                    {

                        if ($mot_de_passe == $confirmation_mot_de_passe)
                        {
                            $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, mot_de_passe) VALUES(?, ?, ?)");
                            $insertmbr->execute(array($pseudo, $mail, $mot_de_passe)); ?>

                            <div class="cadre_inscription">
                                <table>
                                    <tr>
                                        <td><br />
                                            <?php echo '<font color="#0089d3"; font-weight ="bold";>' . "Félicitation ton compte à bien été crée !" . "</font>";?>
                                        </td>
                                    </tr>
                                </table> 
                            </div>
                        <?php
                        }
                        else 
                        { 
                            $erreur = "Vos mots de passes ne correspondent pas !";
                        }
                   
                    } 
                    else 
                    {
                        $erreur = "Adresse mail déjà utilisée !";
                    }

                } 
                else
                {
                    $erreur = "Votre adresse mail n'est pas valide !";
                }

           } 
           else 
           {
                $erreur = "Vos adresses mail ne correspondent pas !";
           }

        } 
        else 
        {
            $erreur = "Votre pseudo dépasse les 255 caractères !";
        }

    } 
    else 
    {  
        $erreur = "Vous n'avez pas rempli tous les champs !";
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
         
        <!--- <div id="arrierePlan_identifications"></div> --->

        <!--- Formulaire d'inscription --->

        <div id="inscription">

            <form method="POST">

                <table>
                    <tr>
                        <td>
                            <br>
                            <h4>Inscription</h4>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pseudo">Pseudo :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mail">Mail :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre mail" id="mail" name="mail" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mail_confirmation">Confirmation du mail :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Confirmez votre mail" id="mail_confirmation" name="mail_confirmation" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mot_de_passe">Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Mot de passe" id="mot_de_passe" name="mot_de_passe" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="confirmation_mot_de_passe">Confirmation mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Confirmez votre mot de passe" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td id="submit">
                            <input type="submit" name="forminscription" value="S'inscrire" />
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
    </body>
</html>
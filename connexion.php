 <?php 

    include('./include/_bdd_call.php');

    if (isset($_POST['pseudo'],$_POST['mdp'])) { 

        $reponse = $bdd->query('SELECT * FROM account WHERE username="'.$_POST["pseudo"].'"')->fetchAll(); 

        if (array_key_exists(0, $reponse)) {

            $donnees = $reponse[0];
            $isPasswordCorrect = password_verify($_POST['mdp'], $donnees['password']);  

            if ($_POST['pseudo'] == $donnees['username'] && $isPasswordCorrect) { 

                session_start();                                                                   
                $_SESSION['username'] = $donnees['username'];   
                $_SESSION['prenom'] = $donnees['prenom'];
                $_SESSION['nom'] = $donnees['nom']; 
                $_SESSION['id_user'] = $donnees['id_user'];      
                $_SESSION['question'] = $donnees['question'];
                $_SESSION['reponse'] = $donnees['reponse'];                                       
                header('LOCATION: index.php');                                                                
            } else { 
                $mauvaisid =  "mauvais identifiant ou mot de passe"; 
            }
        } else { 
            $mauvaisid =  "mauvais identifiant ou mot de passe"; 
        }
                 
    } 

?>
       
<!DOCTYPE html>
<html lang="fr">
    
    <?php include('include/_head.php') ?>
        <title>GBAF - Connexion</title>       
    </head>

    <body class="log_body">

        <!-- HTML FORMULAIRE DE CONNEXION -->

            <form action="connexion.php" method="post">

                <fieldset class="log_form">

                    <div><legend>Connexion</legend></div>
                    <div><p class="log_form__btn_changemenu">Pas de compte ? <a href="inscription.php">Créer un compte</a></p></div>                  
                    <div><label>User name : <input type="text" name="pseudo"  required autocomplete="off"></label></div>    
                    <div><label>Mot de passe : <input type="password" name="mdp" required autocomplete="off"></label></div>
                    <p class="log_form__btn_changemenu"><a href="changement_mdp.php">Mot de passe oublié ? </a></p>
                    <div><input type="submit" value="Se connecter"></div>   
                    <div class="log_form__error_reverse">                                                                                                     
                        <?php 
                            if (isset($mauvaisid)) {
                                echo $mauvaisid ?> <img src="media/error.png" alt="" width="15" height="15"> <?php
                            }     
                        ?>
                    </div> 

                </fieldset>

            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>
    
</html>
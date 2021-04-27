 <?php 

    include('./include/_bdd_call.php');                                                   // appel à la bdd 

    if (isset($_POST['pseudo'],$_POST['mdp'])) { 

        $reponse = $bdd->query('SELECT * FROM account WHERE username="'.$_POST["pseudo"].'"')->fetchAll(); 

        if (array_key_exists(0, $reponse)) {                                               // si le pseudo existe dans la bdd

            $donnees = $reponse[0];                                                        // stock ses valeurs dans $donnees
            $isPasswordCorrect = password_verify($_POST['mdp'], $donnees['password']);     // vérifie le mot de passe

            if ($_POST['pseudo'] == $donnees['username'] && $isPasswordCorrect) {          // si l'username et le mdp sont corrects

                session_start();                                                           // débute la session                 
                $_SESSION['username'] = $donnees['username'];                              // définit les variables de session
                $_SESSION['prenom'] = $donnees['prenom'];
                $_SESSION['nom'] = $donnees['nom']; 
                $_SESSION['id_user'] = $donnees['id_user'];      
                $_SESSION['question'] = $donnees['question'];
                $_SESSION['reponse'] = $donnees['reponse'];                                       
                header('LOCATION: index.php');                                             // va à l'index                        
            } else {                                                                       // sinon
                $mauvaisid =  "mauvais identifiant ou mot de passe";                       // donne la valeur de $mauvaisid
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

        <!-- FORMULAIRE DE CONNEXION -->

            <form action="connexion.php" method="post">

                <fieldset class="log_form">

                    <legend>Connexion</legend>
                    <div><p class="log_form__btn_changemenu">Pas de compte ? <a href="inscription.php">Créer un compte</a></p></div>                  
                    <div><label>User name : <input type="text" name="pseudo"  required autocomplete="off"></label></div>    
                    <div><label>Mot de passe : <input type="password" name="mdp" required autocomplete="off"></label></div>
                    <p class="log_form__btn_changemenu"><a href="changement_mdp.php">Mot de passe oublié ? </a></p>
                    <div><input type="submit" value="Se connecter"></div>   
                    <div class="log_form__error_reverse">                                                                                                     
                        <?php 
                            if (isset($mauvaisid)) {    // si $mauvaisid est définie
                                echo $mauvaisid ?> <img src="media/error.png" alt="" width="15" height="15"> <?php  // display $mauvaisid
                            }     
                        ?>
                    </div> 

                </fieldset>

            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>
    
</html>
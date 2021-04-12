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
                            header('LOCATION: index.php');                                                                
                        }  
            } else { ?>
                <div class="mauvais_id">
                    <img src="media/error.png" alt="" width="15px" height="15px"> 
                    <p>Mauvais identifiant ou mot de passe</p> 
                </div>
                    <?php }
                 
        } 

?>
       
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Connexion</title>
    </head>

    <body>

        <!-- HTML FORMULAIRE DE CONNEXION -->
        <div class="header_inscription_connexion">

            <form action="connexion.php" method="post">

                <fieldset class="formulaire">

                    <legend>Se Connecter</legend>
                    <p class="pasdecompte">Pas de compte ? <a href="inscription.php">Créer un compte</a></p>
                    
                    <div><label>User name : <input type="text" name="pseudo"  required autocomplete="off"></label></div>  
                    <div><label>Mot de passe : <input type="password" name="mdp" required autocomplete="off"></label></div>
                    <p class="pasdecompte"><a href="changement_mdp.php">Mot de passe oublié ? </a></p>
                    <input type="submit">                                                                                                         
                        
                </fieldset>
            </form>

            <div class="illustration">

                    <img id="isometric" src="media/isometric.svg" alt="" width="1000">
                    <img id="isometric2" src="media/isometric2" alt="" width="400">
                    
            </div>
        </div>
    </body>
</html>
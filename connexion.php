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
        } else { 
            $mauvaisid =  "mauvais identifiant ou mot de passe"; 
         }
                 
    } 

?>
       
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.min.css">
        <title>Connexion</title>
    </head>

    <body class="log_body">

        <!-- HTML FORMULAIRE DE CONNEXION -->

            <form action="connexion.php" method="post">

                <fieldset class="log_form">

                    <legend>Se Connecter</legend>
                    <p class="log_form__btn_pasdecompte">Pas de compte ? <a href="inscription.php">Créer un compte</a></p>                   
                    <div><label>User name : <input type="text" name="pseudo"  required autocomplete="off"></label></div>    
                    <div><label>Mot de passe : <input type="password" name="mdp" required autocomplete="off"></label></div>
                    <p class="log_form__btn_mdpoublie"><a href="changement_mdp.php">Mot de passe oublié ? </a></p>
                    <input type="submit">                                                                                                         
                    <?php 
                    if (isset($mauvaisid)) {
                        echo $mauvaisid;
                    }     
                    ?>    
                </fieldset>

            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>
    
</html>
<?php 
    include('./include/_bdd_call.php');
    
    if (isset($_POST['pseudo'])) {
        $isUsername = $bdd->query('SELECT * FROM account WHERE username="'.$_POST["pseudo"].'"')->fetchAll();
        
        if (count($isUsername) != 0) {
            session_start();    
            $donnees = $isUsername[0];
            $_SESSION['id_user'] = $donnees['id_user'];
            $_SESSION['question'] = $donnees['question'];
            $_SESSION['reponse'] = $donnees['reponse'];
            header('Location: changement_mdp_reponse.php'); 
        } else {
            $dontexist = "";
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include('include/_head.php') ?>
        <title>GBAF - Changer son mot de passe</title>       
    </head>

    <body class="log_body">

            <form action="changement_mdp.php" method="post">

                <fieldset class="log_form">

                    <div><legend>Changer son mot de passe</legend></div>
                    <div><p class="log_form__btn_changemenu"><a href="connexion.php">Revenir à la connexion</a></p></div>
                    <div><label>Username : <input type="text" name="pseudo" required autocomplete="off"></label></div>
                    <div><input type="submit" value="Valider"></div>
                    <?php
                        if (isset($_POST['pseudo'])) {
                            echo $dontexist = "Cet username n'existe pas.";
                        }
                         
                    ?>

                </fieldset>

            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>

</html>
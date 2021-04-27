<?php 
    include('./include/_bdd_call.php');                         // appel à la bdd
    
    if (isset($_POST['pseudo'])) {                              // si le champ pseudo est rempli
        $isUsername = $bdd->query('SELECT * FROM account WHERE username="'.$_POST["pseudo"].'"')->fetchAll(); // définit $isUsername comme liste des pseudos égaux à la valeur entrée dans le champ pseudo
        
        if (count($isUsername) != 0) {                          // si la liste n'est pas vide
            session_start();                                    // débute la session
            $donnees = $isUsername[0];                          // $donnees récupère les données de la première entrée de la liste
            $_SESSION['id_user'] = $donnees['id_user'];         // définition des variables de session depuis $donnees
            $_SESSION['question'] = $donnees['question'];
            $_SESSION['reponse'] = $donnees['reponse'];
            header('Location: changement_mdp_reponse.php');     // redirection
        } else {                                                // sinon
            $dontexist = "";                                    // définit $dontexist
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
                        if (isset($_POST['pseudo'])) {                          // si le champ de pseudo est remplit
                            echo $dontexist = "Cet username n'existe pas.";     // echo $dontexist et redéfinit sa valeur
                        }
                         
                    ?>

                </fieldset>

            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>

</html>
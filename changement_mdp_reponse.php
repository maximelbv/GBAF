<?php 
    session_start();                     // débute la session
    include('./include/_bdd_call.php');  // appel à la bdd
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('include/_head.php');?>
        <title>GBAF - Changer son mot de passe</title>       
    </head>

    <body class="log_body">

            <form action="changement_mdp_reponse.php" method="post">

                <fieldset class="log_form">

                    <div><legend>Changer son mot de passe</legend></div>
                    <div><p class="log_form__btn_changemenu"><a href="connexion.php">Revenir à la connexion</a></p></div>
                    <div><label><?php echo $_SESSION['question'] ?> <input type="text" name="reponse" required autocomplete="off"></label></div>
                    <div><label>Nouveau mot de passe : <input type="password" name="nv_password" required autocomplete="off" ></label></div>
                    <div><input type="submit"></div>

                    <?php
                        if (!empty($_POST['reponse']) && isset($_POST['reponse']) && !empty($_POST['nv_password']) && isset($_POST['nv_password'])) { // si les champs sont remplis
                            if ($_POST['reponse'] == $_SESSION['reponse']) {                                    // si le mot de passe est bon
                                $change = $bdd->prepare('UPDATE account SET password = ? WHERE id_user = ?');   // update le password dans la bdd
                                $pass_hash = password_hash($_POST['nv_password'], PASSWORD_DEFAULT);            // hash le password
                                $change->execute([$pass_hash, $_SESSION['id_user']]);                           // execute les changements
                                header('Location: redirection_changement_password.php');                        // redirection
                                $_SESSION['password'] = $_POST['nv_password'];                                  // redéfinit la variable de session
                            } else {                                                                            // sinon
                                echo "Mauvaise réponse secrète";                                                // display une erreur
                            }
                        }
                        
                    ?>

                </fieldset>

            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>
</html>


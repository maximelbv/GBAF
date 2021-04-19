<?php 
    session_start(); 
    include('./include/_bdd_call.php');    
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('include/_head.php') ?>

    <body class="log_body">

            <form action="changement_mdp_reponse.php" method="post">

                <fieldset class="log_form">

                    <legend>Changer son mot de passe</legend>
                    <p class="log_form__btn_reveniralaconnexion"><a href="connexion.php">Revenir à la connexion</a></p>
                    <div><label><?php echo $_SESSION['question'] ?> <input type="text" name="reponse" required autocomplete="off"></label></div>
                    <input type="submit">

                    <?php
                        if (!empty($_POST['reponse']) && isset($_POST['reponse'])) {
                            if ($_POST['reponse'] == $_SESSION['reponse']) {
                                echo "oui";
                            } else {
                                echo "non";
                            }
                        }
                        
                    ?>

                </fieldset>

            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>
</html>


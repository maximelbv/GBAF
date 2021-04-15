<?php 
    include('./include/_bdd_call.php');
    $question = null;
    if (isset($_POST['pseudo'])) {
        $reponse = $bdd->query('SELECT * FROM account WHERE username="'.$_POST["pseudo"].'"')->fetchAll()[0];
        if (!empty($reponse)) {
            session_start();
            $_SESSION['question'] = $reponse['question'];
            $question = $reponse['question'];
        } else {
            echo "non";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('include/_head.php') ?>

    <body class="log_body">

            <form action="changement_mdp.php" method="post">

                <fieldset class="log_form">

                    <legend>Changer son mot de passe</legend>
                    <p class="log_form__btn_reveniralaconnexion"><a href="connexion.php">Revenir à la connexion</a></p>
                    <div><label>Username : <input type="text" name="pseudo" required autocomplete="off"></label></div>
                    <input type="submit">
                    <p><?php echo $question; ?></p>

                </fieldset>

            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>

</html>
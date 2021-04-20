<?php 
    session_start(); 
    include('./include/_bdd_call.php');    
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('include/_head.php');?>
        <title>GBAF - Changer son mot de passe</title>       
    </head>

    <body class="log_body">

            <form action="changement_mdp_reponse.php" method="post">

                <fieldset class="log_form">

                    <legend>Changer son mot de passe</legend>
                    <p class="log_form__btn_reveniralaconnexion"><a href="connexion.php">Revenir à la connexion</a></p>
                    <div><label><?php echo $_SESSION['question'] ?> <input type="text" name="reponse" required autocomplete="off"></label></div>
                    <div><label>Nouveau mot de passe : <input type="text" name="nv_password" required autocomplete="off"></label></div>
                    <input type="submit">

                    <?php
                        if (!empty($_POST['reponse']) && isset($_POST['reponse']) && !empty($_POST['nv_password']) && isset($_POST['nv_password'])) {
                            if ($_POST['reponse'] == $_SESSION['reponse']) {
                                $change = $bdd->prepare('UPDATE account SET password = ? WHERE id_user = ?');
                                $pass_hash = password_hash($_POST['nv_password'], PASSWORD_DEFAULT);
                                $change->execute([$pass_hash, $_SESSION['id_user']]);
                                header('Location: redirection_changement_password.php');
                                $_SESSION['password'] = $_POST['nv_password'];
                            } else {
                                echo "Mauvaise réponse secrète";
                            }
                        }
                        
                    ?>

                </fieldset>

            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>
</html>


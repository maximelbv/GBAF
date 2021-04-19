<?php 
    session_start(); 
    include('include/_bdd_call.php');
    $liste = $bdd->query('SELECT username FROM account WHERE username="'.$_POST["nv_username"].'"')->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include('include/_head.php') ?>

    <body>
        <?php include('include/_header.php') ?>


        <form action="compte.php" method="post">

            <fieldset class="log_form">

                <legend>Mon Compte</legend>
                    
                <div><label>Changer son prénom : <input type="text" name="nv_prenom" placeholder ="<?php echo $_SESSION['prenom'] ?>"></label></div>
                <div><label>Changer son nom : <input type="text" name="nv_nom" placeholder ="<?php echo $_SESSION['nom'] ?>"></label></div>
                <div><label>Changer son username : <input type="text" name="nv_username" placeholder ="<?php echo $_SESSION['username'] ?>"></label></div>
                <div><label>Changer son mot de passe : <input type="password" name="nv_password"></label></div>
                <div><input type="submit" value="Envoyer"></div>

                <?php
                        if (!empty($_POST['nv_prenom']) && isset($_POST['nv_prenom'])) {
                            $change = $bdd->prepare('UPDATE account SET prenom = ? WHERE id_user = ?');
                            $change->execute([$_POST['nv_prenom'], $_SESSION['id_user']]);
                            header('Location: redirection_changement_infos.php');
                        }
                        if (!empty($_POST['nv_nom']) && isset($_POST['nv_nom'])) {
                            $change = $bdd->prepare('UPDATE account SET nom = ? WHERE id_user = ?');
                            $change->execute([$_POST['nv_nom'], $_SESSION['id_user']]);
                            header('Location: redirection_changement_infos.php');
                        }
                        if (!empty($_POST['nv_username']) && isset($_POST['nv_username']) && count($liste) == 0) {
                                
                                $change = $bdd->prepare('UPDATE account SET username = ? WHERE id_user = ?');
                                $change->execute([$_POST['nv_username'], $_SESSION['id_user']]);
                                header('Location: redirection_changement_infos.php');
                            } else if (!empty($_POST['nv_username']) && isset($_POST['nv_username'])) {
                                echo "identifiant déjà utilisé";
                            }
                            
                        
                        if (!empty($_POST['nv_password']) && isset($_POST['nv_password'])) {
                            $change = $bdd->prepare('UPDATE account SET password = ? WHERE id_user = ?');
                            $pass_hash = password_hash($_POST['nv_password'], PASSWORD_DEFAULT);
                            $change->execute([$pass_hash, $_SESSION['id_user']]);
                            header('Location: redirection_changement_infos.php');
                        }
                        
                ?>
                        
                        <pre><?php print_r(count($liste)); ?></pre>
            </fieldset>

        </form>
            
        <?php include('include/_footer.php') ?>
    </body>

</html>
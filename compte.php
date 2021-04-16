<?php 
    session_start(); 
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
                <div><label>Changer son mot de passe : <input type="password" name="nv_mdp"></label></div>
                <div><input type="submit" value="Envoyer"></div>

            </fieldset>

        </form>
            
        <?php include('include/_footer.php') ?>
    </body>

</html>
<?php 
    session_start(); 
    include('include/_bdd_call.php');
    $liste = null;
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include('include/_head.php') ?>
        <title>GBAF - Mon compte</title>       
    </head>

    <body class="body_compte">
        <?php include('include/_header.php') ?>


        <form action="compte.php" method="post">

            <fieldset class="log_form">

                <legend>Mon Compte</legend>
                    
                <div><label>Changer son prénom : <input type="text" name="nv_prenom" autocomplete="off" placeholder ="<?php echo $_SESSION['prenom'] ?>"></label></div>
                <div><label>Changer son nom : <input type="text" name="nv_nom" autocomplete="off" placeholder ="<?php echo $_SESSION['nom'] ?>"></label></div>
                <div><label>Changer son username : <input type="text" name="nv_username" autocomplete="off" placeholder ="<?php echo $_SESSION['username'] ?>"></label></div>
                <div><label>Changer son mot de passe : <input type="password" autocomplete="off" name="nv_password"></label></div>
                <div><label>Changer sa question secrète : <input type="text" name="nv_question" autocomplete="off" placeholder ="<?php echo $_SESSION['question'] ?>"></label></div>
                <div><label>Changer sa réponse secrète : <input type="text" name="nv_reponse" autocomplete="off"></label></div>
                <div><input type="submit" value="Envoyer"></div>

                <?php
                    if (!empty($_POST['nv_prenom']) && isset($_POST['nv_prenom'])) {
                        $change = $bdd->prepare('UPDATE account SET prenom = ? WHERE id_user = ?');
                        $change->execute([$_POST['nv_prenom'], $_SESSION['id_user']]);
                        header('Location: redirection_changement_infos.php');
                        $_SESSION['prenom'] = $_POST['nv_prenom'];
                    }
                    if (!empty($_POST['nv_nom']) && isset($_POST['nv_nom'])) {
                        $change = $bdd->prepare('UPDATE account SET nom = ? WHERE id_user = ?');
                        $change->execute([$_POST['nv_nom'], $_SESSION['id_user']]);
                        header('Location: redirection_changement_infos.php');
                        $_SESSION['nom'] = $_POST['nv_nom'];
                    }
                    if (!empty($_POST['nv_username']) && isset($_POST['nv_username'])) { 
                        $liste = $bdd->query('SELECT username FROM account WHERE username="'.$_POST["nv_username"].'"')->fetchAll();
                        if (count($liste) == 0) {
                            $change = $bdd->prepare('UPDATE account SET username = ? WHERE id_user = ?');
                            $change->execute([$_POST['nv_username'], $_SESSION['id_user']]);
                            header('Location: redirection_changement_infos.php');
                            $_SESSION['username'] = $_POST['nv_username'];
                        } else if (!empty($_POST['nv_username']) && isset($_POST['nv_username'])) {
                            echo "identifiant déjà utilisé";
                        }    
                    }
                    if (!empty($_POST['nv_password']) && isset($_POST['nv_password'])) {
                        $change = $bdd->prepare('UPDATE account SET password = ? WHERE id_user = ?');
                        $pass_hash = password_hash($_POST['nv_password'], PASSWORD_DEFAULT);
                        $change->execute([$pass_hash, $_SESSION['id_user']]);
                        header('Location: redirection_changement_infos.php');
                        $_SESSION['password'] = $_POST['nv_password'];
                    }
                    if (!empty($_POST['nv_question']) && isset($_POST['nv_question'])) {
                        $change = $bdd->prepare('UPDATE account SET question = ? WHERE id_user = ?');
                        $change->execute([$_POST['nv_question'], $_SESSION['id_user']]);
                        header('Location: redirection_changement_infos.php');
                        $_SESSION['question'] = $_POST['nv_question'];
                    }
                    if (!empty($_POST['nv_reponse']) && isset($_POST['nv_reponse'])) {
                        $change = $bdd->prepare('UPDATE account SET reponse = ? WHERE id_user = ?');
                        $change->execute([$_POST['nv_reponse'], $_SESSION['id_user']]);
                        header('Location: redirection_changement_infos.php');
                        $_SESSION['reponse'] = $_POST['nv_reponse'];
                    }
                ?>
                        
            </fieldset>

        </form>
            
        <?php include('include/_footer.php') ?>
    </body>

</html>
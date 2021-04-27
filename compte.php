<?php 
    session_start();                      //débute la session
    include('include/_bdd_call.php');     // appel à la bdd
    $liste = null;                        // définit liste comme null (pour éviter une erreur undefined index)
    if (!isset ($_SESSION['username'])) {       // si la variable 'username' de la session n'est pas définie
        include('include/_redirection.php');    // inclus le code de 'redirection.php' (qui renvoie vers la page de connexion)
    }
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
                    
                <div><label>Changer son prénom : <input type="text" name="nv_prenom" autocomplete="off" placeholder ="<?php echo $_SESSION['prenom'] ?>" minlength="3" maxlength="20"></label></div>
                <div><label>Changer son nom : <input type="text" name="nv_nom" autocomplete="off" placeholder ="<?php echo $_SESSION['nom'] ?>" minlength="3" maxlength="20"></label></div>
                <div><label>Changer son username : <input type="text" name="nv_username" autocomplete="off" placeholder ="<?php echo $_SESSION['username'] ?>" minlength="4" maxlength="20"></label></div>
                <div><label>Changer son mot de passe : <input type="password" autocomplete="off" name="nv_password" minlength="4" maxlength="20"></label></div>
                <div><label>Changer sa question secrète : <input type="text" name="nv_question" autocomplete="off" placeholder ="<?php echo $_SESSION['question'] ?>"></label></div>
                <div><label>Changer sa réponse secrète : <input type="text" name="nv_reponse" autocomplete="off"></label></div>
                <div><input type="submit" value="Envoyer"></div>

                <?php
                    if (!empty($_POST['nv_prenom']) && isset($_POST['nv_prenom'])) {                    // si le champ est rempli
                        $change = $bdd->prepare('UPDATE account SET prenom = ? WHERE id_user = ?');     // update dans la bdd 
                        $change->execute([$_POST['nv_prenom'], $_SESSION['id_user']]);                  // avec les informations remplies dans le champ
                        header('Location: redirection_changement_infos.php');                           // redirection
                        $_SESSION['prenom'] = $_POST['nv_prenom'];                                      // redéfinit la variable de session
                    }
                    if (!empty($_POST['nv_nom']) && isset($_POST['nv_nom'])) {                          // si le champ est rempli
                        $change = $bdd->prepare('UPDATE account SET nom = ? WHERE id_user = ?');        // update dans la bdd 
                        $change->execute([$_POST['nv_nom'], $_SESSION['id_user']]);                     // avec les informations remplies dans le champ
                        header('Location: redirection_changement_infos.php');                           // redirection
                        $_SESSION['nom'] = $_POST['nv_nom'];                                            // redéfinit la variable de session
                    }
                    if (!empty($_POST['nv_username']) && isset($_POST['nv_username'])) {                // si le champ est rempli
                        $liste = $bdd->query('SELECT username FROM account WHERE username="'.$_POST["nv_username"].'"')->fetchAll(); // $liste est égal aux usernames de la bdd qui sont égaux aux entrées dans le champ 'username'
                        if (count($liste) == 0) {                                                       // si l'username entré dans le champ n'existe pas déjà en bdd
                            $change = $bdd->prepare('UPDATE account SET username = ? WHERE id_user = ?'); // update dans la bdd 
                            $change->execute([$_POST['nv_username'], $_SESSION['id_user']]);            // avec les informations remplies dans le champ
                            header('Location: redirection_changement_infos.php');                       // redirection
                            $_SESSION['username'] = $_POST['nv_username'];                              // redéfinit la variable de session
                        } else if (!empty($_POST['nv_username']) && isset($_POST['nv_username'])) {     // sinon (et seulement si les champs sont remplis)
                            echo "identifiant déjà utilisé";                                            // display l'erreur "identifiant déjà utilisé"
                        }    
                    }
                    if (!empty($_POST['nv_password']) && isset($_POST['nv_password'])) {                // si le champ est rempli
                        $change = $bdd->prepare('UPDATE account SET password = ? WHERE id_user = ?');   // update dans la bdd 
                        $pass_hash = password_hash($_POST['nv_password'], PASSWORD_DEFAULT);            // hash le password
                        $change->execute([$pass_hash, $_SESSION['id_user']]);                           // execute le bdd update avec les informations remplies dans le champ
                        header('Location: redirection_changement_infos.php');                           // redirection
                        $_SESSION['password'] = $_POST['nv_password'];                                  // redéfinit la variable de session
                    }
                    if (!empty($_POST['nv_question']) && isset($_POST['nv_question'])) {                // si le champ est rempli
                        $change = $bdd->prepare('UPDATE account SET question = ? WHERE id_user = ?');   // update dans la bdd 
                        $change->execute([$_POST['nv_question'], $_SESSION['id_user']]);                // avec les informations remplies dans le champ
                        header('Location: redirection_changement_infos.php');                           // redirection
                        $_SESSION['question'] = $_POST['nv_question'];
                    }
                    if (!empty($_POST['nv_reponse']) && isset($_POST['nv_reponse'])) {                  // si le champ est rempli
                        $change = $bdd->prepare('UPDATE account SET reponse = ? WHERE id_user = ?');    // update dans la bdd 
                        $change->execute([$_POST['nv_reponse'], $_SESSION['id_user']]);                 // avec les informations remplies dans le champ
                        header('Location: redirection_changement_infos.php');                           // redirection
                        $_SESSION['reponse'] = $_POST['nv_reponse'];                                    // redéfinit la variable de session
                    }
                ?>
                        
            </fieldset>

        </form>
            
        <?php include('include/_footer.php') ?>
    </body>

</html>
<!DOCTYPE html>

<html lang="fr">

    <?php include('include/_head.php') ?>
        <title>GBAF - Inscription</title>       
    </head>

    <body class="log_body">

                <!-- Formulaire d'inscription -->

            <form  action="inscription.php" method="post"> 

                <fieldset class="log_form">

                    <legend>Inscription</legend>

                    <div><p class="log_form__btn_changemenu">Déjà membre ? <a href="connexion.php">Se connecter</a></p></div>
                
                    <div> <label>Nom : <input type="text" name="nom" required autocomplete="off" placeholder="Doe" minlength="3" maxlength="20"></label> </div>

                    <div> <label>Prénom : <input type="text" name="prenom" required autocomplete="off" placeholder="John" minlength="3" maxlength="20"></label> </div>

                    <div> <label>User Name : <input type="text" name="username" required autocomplete="off" minlength="4" maxlength="20"></label> </div>

                    <div> <label>Mot de passe : <input type="password" name="password" required autocomplete="off" minlength="4" maxlength="20"></label> </div>

                    <div><label>Question secrète : <input type="text" name="question_secrete" required autocomplete="off"></label></div>

                    <div> <label>Réponse à la question secrète : <input type="text" name="reponse_secrete" required autocomplete="off"></label> </div>

                    <div>
                        <input type="submit" value="Créer mon compte">
                        <input type="reset" value="Remettre à zéro">  
                    </div> 
                    
                    <?php

                    include('./include/_bdd_call.php'); // appel à la bdd

                        if (isset($_POST['nom']) && !empty($_POST['nom']) // si tout les champs sont remplis et non vides
                        && isset($_POST['prenom']) && !empty($_POST['prenom']) 
                        && isset($_POST['username']) && !empty($_POST['username']) 
                        && isset($_POST['password']) &&!empty($_POST['password']) 
                        && isset($_POST['reponse_secrete']) && !empty($_POST['reponse_secrete'])) {

                            $reponse = $bdd->query('SELECT * FROM account WHERE username="'.$_POST["username"].'"')->fetchAll(); // stock dans $reponse les entrées de account quand l'username est égal a l'username entré
                            if (count($reponse) == 0) { // si l'identifiant n'existe pas dans la base de données
                                    $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash le password  
                                    $reponse = $bdd->prepare('INSERT INTO account(nom,prenom,username,password,question,reponse) VALUES(?,?,?,?,?,?)'); // insère une nouvelle entrée dans la bdd
                                    $reponse->execute(array($_POST['nom'], $_POST['prenom'], $_POST['username'], $pass_hash, $_POST['question_secrete'], $_POST['reponse_secrete'])); // execute les entrées du formulaire en tant que valeurs pour les données demandées dans $reponse et inclut les dans la bdd   
                                    header('Location: redirection_nv_compte.php'); // redirection 
                            } else { ?>   
                                <div class="log_form__error">
                                    <img src="media/error.png" alt="erreur" width="15" height="15"> 
                                    <p>identifiant déjà utilisé</p> 
                                </div>
                        <?php }

                    } ?> 
                    
                </fieldset>
                  
            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>
</html>
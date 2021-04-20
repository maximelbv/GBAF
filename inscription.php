<!DOCTYPE html>

<html lang="fr">

    <?php include('include/_head.php') ?>
        <title>GBAF - Inscription</title>       
    </head>

    <body class="log_body">
        
            <form  action="inscription.php" method="post">

                <fieldset class="log_form">

                    <legend>Inscription</legend>

                    <p class="log_form__btn_dejamembre">Déjà membre ? <a href="connexion.php">Se connecter</a></p>
                
                    <div> <label>Nom : <input type="text" name="nom" required autocomplete="off" placeholder="Doe"></label> </div>

                    <div> <label>Prénom : <input type="text" name="prenom" required autocomplete="off" placeholder="John"></label> </div>

                    <div> <label>User Name : <input type="text" name="username" required autocomplete="off"></label> </div>

                    <div> <label>Mot de passe : <input type="password" name="password" required autocomplete="off"></label> </div>

                    <div><label>Question secrète : <input type="text" name="question_secrete" required autocomplete="off"></input></label></div>

                    <div> <label>Réponse à la question secrète : <input type="text" name="reponse_secrete" required autocomplete="off"></label> </div>

                    <div>
                        <input type="submit" value="Créer mon compte">
                        <input type="reset" value="Annuler">  
                    </div> 
                    
                    <?php

                    include('./include/_bdd_call.php');

                        if (isset($_POST['nom']) && !empty($_POST['nom'])
                        && isset($_POST['prenom']) && !empty($_POST['prenom']) 
                        && isset($_POST['username']) && !empty($_POST['username']) 
                        && isset($_POST['password']) &&!empty($_POST['password']) 
                        && isset($_POST['reponse_secrete']) && !empty($_POST['reponse_secrete'])) {

                            $reponse = $bdd->query('SELECT * FROM account WHERE username="'.$_POST["username"].'"')->fetchAll(); 
                            if (count($reponse) == 0) {
                                    $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);                                                                                 // hash le password  
                                    $reponse = $bdd->prepare('INSERT INTO account(nom,prenom,username,password,question,reponse) VALUES(?,?,?,?,?,?)');          // va chercher les données de la bdd et demande leur valeur via $reponse
                                    $reponse->execute(array($_POST['nom'], $_POST['prenom'], $_POST['username'], $pass_hash, $_POST['question_secrete'], $_POST['reponse_secrete'])); // execute les entrées du formulaire en tant que valeurs pour les données demandées dans $reponse et inclut les dans la bdd   
                                    header('Location: redirection_nv_compte.php');      
                            } else { ?>   
                                <div class="log_form__error_iddejautilise">
                                    <img src="media/error.png" alt="" width="15" height="15"> 
                                    <p>identifiant déjà utilisé</p> 
                                </div>
                        <?php }

                    } ?> 
                    
                </fieldset>
                  
            </form>

            <?php include('include/_log_illustration.php') ?>

    </body>
</html>
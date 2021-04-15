<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.min.css">
        <title>Inscription</title>
    </head>

    <body class="body_inscription">
        
        <div class="header_inscription_connexion">

            <form  action="inscription.php" method="post">

                <fieldset class="formulaire">

                    <legend>S'inscrire</legend>

                    <p class="dejamembre">Déjà membre ? <a href="connexion.php">Se connecter</a></p>
                
                    <div> <label>Nom : <input type="text" name="nom" required autocomplete="off" placeholder="Doe"></label> </div>

                    <div> <label>Prénom : <input type="text" name="prenom" required autocomplete="off" placeholder="John"></label> </div>

                    <div> <label>User Name : <input type="text" name="username" required autocomplete="off"></label> </div>

                    <div> <label>Mot de passe : <input type="password" name="password" required autocomplete="off"></label> </div>

                    <div>
                        <label>Question secrète : 
                            <select name="question_secrete">
                                <option value="choix" disabled>--Choisissez une option--</option>
                                <option value="Dans quelle ville êtes-vous né ?">Dans quelle ville êtes-vous né ?</option>
                                <option value="Quel est votre film favori ?">Quel est votre film favori ?</option>
                                <option value="Quelle est votre couleur favorite ?">Quelle est votre couleur favorite ?</option>
                                <option value="Quel est le prénom de votre grand-mère maternelle ?">Quel est le prénom de votre grand-mère maternelle ?</option>
                            </select>    
                        </label>
                    </div>

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
                                    header('Location: redirection.php');      
                            } else { ?>   
                                <div class="id_deja_utilise">
                                    <img src="media/error.png" alt="" width="15" height="15"> 
                                    <p>identifiant déjà utilisé</p> 
                                </div>
                        <?php }

                    } ?> 
                    
                </fieldset>
                  
            </form>

            <div class="illustration">
                <img id="isometric" src="media/isometric.svg" alt="" width="1000">
                <img id="isometric2" src="media/isometric2" alt="" width="400">
            </div>

        </div>
        
    </body>
</html>
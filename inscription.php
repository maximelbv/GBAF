

<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
    </head>
    <body class="body_inscription">
        
        <div class="header_inscription_connexion">
            <form  action="inscription.php" method="post">
                <fieldset class="formulaire">
                <legend>S'inscrire</legend>
                <p class="dejamembre">Déjà membre ? <a href="connexion.php">Se connecter</a></p>
                
                    <div>
                        <label for="nom">Nom : </label>
                        <input type="text" name="nom" required autocomplete="off" placeholder="Doe">
                    </div>

                    <div>
                        <label for="prenom">Prénom : </label>
                        <input type="text" name="prenom" required autocomplete="off" placeholder="John">
                    </div>

                    <div>
                        <label for="username">User Name : </label>
                        <input type="text" name="username" required autocomplete="off">
                    </div>

                    <div>
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" required autocomplete="off">
                    </div>

                    <div>
                        <label for="question_secrete">Question secrète : </label>
                        <select name="question_secrete">
                            <option value="choix" disabled>--Choisissez une option--</option>
                            <option value="opt1">Dans quelle ville êtes-vous né ?</option>
                            <option value="opt2">Quel est votre film favori ?</option>
                            <option value="opt3">Quelle est votre couleur favorite ?</option>
                            <option value="opt4">Quel est le prénom de votre grand-mère maternelle ?</option>
                        </select>    
                    </div>

                    <div>
                        <label for="reponse_secrete">Réponse à la question secrète : </label>
                        <input type="text" name="reponse_secrete" required autocomplete="off">
                    </div>

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

                        // SI tout les champs sont remplis et non vides

                        $reponse = $bdd->query('SELECT * FROM utilisateurs WHERE username="'.$_POST["username"].'"')->fetchAll(); 
                        if (count($reponse) == 0) {
                            $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);                                                                                 // hash le password  
                            $reponse = $bdd->prepare('INSERT INTO utilisateurs(nom,prenom,username,password,question_secrete,reponse_secrete) VALUES(?,?,?,?,?,?)');          // va chercher les données de la bdd et demande leur valeur via $reponse
                            $reponse->execute(array($_POST['nom'], $_POST['prenom'], $_POST['username'], $pass_hash, $_POST['question_secrete'], $_POST['reponse_secrete'])); // execute les entrées du formulaire en tant que valeurs pour les données demandées dans $reponse et inclut les dans la bdd            
                        } else {
                            ?> 
                            <div class="id_deja_utilise">
                                <img src="media/error.png" alt="" width="15px" height="15px"> 
                                <p>identifiant déjà utilisé</p> 
                            </div>
                            <?php
                        }

                    }  
                    ?>

                </fieldset>
                
               
            </form>

            <div class="illustration">
                <img id="isometric" src="media/isometric.svg" alt="" width="1000px">
                <img id="isometric2" src="media/isometric2" alt="" width="400px">
            </div>

                </div>
        
    </body>
</html>
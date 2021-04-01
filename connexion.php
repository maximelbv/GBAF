 <?php 

        include('./include/_bdd_call.php');

        // PHP FORMULAIRE CONNEXION 

        if (isset($_POST['pseudo'],$_POST['mdp'])) {                                                              // SI les pseudos et mdp sont dans le formulaire : 
            $reponse = $bdd->query('SELECT * FROM utilisateurs where username="'.$_POST["pseudo"].'"')->fetch();  // va chercher les valeurs d username en bdd et mets les dans $reponse 
            $isPasswordCorrect = password_verify($_POST['mdp'], $reponse['password']);                            // initialise la verification de password et mets là dans $isPasswordCorrect

            if ($_POST['pseudo'] == $reponse['username'] && $isPasswordCorrect) {                                 // SI le pseudo entré correspond à un pseudo dans la bdd ET SI le mdp correspond
                    session_start();                                                                              // débute la session 
                    $_SESSION['username'] = $reponse['username'];                                                 // définit l'username en tant que username de session
                    header('Location: index.php');                                                                // renvoie vers l'index

                } else {                                                                                          
                    echo "Mauvais identifiant ou mot de passe";
                }
        }

        // PHP FORMULAIRE INSCRIPTION   

        if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) &&!empty($_POST['password']) && isset($_POST['reponse_secrete']) && !empty($_POST['reponse_secrete'])) {
        
        // SI tout les champs sont remplis et non vides (possible de réduire la condition?)   

            $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);                                                                                 // hash le password  
            $reponse = $bdd->prepare('INSERT INTO utilisateurs(nom,prenom,username,password,question_secrete,reponse_secrete) VALUES(?,?,?,?,?,?)');          // va chercher les données de la bdd et demande leur valeur via $reponse
            $reponse->execute(array($_POST['nom'], $_POST['prenom'], $_POST['username'], $pass_hash, $_POST['question_secrete'], $_POST['reponse_secrete'])); // execute les entrées du formulaire en tant que valeurs pour les données demandées dans $reponse et inclut les dans la bdd
            
        } 
    ?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style_form.css">
        <title>Connexion</title>
    </head>

    <body>

        <!-- HTML FORMULAIRE DE CONNEXION -->
        
        <form action="" method="post">
            <fieldset class="formulaire_inscription">
                <legend>Connexion</legend>
                <label for="pseudo">User name : </label>
                <input type="text" name="pseudo">
                <label for="mdp">Mot de passe : </label>
                <input type="text" name="mdp">
                <input type="submit">
            </fieldset>
        </form>

        <!-- HTML FORMULAIRE D'INSCRIPTION -->

        <form  action="" method="post">
            <fieldset class="formulaire_inscription">
            <legend>Inscription</legend>
                <label for="nom">Nom : </label>
                <input type="text" name="nom" required autocomplete="off">
                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" required autocomplete="off">
                <label for="username">User Name : </label>
                <input type="text" name="username" required autocomplete="off">
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" required autocomplete="off">
                <label for="question_secrete">Question secrète : </label>
                <select name="question_secrete">
                    <option value="choix" disabled>--Choisissez une option--</option>
                    <option value="opt1">Dans quelle ville êtes-vous né ?</option>
                    <option value="opt2">Quel est votre film favori ?</option>
                    <option value="opt3">Quelle est votre couleur favorite ?</option>
                    <option value="opt4">Quel est le prénom de votre grand-mère maternelle ?</option>
                </select>    
                <label for="reponse_secrete">Réponse à la question secrète : </label>
                <input type="text" name="reponse_secrete" required autocomplete="off">
                <input type="reset" value="Annuler">
                <input type="submit" value="Créer mon compte">
            </fieldset>
        </form>
    
    </body>
</html>
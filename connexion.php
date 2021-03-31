<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

    <?php include('./include/_bdd_call.php')?>
    
    <form action="" method="post">
        <fieldset>
            <legend>Connexion</legend>
            <label for="pseudo">User name : </label>
            <input type="text" name="pseudo">
            <label for="mdp">Mot de passe : </label>
            <input type="text" name="mdp">
            <input type="submit">
        </fieldset>
    </form>

    <?php 

        

        if (isset($_POST['pseudo'],$_POST['mdp'])) {
            $reponse = $bdd->query('SELECT * FROM utilisateurs where username="'.$_POST["pseudo"].'"')->fetch();
            $isPasswordCorrect = password_verify($_POST['mdp'], $reponse['password']);

            if ($_POST['pseudo'] == $reponse['username'] && $isPasswordCorrect) {
                    echo "oui";
                } else {
                    echo "non";
                }
        }
    ?>

</body>
</html>
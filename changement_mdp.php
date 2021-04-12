<?php 
    include('./include/_bdd_call.php');
    $question = null;
    if (isset($_POST['pseudo'])) {
        $reponse = $bdd->query('SELECT * FROM account WHERE username="'.$_POST["pseudo"].'"')->fetchAll()[0];
        if (!empty($reponse)) {
            session_start();
            $_SESSION['question'] = $reponse['question'];
            $question = $reponse['question'];
        } else {
            echo "non";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Changement de mot de passe</title>
</head>
<body>
    <div class="header_inscription_connexion">
        <form action="changement_mdp.php" method="post">
        <fieldset class="formulaire">
            <legend>Changer son mot de passe</legend>
            <p class="dejamembre"><a href="connexion.php">Revenir à la connexion</a></p>
            <div><label>Username : <input type="text" name="pseudo" required autocomplete="off"></label></div>
            
            <input type="submit">
            <p><?php echo $question; ?></p>
            </fieldset>
        </form>

        <div class="illustration">
            <img id="isometric" src="media/isometric.svg" alt="" width="1000">
            <img id="isometric2" src="media/isometric2" alt="" width="400">                    
        </div>
    </div>
</body>
</html>

<?php 
    
?>
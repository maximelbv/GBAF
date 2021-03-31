<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_form.css">
    <title>Inscription</title>
</head>
<body>

    <?php include('./include/_bdd_call.php')?>
    
    <form  action="" method="post">
        <fieldset class="formulaire_inscription">
        <legend>Inscription</legend>
            <label for="nom">Nom : </label>
            <input type="text" name="nom">
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom">
            <label for="username">User Name : </label>
            <input type="text" name="username">
            <label for="password">Mot de passe : </label>
            <input type="text" name="password">
            <label for="question_secrete">Question secrète : </label>
            <input type="list" name="question_secrete">
            <label for="reponse_secrete">Réponse à la question secrète : </label>
            <input type="text" name="reponse_secrete">
            <input type="submit">
        </fieldset>
    </form>

    <?php 

        if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) &&!empty($_POST['password']) && isset($_POST['question_secrete']) && !empty($_POST['question_secrete']) && isset($_POST['reponse_secrete']) && !empty($_POST['reponse_secrete'])) {
            
            $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $reponse = $bdd->prepare('INSERT INTO utilisateurs(nom,prenom,username,password,question_secrete,reponse_secrete) VALUES(?,?,?,?,?,?)');
            $reponse->execute(array($_POST['nom'], $_POST['prenom'], $_POST['username'], $pass_hash, $_POST['question_secrete'], $_POST['reponse_secrete']));
            
        }
    ?>

</body>
</html>
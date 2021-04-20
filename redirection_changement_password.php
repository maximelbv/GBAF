<!DOCTYPE html>
<html lang="fr">

<?php include('include/_head.php') ?>

<body class="body_redirection">
    <img src="media/check.png" alt="" width="100px">
    <h1>Succès !</h1>
    <h2>Votre mot de passe a été modifié <br>vous allez être redirigé vers la page de connexion.</h2>
    <img src="media/loading.gif" alt="" width="150px" height="150px">
    <?php
        header("Refresh:3; url=http://localhost/Formation/GBAF/connexion.php");
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">

<?php include('include/_head.php') ?>

<body class="body_redirection">
    <img src="media/check.png" alt="validé" width="100px">
    <h1>Succès !</h1>
    <h2>Votre compte été créé <br>vous allez être redirigé vers la page de connexion.</h2>
    <?php
        header("Refresh:3; url=http://localhost/Formation/GBAF/connexion.php");
    ?>
</body>
</html>
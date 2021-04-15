<!DOCTYPE html>
<html lang="fr">

<?php include('include/_head.php') ?>

<body>
    <h1>Votre compte a bien été créé, vous allez être redirigé vers la page de connexion.</h1>
    <?php
        header("Refresh:5; url=http://localhost/Formation/GBAF/connexion.php");
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">

<?php include('include/_head.php') ?>

<body class="body_redirection">
    <img src="media/check.png" alt="" width="100px">
    <h1>Succès !</h1>
    <h2>Vos informations ont bien été modifiées.</h2>
    <?php
        header("Refresh:3; url=http://localhost/Formation/GBAF/compte.php");
    ?>
</body>
</html>
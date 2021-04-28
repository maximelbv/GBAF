<!DOCTYPE html>
<html lang="fr">

    <?php include('include/_head.php') ?>
        <title>GBAF</title>       
    </head>

    <body class="body_redirection">
        <img src="media/check.png" alt="validé" width="100px">
        <h1>Succès !</h1>
        <h2>Vos informations ont bien été modifiées.</h2>
        <img src="media/loading.gif" alt="chargement" width="150px" height="150px">
        <?php
            header("Refresh:2; url=http://localhost/Formation/GBAF/compte.php");
        ?>
    </body>
</html>
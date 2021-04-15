<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 1366px)" href="./css/queries_1366x725.min.css" />
    <link rel="stylesheet" media="screen and (max-width: 725px)" href="./css/queries_725x250.min.css" />
    <title>Document</title>
</head>
<body>
    <h1>Votre compte a bien été créé, vous allez être redirigé vers la page de connexion.</h1>
    <?php
        header("Refresh:5; url=http://localhost/Formation/GBAF/connexion.php");
    ?>
</body>
</html>
<?php
    session_start();

    include('_bdd_call.php');

    $reponse = $bdd->query('SELECT * FROM utilisateurs where username="'.$_SESSION["username"].'"')->fetch();
    $_SESSION['nom'] = $reponse['nom'];
    $_SESSION['prenom'] = $reponse['prenom'];
?>
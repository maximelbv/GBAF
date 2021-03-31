<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/single_acteur.css">
    <title>Titre</title>
</head>
<body>

    <?php include('./include/_bdd_call.php') ?>

    <?php include("./include/_header.php");

            $reponse = $bdd->prepare('SELECT * FROM acteurs WHERE identifiant=?');
            $reponse->execute(array($_GET['id']));
            
            while ($donnees = $reponse->fetch()) :
            ?>    
                <img class="logo" src="<?php echo $donnees['logo'] ?>" alt="">
                <h2><?php echo $donnees['nom'] ?></h2>
                <a href="">Lien</a>
                <p><?php echo $donnees['description'] ?></p>
            <?php
            endwhile
            ?>
         
    <!-- <section class="commentaires">  

        <div class="header_commentaires">
            <h3 class="nb_commentaire">X commentaires</h3>
            <input class="nv_commentaire" type="button" value="Nouveau commentaire">
            <input class="pouce_vert" type="button" value="+">
            <input class="pouce_rouge" type="button" value ="-">
        </div>

        <div class="commentaire">
            <p>Prénom</p>
            <p>date</p>
            <p>texte</p>
        </div>

        <div class="commentaire">
            <p>Prénom</p>
            <p>date</p>
            <p>texte</p>
        </div>

        <div class="commentaire">
            <p>Prénom</p>
            <p>date</p>
            <p>texte</p>
        </div>

    </section> -->

    <?php include("./include/_footer.php"); ?>
    
</body>
</html>
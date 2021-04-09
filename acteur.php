<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Titre</title>
</head>
<body>

    <?php include('./include/_bdd_call.php') ?>

    <?php include("./include/_header.php");

            $reponse = $bdd->prepare('SELECT * FROM acteurs WHERE id_acteur=?');
            $reponse->execute(array($_GET['id']));
            
            $donnees = $reponse->fetch();?>          
            
            <article class="presentation_page_acteur">

                    <img class="logo_page_acteur" src="<?php echo $donnees['logo'] ?>" alt="">
                    <h2 class="nom_acteur"><?php echo $donnees['acteur'] ?></h2>
                    <a href="">Lien</a>
                    <p><?php echo $donnees['description'] ?></p>
                </article>
            
         
    <section class="commentaires">  

        <!-- <div class="header_com">
            <p>X commentaires</p>
            <input type="button" value="Nouveau commentaire">
        </div> -->

        

        <div class="liste_commentaires">
    
            <?php          
                $appel = $bdd->query('SELECT * FROM post INNER JOIN account ON post.id_user = account.id_user');
                $appel->execute();
                while ($liste = $appel->fetch()) {
                    echo $liste['prenom'] . " " . $liste['nom'] ?> </br> <?php echo $liste ['date_add'] ?> </br> <?php echo $liste['post']; ?> </br></br>  <?php
                }
            ?>


        </div>

        <form action="" method="post">
            <input type="text" name="commentaire" id="commentaire">
            <input type="submit">
        </form>

    </section>

    <?php include("./include/_footer.php"); ?>
    
</body>
</html>
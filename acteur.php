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

            $reponse = $bdd->prepare('SELECT * FROM acteurs WHERE identifiant=?');
            $reponse->execute(array($_GET['id']));
            
            $donnees = $reponse->fetch();?>          
            
            <article class="presentation_page_acteur">

                    <img class="logo_page_acteur" src="<?php echo $donnees['logo'] ?>" alt="">
                    <h2 class="nom_acteur"><?php echo $donnees['nom'] ?></h2>
                    <a href="">Lien</a>
                    <p><?php echo $donnees['description'] ?></p>
                </article>
            
         
    <section class="commentaires">  

        <div class="header_com">
            <p>X commentaires</p>
            <input type="button" value="Nouveau commentaire">
        </div>
    </section>

    <?php include("./include/_footer.php"); ?>
    
</body>
</html>
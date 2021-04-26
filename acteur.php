<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">

    <?php include('include/_head.php') ?>
        <title>GBAF - Acteur <?php echo $_GET['id'] ?></title>       
    </head>

    <body>
        
        <?php 
            
            include('./include/_bdd_call.php');
            include("./include/_header.php");

            $reponse = $bdd->prepare('SELECT * FROM acteurs WHERE id_acteur=?');
            $reponse->execute(array($_GET['id']));
            $donnees = $reponse->fetch(); 
        ?> 

        <article class="acteur_presentation">

            <img class="acteur_presentation__logo" src="<?php echo $donnees['logo'] ?>" alt="">
            <h2 class="nom_acteur"><?php echo $donnees['acteur'] ?> </h2>
            <a href="">Lien</a>
            <p> <?php echo $donnees['description'] ?> </p>

        </article>
                  
        <section class="acteur_commentaires">  
            

            <div class="acteur_commentaires__header_com">
                <?php 

                $nb_post = $bdd->query('SELECT post FROM post WHERE id_acteur = '.$_GET['id'].'')->fetchAll();?>
                <h1><?php echo count($nb_post) ?> Commentaires</h1>

                <form class="acteur_commentaires__header_com__vote" method="post">
                    <input type="submit" class="acteur_commentaires__header_com__like" name="like" value=" ">
                    <input type="submit" class="acteur_commentaires__header_com__dislike" name="dislike" value=" ">
                </form>

                    <?php
                        
                        $vote = $bdd->query('SELECT v.* FROM vote as v LEFT JOIN account as a ON v.id_user = a.id_user WHERE a.id_user = '.$_SESSION['id_user'].'')->fetchAll();
                        $alreadyVoted = $bdd->query('SELECT EXISTS (SELECT id_user FROM vote WHERE id_user='.$_SESSION['id_user'].')');
                        if (empty($alreadyVoted)) {
                            $like = $bdd->prepare('INSERT INTO vote (id_user, id_acteur, vote) VALUES (?,?,?)');
                            if (!empty($_POST['like']) && isset($_POST['like'])) {            
                                $test = $like->execute([$_SESSION['id_user'], $_GET['id'], 1]);
                            } else if (!empty($_POST['dislike']) && isset($_POST['dislike'])) {
                                $test = $like->execute([$_SESSION['id_user'],  $_GET['id'], 0]);
                            }
                        }
                            
                               
                    ?>
               
            </div>

            <?php
                if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {

                    $create = $bdd->prepare('INSERT INTO post(post, id_user,id_acteur) VALUES(?,?,?)');
                    $create->execute(array($_POST['commentaire'], $_SESSION['id_user'],$_GET['id']));
                    header('Location: '.$_SERVER[REQUEST_URI].'');
                }
            ?>

            <div>
        
                <?php       

                    $appel = $bdd->query('SELECT * FROM post INNER JOIN account ON post.id_user = account.id_user');
                    $appel->execute();
                    while ($liste = $appel->fetch()) {

                        if ($liste['id_acteur'] == $_GET['id']) {

                            ?><div class="acteur_commentaires__commentaires"><div class="acteur_commentaires__nom"><?php echo $liste['prenom'] . " " . $liste['nom'] ?> </div><br><div class="acteur_commentaires__post"><?php echo $liste['post']; ?></div><br> <?php echo $liste ['date_add'] ?> </div> <br><br><?php

                        }
               
                    } 

                ?>
                
            </div>

            <form method="post" class="submit_com">
                <legend>Ecrire un commentaire :</legend>
                <textarea name="commentaire" class="submit_com__area"autocomplete="off" cols="30" rows="10"></textarea>
                <input type="submit" class="submit_com__submit ">
                
            </form>

        </section>

        <?php include("./include/_footer.php"); ?>
        
    </body>

</html>
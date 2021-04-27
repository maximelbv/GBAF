<?php session_start() // débute la session ?> 

<!DOCTYPE html>
<html lang="fr">

    <?php include('include/_head.php') ?>
        <title>GBAF - Acteur <?php echo $_GET['id'] ?></title>       
    </head>

    <body class="body_acteur">
        
        <?php 
            
            include('./include/_bdd_call.php'); // appel à la bdd
            include("./include/_header.php");

            $reponse = $bdd->prepare('SELECT * FROM acteurs WHERE id_acteur=?'); // sélectionne les données de acteur 
            $reponse->execute(array($_GET['id']));                               // quand l'acteur est égal à l'id de l'URL 
            $donnees = $reponse->fetch();                                        // stock ses valeurs dans $donnees
        ?> 

        <article class="acteur_presentation">
        <!-- Présentation de l'acteur -->

            <img class="acteur_presentation__logo" src="<?php echo $donnees['logo'] ?>" alt=""> 
            <h2 class="nom_acteur"><?php echo $donnees['acteur'] ?> </h2>
            <a href="">Lien</a>
            <p> <?php echo $donnees['description'] ?> </p>

        </article>
                  
        <section class="acteur_commentaires">  
        <!-- Section des commentaires, elle inclut le header avec le nombre de commentaires et la section likes / dislikes, 
        ainsi que l'affichage des commentaires et le champ pour créer un nouveau commentaire -->

            <div class="acteur_commentaires__header">
                <?php 

                $nb_post = $bdd->query('SELECT post FROM post WHERE id_acteur = '.$_GET['id'].'')->fetchAll(); // stock la liste des posts relatif à l'acteur ?> 
                <h1><?php echo count($nb_post) ?> Commentaires</h1> <!-- affiche le nombre de posts -->

                

                <form class="acteur_commentaires__header__vote" method="post">
                <a class="acteur_commentaires__btn_com" href="#txt_area">Nouveau Commentaire</a>
                    <?php 
                        $countLikes = $bdd->query('SELECT vote FROM vote WHERE vote = 1 AND id_acteur = '.$_GET['id'].'')->fetchAll(); // stock la liste des votes où le vote est true et où l'acteur est égal à l'acteur où je suis 
                        $countDislikes = $bdd->query('SELECT vote FROM vote WHERE vote = 0 AND id_acteur = '.$_GET['id'].'')->fetchAll(); // stock la liste des votes où le vote est false et où l'acteur est égal à l'acteur où je suis 
                    ?>
                    <input type="submit" class="acteur_commentaires__header__like" name="like" value=" ">
                    <p><?php echo count($countLikes) ?></p> <!-- affiche le nombre de likes -->
                    <input type="submit" class="acteur_commentaires__header__dislike" name="dislike" value=" ">
                    <p><?php echo count($countDislikes) ?></p> <!-- affiche le nombre de dislikes -->
                </form>

                    <?php
                        
                        $vote = $bdd->query('SELECT v.* FROM vote as v LEFT JOIN account as a ON v.id_user = a.id_user WHERE a.id_user = '.$_SESSION['id_user'].'')->fetchAll();
                        // définit l'id_user de la table account comme l'id_user de la table vote
                        $alreadyVoted = $bdd->query('SELECT id_user FROM vote WHERE EXISTS(SELECT id_user FROM vote WHERE id_user='.$_SESSION['id_user'].' AND id_acteur='.$_GET['id'].')')->fetchAll();
                        // définit une variable qui vérifie si l'id_user et l'id_acteur existent dans la table vote
                        
                        
                        $like = $bdd->prepare('INSERT INTO vote (id_user, id_acteur, vote) VALUES (?,?,?)');    // $like = insère les valeurs dans la table vote
                        if (!empty($_POST['like']) && isset($_POST['like'])) {                                  // si le champ like est rempli (cliqué)
                            if (empty($alreadyVoted)) {                                                         // si l'utilisateur n'a pas déjà voté
                                header('Location: '.$_SERVER[REQUEST_URI].'');                                  // recharge la page
                                $test = $like->execute([$_SESSION['id_user'], $_GET['id'], 1]);                 // execute la requete $like et entre les informations affichées
                            } else if (!empty($alreadyVoted)) {                                                 // sinon si l'utilisateur a déjà voté
                                header('Location: '.$_SERVER[REQUEST_URI].'');                                  //recharge la page
                                $deletelike = $bdd->query('DELETE FROM vote WHERE id_user='.$_SESSION['id_user'].' AND id_acteur='.$_GET['id'].''); 
                                exec($deletelike);                                                              // supprime le like
                            }
                                
                        } else if (!empty($_POST['dislike']) && isset($_POST['dislike'])) {                     // sinon si le champ dislike est rempli (cliqué)
                            if (empty($alreadyVoted)) {                                                         // si l'utilisateur n'a pas déjà voté
                                header('Location: '.$_SERVER[REQUEST_URI].'');                                  // recharge la page
                                $test = $like->execute([$_SESSION['id_user'], $_GET['id'], 0]);                 // execute la requete $like et entre les informations affichées
                            } else if (!empty($alreadyVoted)) {                                                 // sinon si l'utilisateur a déjà voté
                                header('Location: '.$_SERVER[REQUEST_URI].'');                                  // recharge la page
                                $deletelike = $bdd->query('DELETE FROM vote WHERE id_user='.$_SESSION['id_user'].' AND id_acteur='.$_GET['id'].'');
                                exec($deletelike);                                                              // supprime le like
                            }
                        } 
                        
                            
                               
                    ?>
               
            </div>

            <?php
                if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {                        // si le champ commentaire est rempli

                    $create = $bdd->prepare('INSERT INTO post(post, id_user,id_acteur) VALUES(?,?,?)');     // prepare un insert
                    $create->execute(array($_POST['commentaire'], $_SESSION['id_user'],$_GET['id']));       // insert dans la bdd le commentaire avec l'id de l'utilisateur et de l'acteur
                    header('Location: '.$_SERVER[REQUEST_URI].'');
                }
            ?>

            <div>
        
                <?php       

                    $appel = $bdd->query('SELECT * FROM post INNER JOIN account ON post.id_user = account.id_user');    // définit l'ud_user de account en tant que id_user de post
                    $appel->execute();
                    while ($liste = $appel->fetch()) { // tant qu'on récupère les lignes de $appel

                        if ($liste['id_acteur'] == $_GET['id']) {   // si l'id_acteur de post est égal a l'acteur affiché

                            ?><div class="acteur_commentaires__commentaires"><div class="acteur_commentaires__nom"><?php echo $liste['prenom'] . " " . $liste['nom'] ?> </div><br><div class="acteur_commentaires__post"><?php echo $liste['post']; ?></div><br> <?php echo "le " .date( "d m Y à h:m", strtotime($liste ['date_add'])) ?> </div> <br><br><?php
                            // affiche les commentaires
                        }
               
                    } 

                ?>
                
            </div>

            <form method="post" class="submit_com">
                <legend>Ecrire un commentaire :</legend>
                <textarea name="commentaire" class="submit_com__area" id="txt_area" autocomplete="off"></textarea>
                <input type="submit" class="submit_com__submit ">
                
            </form>

        </section>

        <?php include("./include/_footer.php"); ?>
        
    </body>

</html>
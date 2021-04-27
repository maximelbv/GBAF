<?php  
    session_start();                            // la session débute                                
    if (!isset ($_SESSION['username'])) {       // si la variable 'username' de la session n'est pas définie
        include('include/_redirection.php');    // inclus le code de 'redirection.php' (qui renvoie vers la page de connexion)
    }
    include("./include/_bdd_call.php");         // appel à la base de données
?>
<!DOCTYPE html>
<html lang="fr">
    
    <?php include('include/_head.php') ?>  
        <title>GBAF - Accueil</title>       
    </head>

    <body>
        
        <?php include("./include/_header.php"); ?>  

        <section class="index_presentation">

            <div class="index_presentation__txt">

                <h1> GBAF (Groupement Banque Assurance Français) </h1>
                <p>
                    Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :<br>

                    BNP Paribas / BPCE / Crédit Agricole / Crédit Mutuel-CIC / Société Générale / La Banque Postale.<br><br>
                    Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national. Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale.
                    C’est aussi un interlocuteur privilégié des pouvoirs publics.<br><br>

                    Les produits et services bancaires sont nombreux et très variés. Afin de renseigner au mieux les clients, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) recherchent sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres.<br><br>

                    Aujourd’hui, il n’existe pas de base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires. Pour remédier à cela, le GBAF souhaite proposer aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers. Chaque salarié pourra ainsi poster un commentaire et donner son avis.<br><br>

                    Cet extranet à donc été crée dans ce but.
                </p>

            </div>

            <img src="media/teamwork.png" alt="">
              
        </section>


        <section class="index_acteurs">

            <div class="index_acteurs__txt">

                <h2> Découvrez les acteurs et pârtenaires du GBAF </h2>
                <img class="index_acteurs__txt__btn" src="media/arrow.png" alt="">

            </div>

            <ul class="index_acteurs__liste">

                <?php 
                $reponse = $bdd->query('SELECT * FROM acteurs');    // sélectionne * dans la table acteur et stock le dans la variable $reponse
                while ($donnees = $reponse->fetch()) :              // tant que la ligne dans la table acteur est récupérée
                ?>
                    
                <li class='index_acteurs__liste__elem'>
                            
                    <div class="index_acteurs__liste__elem__informations">

                         <img src="<?php echo $donnees['logo'] ?>" alt=""> 

                        <div class='nomDesc'> 

                            <h3><?php echo $donnees['acteur'] ?></h3>  

                            <p>
                                <?php 
                                    $apercu = substr($donnees['description'], 0, 150);   // modifie le nombre maximum de caractères dans la string contenue dans 'description' et stock la dans $apercu
                                    echo $apercu . '...';                                // affiche la donnée modifiée puis "..."
                                ?>        
                            </p>

                        </div>

                    </div>

                    <a class='index_acteurs__liste__elem__btn_suite' href="acteur.php?id=<?php echo $donnees['id_acteur']?>">lire la suite</a>

                </li>
                        
                    

                <?php endwhile; ?>

            </ul>

        </section>
        
        <?php include("./include/_footer.php"); ?>      <!-- Inclut le footer -->
        
    </body>
    
</html>
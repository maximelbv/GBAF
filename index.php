<?php  
    session_start();
    if (!isset ($_SESSION['username'])) {
        include('include/_redirection.php');
    }
    include("./include/_bdd_call.php");    
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" href="media/logo_gbaf.png">
        <title>Extranet GBAF</title>       
    </head>

    <body>
        
        <?php include("./include/_header.php"); ?>    

        <section class="presentation">

            <div class="txt_presentation">

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

            <img class="img_presentation" src="media/teamwork.png" alt="">
              
        </section>


        <section id="acteurs">

            <div class="txt_partenaires">

                <h2> Découvrez les acteurs et pârtenaires du GBAF </h2>
                <a href="#acteur"><img id='arrow' src="media/arrow.png" alt=""></a>

            </div>

            <ul id="acteur">
                <?php 
                $reponse = $bdd->query('SELECT * FROM acteurs');
                while ($donnees = $reponse->fetch()) :   
                ?>
                    
                <li class='informations'>
                            
                    <div class="nomDescLogo">

                        <img class="logo" src="<?php echo $donnees['logo'] ?>" alt="">

                        <div class='nomDesc'> 

                            <h3><?php echo $donnees['acteur'] ?></h3>

                            <p>
                                <?php 
                                    $apercu = substr($donnees['description'], 0, 150);
                                    echo $apercu . '...';
                                ?>        
                            </p>

                        </div>

                    </div>

                    <a class='lirelasuite' href="acteur.php?id=<?php echo $donnees['id_acteur']?>">lire la suite</a>

                </li>
                        
                    

                <?php endwhile; ?>

            </ul>

        </section>
        
        <?php include("./include/_footer.php"); ?>
        
    </body>
    
</html>
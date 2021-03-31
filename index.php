<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Extranet GBAF</title>
    <link rel="icon" type="image/png" href="media/logo_gbaf.png">
</head>
<body>
    
    <?php 
        include("./include/_header.php");
        include("./include/_bdd_call.php");
    ?>    

    <section class="presentation">
        <div class="txt_presentation">
            <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h1>
        </div>
        <img class="img_presentation" src="https://via.placeholder.com/1600x300" alt="">
        <div class="txt_partenaires">
            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h2>
        </div>
    </section>

    <section class="acteurs">

    <?php 
        $reponse = $bdd->query('SELECT * FROM acteurs');
        while ($donnees = $reponse->fetch()) :   
    ?>
            <ul class="acteur">
                <div class='informations'>
                    <img  id="logo" src="<?php echo $donnees['logo'] ?>" alt="">
                    <div class='nomDesc'>
                        <h3><?php echo $donnees['nom'] ?></h3>
                        <p><?php echo ($donnees['description']) ?></p>
                    </div>
                </div>
                <a id='lirelasuite' href="acteur.php?id=<?php echo $donnees['identifiant']?>">lire la suite</a>
            </ul>

        <?php 
        endwhile;
        ?>

    </section>
    
    <?php include("./include/_footer.php"); ?>
    
</body>
</html>
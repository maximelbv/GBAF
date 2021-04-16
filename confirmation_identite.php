<?php 
    session_start(); 
    include('./include/_bdd_call.php');
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include('include/_head.php') ?>

    <body>
        <?php include('include/_header.php') ?>


        <form action="confirmation_identite.php" method="post">
            <fieldset class="log_form">
                <legend>Veuillez confirmer votre identité</legend>
                <div><label><?php echo $_SESSION['question'] ?> <input type="text" name="reponse" autocomplete="off"></label></div>
                <?php if (isset($_POST['reponse'])) {
                    if ($_POST['reponse'] == $_SESSION['reponse']) {
                        header('Location: compte.php');
                    } else {
                        echo "Mauvaise réponse";
                    }
                }
                    
                ?>
            </fieldset>
        </form>
            
        <?php include('include/_footer.php') ?>
    </body>

</html>
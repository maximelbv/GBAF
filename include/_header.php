    
    <?php 
        // session_start(); 
    ?>
    
    <header>
        <a href="index.php"><img  id="logo_gbaf" src="media/logo_gbaf.png" alt="logo_gbaf" width="70px" height="85px"></a>
        <div class="connexion">
            <img src="media/icon_compte.png" alt="" width="30px" height="30px">
            <p><?php echo $_SESSION['prenom'] ?></p>
            <p><?php echo $_SESSION['nom'] ?></p>
            <a  class="logout "href="include/_logout.php"></a>
        </div>
    </header>
    
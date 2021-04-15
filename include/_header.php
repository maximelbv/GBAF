    <header class="header">
        <a href="index.php"><img  class="header__logo_gbaf" src="media/logo_gbaf.png" alt="logo_gbaf" width="50"></a>
        <div class="header__compte">
            <img src="media/icon_compte.png" alt="" width="30" height="30">
            <p><?php echo $_SESSION['prenom'] ?></p>
            <p><?php echo $_SESSION['nom'] ?></p>
            <a  class="header__compte__btn_logout" href="include/_logout.php"></a>
        </div>
    </header>
    
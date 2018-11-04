<!DOCTYPE html>
<html>

<head>
  <title>Accueil - The Shoe</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
    
    <?php 
        // init
        include("script/fonctionsBases.php");
        $db = connectDB();
        session_start();
    ?>
    
    <div id="header">
        
        <div id="logo">
            <img id=logoimage src="./img/logo.png">
        </div>
        
        <div id="menubar">
            <ul id="menu">
              <li><a href="index.php">Home</a></li>
              <li class="selected"><a href="login_signup.php">User</a></li>
              <li><a href="page.html">A Page</a></li>
              <li><a href="another_page.html">Another Page</a></li>
              <li><a href="contact.html">Contact Us</a></li>
            </ul>
            
            <?php 
            if (isset($_SESSION)) {
                if (count($_SESSION) > 0) {
                    echo '<h1 style="color:#FFF">'.$_SESSION['prenom'].'</h1>';    
                }
            }
            ?>
            
        </div>
    </div>
    
    
    <div id="site_content">
        <?php 
            // Si utilisateur connecté, pas d'inscription ni de connexion
            if (isset($_SESSION)) {
                if (!count($_SESSION) > 0) {
        ?>
                    <!-- Inscription -->
        <form style="float: left; width: 50%;" name="inscription" action="script/inscription.php" method="post">
            <div>
                <label for="nom">Nom: </label>
                <input type="text" id="nom" name="nom" />
            </div>
            <div>
                <label for="prenom">Prenom: </label>
                <input type="text" id="prenom" name="prenom" />
            </div>
            <div>
                <label for="email">Email: </label>
                <input type="text" id="email" name="email" />
            </div>
            <div>
                <label for="password">Mot de passe: </label>
                <input type="text" id="password" name="password" />
            </div>
            <div class="button">
                <button type="submit">INSCRIPTION</button>
            </div>
        </form>
        
        <!-- Connexion -->
        <form style="float: right; width: 50%" name="connexion" action="script/connexion.php" method="post">
            <div>
                <label for="email">Email: </label>
                <input type="text" id="email" name="email" />
            </div>
            <div>
                <label for="password">Mot de passe: </label>
                <input type="text" id="password" name="password" />
            </div>
            <div class="button">
                <button type="submit">CONNEXION</button>
            </div>
        </form>
        
        <?php
                }
        }
        ?>

        <!-- Déconnexion -->
        <a style="display: block; clear: both;position: relative; top: 10px;" href="script/deconnexion.php">Déconnexion</a>

    </div>
    
    
    <footer>

    </footer>
</body>
    
    
</html>

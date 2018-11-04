<!DOCTYPE HTML>
<html>

<head>
  <title>page</title>
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
    
        // Récuperation des informations de l'article
        $idModele = $_GET["id"];
        $result = select("SELECT * FROM modele WHERE id_modele = {$idModele}"); 
        list($couleur, $marque, $genre, $categorie) = getModeleInfo($result);
    ?>
    
    <div id="header">
        
      <div id="logo">
        <img src="./img/logo.png">
      </div>
        
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a href="login_signup.php">User</a></li>
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
        
      <div class="sidebar">
        <h3>Nom</h3>
        <h4>Couleur</h4>
        <h5>Description</h5>

        <ul>
          <li><a href="#">link 1</a></li>
          <li><a href="#">link 2</a></li>
          <li><a href="#">link 3</a></li>
          <li><a href="#">link 4</a></li>
        </ul>

      </div>
        
      <div id="content">
          
        <?php foreach($result as $row): ?>
          
            <div>
                <img id=image_article src="img/article/<?= $row['nom_image']; ?>">
                <p><?= "{$row['nom']} => {$row['prix']}"; ?>
                    <br>Couleur: <?= $couleur ?>
                    <br>Marque: <?= $marque ?>
                    <br>Genre: <?= $genre ?>
                    <br>Catégorie: <?= $categorie ?>
                </p>
                <form method="POST" action="bidon" >
                    <input type="button" name="Submit" value="Ajouter au panier" class="exclusive" />
                </form> 
            </div>
          
        <?php endforeach; ?>
          
      </div>
    </div>
    
    
    <footer>

    </footer>
    
</body>
    
    
</html>

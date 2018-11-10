<!DOCTYPE html>
<html>

<head>
  <title>Panier - The Shoe</title>
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

        if (isset($_SESSION)) {
            if (!count($_SESSION) > 0) {
                header('Location: ./login_signup.php');
                exit();
            }
        }
        $idUser = $_SESSION["id_user"];
        $result = select("SELECT * FROM panier WHERE id_user = $idUser"); 
    ?>
    
    <div id="header">
        
        <div id="logo">
            <img id=logoimage src="./img/logo.png">
        </div>
        
        <div id="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="login_signup.php">User</a></li>
                <li class="selected"><a href="panier.php">Panier</a></li>
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
        
        // Query Builder
        if ($result !== false) :
            $whereQuery = ' WHERE ';
            $articles = array();
            foreach($result as $key => $row) {
                $article = $row['id_article'];
                if (!in_array($article, $articles)) {
                    if ($key !== 0) {
                        $whereQuery .= ' OR ';
                    }
                    array_push($articles, $article);
                    $whereQuery .= 'id_article = ' . strval($article);
                }
            }

            $query =  'SELECT id_article, article.id_modele, nom, pointure, prix, nom_image FROM article'; 
            $query .= ' JOIN modele ON modele.id_modele = article.id_modele '; 
            $query .= $whereQuery;
            $articlesInfo = select($query);

            $prixTotal = 0;
            ?>

            <ul>
                <?php
                // Affichage 
                foreach($result as $key => $row): 

                    foreach($articlesInfo as $articleInfo) {
                        if ($row['id_article'] == $articleInfo['id_article']) {
                            $infos = $articleInfo;
                            break;
                        }
                    }

                    $prixTotal += intval($infos['prix']);
                ?>

                    <li><img class="vignette_panier" src="img/article/<?= $infos['nom_image']; ?>">
                        <?= $infos['nom'] . ' en ' . $infos['pointure'] . ' pour ' . $infos['prix'] . '€ ' ?>
                        <form style="display: inline" name="suppr" action="script/deleteById.php" method="GET">
                            <input type="hidden" name="id" value="<?= $infos['id_article'] ?>" />
                            <input type="submit" value="Supprimer" />
                        </form>
                    </li>

                <?php endforeach; ?>

            </ul>
            <p>Total: <?= $prixTotal ?>€</p>

            <form name="payer" action="script/payer.php" method="POST">
                <input type="submit" value="Payer" />
            </form>
        <?php
        else:
            echo 'Vous n\'avez pas d\'articles dans votre panier';
        endif; ?>
        
    </div>
    
    
    <footer>

    </footer>
</body>
    
    
</html>

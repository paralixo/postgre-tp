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
                <li class="selected"><a href="index.php">Home</a></li>
                <li><a href="login_signup.php">User</a></li>
                <li><a href="panier.php">Panier</a></li>
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
        
        <?php foreach($result as $row): ?>
                
                <p><?php var_dump($row) ?></p>
            
        <?php endforeach; ?>

    </div>
    
    
    <footer>

    </footer>
</body>
    
    
</html>

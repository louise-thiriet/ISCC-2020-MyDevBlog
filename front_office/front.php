<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Super Mario Blog</title>
    <link rel="stylesheet" href="/ISCC/mydevblog/style/front_off.css">
    <script src="script.js"></script>
    <style type="text/css">
        a:link
        {
        text-decoration:none;
        }
    </style>
</head>
<header>
    <div id="titre">
        <h1>Super Mario Blog</h1>
    </div>
    <div class="navigation">
        <nav class="menu">
            <a href="front.php?page=accueil">Accueil</a>
            <a href="front.php?page=articles">Articles</a>
            <a href="front.php?page=contact">Contact</a>
        </nav>
    </div>
</header>

<body>
<?php
/*conditions d'affichage du corps de la page en fonction du paramètre page*/
if($_GET){
    if($_GET['page'] == 'accueil')
    {
        echo '<h1>' .$title = 'Accueil</h1>';
        include('accueil.php');
    }
    elseif($_GET['page'] == 'articles')
    {
        echo '<h1>' .$title = 'Articles</h1>';
        include('articles.php');
    }
    elseif($_GET['page'] == 'contact')
    {
        echo '<h1>' .$title = 'Contact</h1>';
        include('contact.php');
    }
    elseif($_GET['page'] == 'article')
    {
        include('article.php');
    }
    else{
        include('404.php');
    }
}
?>
</body>

<footer>
    <div class="box">
    <div class="github"><a href="https://github.com/louise-thiriet/"><img src="/ISCC/mydevblog/Assets/github.png" width='100' height='100'/></a></div>
    <div class="github"><a href="https://www.linkedin.com/in/louise-thiriet-262900196/"><img src="/ISCC/mydevblog/Assets/linkedin-logo-e1407144392549.png" width='100' height='100'/></a></div>
    <p>Vous aimerez également :</p>
        <div class="link">
        <ul>
        <li><a href="/ISCC/J01/Mon_premier_site.html">Mon premier site</a></li>
        <li><a href="/ISCC/J02/hello-world.html">Hello World</a></li>
        <li><a href="/ISCC/J03/hello-world-style.html">Hello World Style</a></li>
        <li><a href="/ISCC/J03/ex-02.html">ex-02</a></li>
        <li><a href="/ISCC/J03/mon-cv.html">Mon CV</a></li>
        <li><a href="/ISCC/J05/EX_02/vitrine-accueil.php">Site Vitrine</a></li>
        </ul>
        </div>

        <div class="link">
        <ul>
        <li><a href="/ISCC/J05/EX_03/t-shirt.php">T-shirts</a></li>
        <li><a href="/ISCC/J06/EX_01/test-fonctions.php">Test de fonctions</a></li>
        <li><a href="/ISCC/J06/EX_02/chaine.php">Chaîne</a></li>
        <li><a href="/ISCC/J06/EX_03/boucles-simples.php">Boucles simples</a></li>
        <li><a href="/ISCC/J06/EX_03/boucles-imbriquees.php">Boucles imbriquées</a></li>
        <li><a href="/ISCC/J06/EX_03/boucles-suite.php">Boucles suite</a></li>
        </ul>
        </div>

        <div class="link">
        <ul>
        <li><a href="/ISCC/J07/EX_01/commandes.php">Commandes</a></li>
        <li><a href="/ISCC/J06/EX_03/boucles-suite.php">Boucles suite</a></li>
        <li><a href="/ISCC/J07/EX_02/double-tableaux.php">Doubles-tableaux</a></li>
        <li><a href="/ISCC/J07/EX_02/produits.php">Produits</a></li>
        <li><a href="/ISCC/J07/EX_02/utiliser-objets.php">Utiliser objets</a></li>
        <li><a href="/ISCC/J10/EX_02/afficher-produit.php">Afficher produits</a></li>
        </ul>
        </div>

        <div class="link">
        <ul>
        <li><a href="/ISCC/J12/EX_01/mini-site-rooting.php">Mini-site-rooting</a></li>
        </ul>
        </div>
        
        <div class="link">
        <ul>
        <li><a href="../back_office/back.php?page=connexion"><strong>Espace administrateur</strong></a></li>
        </ul>
        </div>
</footer>
</html>
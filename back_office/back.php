<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Super Mario Blog_back</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="/ISCC/mydevblog/style/back_off.css">
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
        <?php
        session_start();

        /*en s'ouvrant, le back_office affichera la page de connexion*/
        ?>
        <a href="back.php?page=connexion">Connexion</a>
        

        <?php 
/*si l'utilisateur se connecte avec les bons identifiants, mot de passe alors la navigation affichera les autres pages*/

        if (isset($_SESSION['login'])==TRUE){
        ?>
        <a href="back.php?page=ajout_utilisateur">Ajout utilisateur</a>
        <a href="back.php?page=ajout_article">Ajout article</a>
        <a href="back.php?page=utilisateurs">Utilisateurs</a>
        <?php
        }
        ?>
        </nav>
    </div>
</header>

<?php

/*affichage du corps du texte en fonction du paramètre page*/

if($_GET){
    if($_GET['page'] == 'connexion')
    {
        echo '<h1>' .$title = 'Connexion</h1>';
        include('connexion.php');
    }
    elseif($_GET['page'] == 'ajout_utilisateur')
    {
        echo '<h1>' .$title = 'Ajout utilisateur</h1>';
?>
    <form enctype="multipart/form-data" action="ajout_utilisateur.php" method="POST">
        <input type="text" name="login" value="Login">
        <input type="password" name="password" value="Password">
        <input type="submit" name="submit" value="Envoyer"/>
    </form>
<?php
    include('ajout_utilisateur.php');
    }
    elseif($_GET['page'] == 'ajout_article')
    {
        echo '<h1>' .$title = 'Ajout article</h1>';
?>
    <form enctype="multipart/form-data" action="ajout_article.php" method="POST">
        <br>
        <input type="text" name="titre" value="Titre">
        </br>
        <br>
        <input type="file" name="img" value="Image">
        <input type="datetime-local" name="dat_publi" value="Date de publication">
        </br>
        <br>
        <textarea id="contenu" name="texte" rows="30" cols="100">Contenu texte</textarea>
        </br>
        <br>
        <textarea id="extrait" name="extrait" rows="20" cols="100">Extrait de l'article</textarea>
        </br>
        <br>
        <input type="submit" name="submit" value="Envoyer"/>
        </br>
    </form>
<?php
    }
    elseif($_GET['page'] == 'utilisateurs')
    {
        echo '<h1>' .$title = 'Utilisateurs</h1>';
        include('utilisateurs.php');
    }
    else{
        include('404.php');
    }
}
?>
<footer>

<p>
<a href="../front_office/front.php?page=accueil">----->  Retour au front-office</a>
</p>

</footer>
</html>
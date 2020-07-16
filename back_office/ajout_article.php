<?php
/*connexion à la base de données mydevblog*/

function connect_to_database(){
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $databasename = "mydevblog";

    try{
        $pdo=new PDO("mysql:host=$servername;dbname=$databasename", $username, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return($pdo);
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}

function login($pdo)
{
    try{
        session_start();
        
        $titre=$_POST['titre'];
        $date=$_POST['dat_publi'];
        /*l'auteur sera défini automatiquement par le nom entré dans la session*/
        $auteur=$_SESSION['login'];
        $texte=$_POST['texte'];
        $extrait=$_POST['extrait'];

/*si les champs du formulaire ne sont pas vides alors*/

        if (!empty($titre) AND !empty($date) AND !empty($texte) AND !empty($extrait)){
              
            /*pour que les apostrophes ne soient pas gênantes pour le bon fonctionnement*/
            $texte=addslashes($texte);
            $extrait=addslashes($extrait);

/*on insère maintenant les informations rentrées dans le formulaire (sauf l'auteur qui est donné automatiquement par la session)*/

            $sql = "INSERT INTO
            articles (titre, img, dat_publi, auteur, texte, extrait)
            VALUES('$titre', ' ', '$date', '$auteur', '$texte', '$extrait')";
                $pdo->exec($sql);
                echo '<p>Article ajouté à la base de données avec succès !</p>';
        }
    }
    catch(PDOException $e){
        echo "<p>Erreur de publication</p>".$e->getMessage();
    }
}
$pdo = connect_to_database();
login($pdo);

?>
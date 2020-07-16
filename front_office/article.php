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
$pdo = connect_to_database();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Article</title>
   <meta charset="utf-8">
</head>
<body>

<?php

/*on récupère l'id présent dans l'url grâce à GET*/

$id=$_GET['id'];

/*on sélectionne toutes les infos de la table articles*/

$query=$pdo->query("SELECT id, titre, dat_publi, auteur, texte 
FROM articles
WHERE id='$id'")->fetchAll();

/*on les affiche dans un tableau*/

foreach($query as $user){
    $titre=$user['titre'];
    $date_publi=$user['dat_publi'];
    $auteur=$user['auteur'];
    $contenu=$user['texte'];

echo "<p>
    <center>
        <table border=2px width=70%>
            <tr align=center style='background-color:#2DC9E6;'>
                <td align=center><h3>".$titre."</h3></td>
            </tr>
            <tr align=center>
                <td><strong>Date de publication: </strong>".$date_publi."</td>
            </tr>
            <tr align=center>
                <td><strong>Auteur: </strong>".$auteur."</td>
            </tr>
            <tr align=center>
                <td>".$contenu."</td>
            </tr>
        </table>
    </center>
    </p>";
}
?>

</body>
</html>
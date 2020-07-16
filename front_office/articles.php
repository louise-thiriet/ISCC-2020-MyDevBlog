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

/*on sélectionne toutes les informations de la table articles*/

$query=$pdo->query("SELECT * FROM articles")->fetchAll();

/*pour ensuite les afficher dans un tableau*/

echo '<ul>';
foreach($query as $user){
    $id=$user['id'];
    $titre=$user['titre'];
    $date_publi=$user['dat_publi'];
    $auteur=$user['auteur'];
    $extrait=$user['extrait'];
    echo "<br>
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
                <td align=center>".$extrait."<br>"

/*lien permettant d'arriver sur la page article (où l'article est affiché avec son contenu)*/

?>
                <a href='front.php?page=article&id=<?php echo $id ?>'><strong>Lire plus</strong></a></br></td> 
<?php
            echo "</tr>
        </table>
        </center>
        </br>";
}
echo '</ul>';



?>
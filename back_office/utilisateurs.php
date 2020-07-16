<?php

/*connexion à la base de données*/

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

/*on sélectionne toutes les informations de la table utilisateurs*/

$query=$pdo->query("SELECT * FROM utilisateurs")->fetchAll();

/*pour ensuite les afficher*/

echo '<ul>';
foreach($query as $user){
    $loginn=$user['loginn'];
    $passw=$user['passwordd'];
    echo "<li>";
    echo "<strong>Login : </strong>".$loginn." <strong>Password : </strong>" .$passw;
    echo "                                                                           ";
    echo "<a href='/ISCC/mydevblog/back_office/suppr.php'><strong><color='blue'>/Supprimer/</color></strong></a>";
    echo "</li>";
}
echo '</ul>';
?>

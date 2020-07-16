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
$pdo=connect_to_database();

try{
    try{

        /*on sélectionne toutes les infos de la table utilisateurs*/

        $query=$pdo->query("SELECT * FROM utilisateurs")->fetchAll();
        foreach($query as $user){
            $loginn=$user['loginn'];
            $passw=$user['passwordd'];
            $id=$user['id'];
        }
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

    /*on utilise la requête DELETE afin de supprimer le compte utilisateur en fonction de son id*/
    
    $query=$pdo->query("DELETE FROM
                utilisateurs
                WHERE id='$id'");
    echo 'Ce compte a été supprimé avec succès !';
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

?>
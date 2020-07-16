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
connect_to_database();

/*recherche d'un compte déjà existant sinon ajout d'un nouvel utilisateur dans la base utilisateurs*/
function login($pdo)
{
    try{
        if (!empty($_POST['login']) && !empty($_POST['password'])){

            $login=$_POST['login'];
            $password=$_POST['password'];

            $requete=$pdo->query("SELECT loginn
            FROM utilisateurs");
            $res=$requete->fetchAll();

            if ($res){
            
                if($login == $res[0]['loginn']){
                    echo "<p>Ce compte existe déjà.</p>";
                    $sql = "UPDATE utilisateurs
                    SET passwordd='$password'
                    WHERE loginn='$login'";
                    $pdo->exec($sql);
                    echo '<p>Votre mot de passe a été mis à jour.</p>';
                }
                else{
                    $sql = "INSERT INTO
                    utilisateurs (loginn, passwordd)
                    VALUES('$login','$password')";
                        $pdo->exec($sql);
                        echo '<p>Compte ajouté à la base de données.</p>';
                }
            }
            else{
                echo "<p>Ce compte n'a pas pu être enregistré dans la base de données.</p>";
            }
        }
    }
    catch(PDOException $e){
        echo "Login erreur".$e->getMessage();
    }
}
$pdo = connect_to_database();
login($pdo);

?>
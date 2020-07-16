<?php
/*on oublie pas de démarrer une session*/

session_start();

/*on se connecte à la base de données mydevblog*/

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
        /*Si les champs ne sont pas vides alors*/

        if (!empty($_POST['login']) && !empty($_POST['password'])){

            $login=$_POST['login'];
            $password=$_POST['password'];
        
        /*on sélectionne toutes les infos de la table utilisateurs*/

            $requete=$pdo->query("SELECT passwordd
            FROM utilisateurs
            WHERE loginn='$login'");
            $res=$requete->fetchAll();

            if ($res){
            /*vérification des infos rentrées dans le formulaire par rapport à celles entrées dans la base*/
                if($password == $res[0]['passwordd']){
                    echo "Connection réussie !!";
                    $_SESSION['login']=$login;
                    $_SESSION['password']=$password;
                /*redirection de l'utilisateur vers la page ajout_article*/
                    header('Location: back.php?page=ajout_article');
                }
            }
            else{
                echo "<p>Mauvais couple identifiant / mot de passe.</p>";
                echo '<p><a href="../back_office/back.php?page=connexion">Connexion</a></p>';
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
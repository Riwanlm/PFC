<?php

session_start();

require 'bdd.php';

if( !empty($_POST["email"]) AND !empty($_POST["mdp"]) )
{
    $form = true;
    $sql = "SELECT * FROM utilisateur WHERE email =:mail";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(":mail",$_POST["email"]);
    $result = $statement->execute();

    if($result)
    {
        $data = $statement->fetch();
    }
    else
    {
        $error = "Erreur de serveur";
    }
    if( $data == true)
    {
        if( password_verify( $_POST["mdp"], $data["mdp"] ))
        {
            $_SESSION["nomConnected"]= $data;
            $_SESSION["isConnected"]= true;

            header('Location: accueil.php');

        }
        else
        {
            $error = "Erreur de mots de passe";
        }
    }
    else
    {
        $error = "Aucun utilisateur correspondant";
    }
}

require 'header.php';
?>

<body>
<div align="center">
    <br><br><br>
    <h1>Connexion</h1>
    <?php
    $form = false;
    ?>
    <br><br>
    <form action="connexion.php" method="post">

        <label for="email">Email de connexion</label>
        <br>
        <input type="email" id="email" name="email">
        <br><br>
        <label for="mdp">Mot de passe</label>
        <br>
        <input type="password" id="mdp" name="mdp">
        <br><br>
        <input type="submit">
        <br><br>
        <?php
        if (isset($error))
        {
            echo $error;
        }
        ?>
        
    </form>
</div>
</body>
</html>
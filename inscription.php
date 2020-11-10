<?php

require 'bdd.php';

if(isset($_POST['form_valid']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);

    if (!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND
        !empty($_POST['mdp2']))
    {
        $pseudolength = strlen($pseudo);
        if ($pseudolength <= 60)
        {
            if ($email == $email2)
            {
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    if ($_POST['mdp'] == $_POST['mdp2'])
                    {
                        $sql = "INSERT INTO utilisateur(pseudo, email, mdp) VALUES(:pseudo, :mail, :pass)";
                        $statement = $dbh->prepare($sql);
                        $statement->bindParam(":pseudo",$_POST["pseudo"]);
                        $statement->bindParam(":mail",$_POST["email"]);
                        $statement->bindParam(":pass",$mdp);

                        $result = $statement->execute();

                        $error = 'Votre compte à bien été créée';
                        header('Location: connexion.php' );
                    }
                    else{
                        $error = 'Vos mots de passe ne sont pas identiques';
                    }
                }
                else
                {
                    $error = 'Votre adresse mail n\'ai pas valide';
                }
            }
            else
            {
                $error = 'Vos emails ne sont pas identiques';
            }
        }
        else
        {
            $error = 'Le Pseudo ne peut pas excéder 60 caractères';
        }
    }
    else
    {
        $error = 'Tous les champs doivent être remplis';
    }
}

require 'header.php';
?>


<body>
    <div align="center">
        <br><br><br>
        <h1>Inscription</h1>
        <br>
        <form action="inscription.php" method="post">

            <label for="pseudo">Pseudo</label>
            <br>
            <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" value="<?php if (isset($pseudo)){ echo $pseudo;} ?>">
            <br><br>
            <label for="email"> Adresse mail</label>
            <br>
            <input type="email" id="email" name="email" placeholder="unexemple@gmail.com" value="<?php if (isset($email)){ echo $email;} ?>">
            <br><br>
            <label for="email2"> Confirmez votre email</label>
            <br>
            <input type="email" id="email2" name="email2" placeholder="unexemple@gmail.com" value="<?php if (isset($email2)){ echo $email2;} ?>">
            <br><br>
            <label for="mdp">Votre mot de passe</label>
            <br>
            <input type="password" id="mdp" name="mdp">
            <br><br>
            <label for="mdp2">Confirmer votre mot de passe</label>
            <br>
            <input type="password" id="mdp2" name="mdp2">
            <br><br>
            <input type="submit" name="form_valid" id="">
        </form>
        <?php
        if (isset($error))
        {
            echo $error;
        }
        ?>
    </div>
</body>
</html>
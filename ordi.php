<?php

session_start();

$tab = array('Pierre', 'Feuille', 'Ciseaux');
$choix_joueur = isset($_POST['joueur']) ? $_POST['joueur'] : 'erreur';
if (in_array($choix_joueur, $tab)) {
    $choix_ordi = array_search($tab[mt_rand(0, count($tab) -1)], $tab);
    $position = array_search($choix_joueur, $tab);

    $result = $position - $choix_ordi;

    if ($result == 0)
        $message2 = 'Egalité !';
    elseif ($result == -1)
        $message2 = 'Perdu !';
    elseif ($result == -2)
        $message2 = 'Gagné !';
    elseif ($result == 1)
        $message2 = 'Gagné !';
    elseif ($result == 2)
        if ($position == 2)
            $message2 = 'Perdu !';
        else
            $message2 = 'Gagné !';
    else echo 'Error';

    $message1 = 'L\'ordinateur a joué ' . $tab[$choix_ordi] .
                '<br><br>' .
                'Vous avez joué ' . ($choix_joueur) .
                '<br><br>' .
                'Résultat de la manche : ' . $message2;
} else {}

require 'header.php';

?>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">CHIFOUMI</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="accueil.php">Accueil</a>
            </li>

            <?php
            if ($_SESSION["isConnected"]) {

                echo' <li class="nav-item active"><a class="nav-link" href="index.php?dec">Déconnexion</a></li>';

            } ?>

        </ul>
    </div>
</nav>
<div align="center">
    <br><br><br>
    <h1>Faites votre choix</h1>
    <br><br><br><br>
    <form action="ordi.php" method="post">
        <input type="submit" name="joueur" value="Pierre" class="btn btn-danger mb-2" />
        <input type="submit" name="joueur" value="Feuille" class="btn btn-success mb-2" />
        <input type="submit" name="joueur" value="Ciseaux" class="btn btn-warning mb-2" />
    </form>
    <br><br>
    <?php if (isset($message1))
    {
        echo $message1;
    }
        ?>
</div>

</body>
</html>
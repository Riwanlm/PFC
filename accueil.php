<?php
session_start();
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

<h1 align="center">Bienvenue sur mon mini jeu du Pierre Feuille Ciseau !</h1>
<h3 align="center">Le jeu</h3>
<p>
    Vous connaissez peut-être ce jeu sous différente appélation, Pierre feuille ciseau, Chifumi (ou Shifumi) et certainement
    différentes variables du jeu possible avec l'inclusion du puit par exemple. Dans cette version, nous ne nous intéresserons
    qu'a la règle la plus basique du jeu disponible.
</p>
<h3 align="center">Les règles</h3>
<p>
    Les règles classique du Chifumi sont très simple, vous n'avez besoin que de vos mains pour jouer, ensuite suivez les étapes :
</p>
<ol>
    <li>Les 2 joueurs doivent placer leurs mains dans le dos</li>
    <li>Prononcez Shi Fu Mi (se prononce Chi Fou Mi) ou comptez jusqu’à 3</li>
    <li>Dévoilez votre choix en réalisant le signe avec votre main</li>
</ol>
<p>Une fois les signes des deux joueurs dévoilé, on détermine le gagnant de la manière suivante :</p>
<ul>
    <li>La pierre casse les ciseaux, la pierre gagne contre les ciseaux</li>
    <li>Les ciseaux coupent le papier, les ciseaux gagnent contre le papier</li>
    <li>Le papier recouvre la pierre, le papier gagne contre la pierre</li>
</ul>
<p>En cas d’égalité vous rejouez jusqu’à ce qu’il y ait un gagnant.</p>
<br>
<div align="center">
    <a href="ordi.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Jouer contre l'ordinateur !</a>
</div>
</body>
</html>
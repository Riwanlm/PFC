<?php

$host = '127.0.0.1';
$dbname = 'BDD_PFC';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO('mysql:dbname=' . $dbname . ';host=' . $host.";port=8889", $user, $password, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8', lc_time_names = 'fr_FR'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    die('Connexion échouée : ' .$e->getMessage() );
}
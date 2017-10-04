<?php

define('CHAINE_DE_CONNEXION', 'mysql:host=localhost;dbname=test');
define('DB_USER', 'root');

function supprimerTables(){
    
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    
    $req1 = "DROP TABLE film";
    $req2 = "DROP TABLE utilisateur";
    
    $pdo->exec($req1);
    $pdo->exec($req2);
}

function creerTables(){
    
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    
    $req1 = "CREATE TABLE film (id BIGINT PRIMARY KEY AUTO_INCREMENT, titre VARCHAR(32))";
    $req2 = "CREATE TABLE utilisateur (id BIGINT PRIMARY KEY AUTO_INCREMENT, login VARCHAR(32), mdp VARCHAR(32))";
    
    $pdo->exec($req1);
    $pdo->exec($req2);
}

creerTables();


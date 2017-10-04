<?php

define('CHAINE_DE_CONNEXION', 'mysql:host=localhost;dbname=test');
define('DB_USER', 'root');

function supprimerFilm($id){
    
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    $pdo->beginTransaction();
    
    $stm = $pdo->prepare("DELETE FROM film WHERE id=:idFilm");
    $stm->bindValue("idFilm", $id);
    $stm->execute();
    
    $pdo->commit();
}

function ajouterFilm($titre){
    
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    $pdo->beginTransaction();
    
    $stm = $pdo->prepare("INSERT INTO film(titre) VALUES(:monTitre)");
    $stm->bindValue("monTitre", $titre);
    $stm->execute();
    
    $pdo->commit();
}

/**
 * Retourne tous les films classée alphabétiquement.
 * @return array
 */
function listerFilms(): array{
    
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    
    $statement = $pdo->query("SELECT * FROM film ORDER BY titre");
    
    return $statement->fetchAll();
}

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

supprimerTables();
creerTables();
ajouterFilm("dracula");
ajouterFilm("kung fu panda");
$films = listerFilms();
var_dump($films);

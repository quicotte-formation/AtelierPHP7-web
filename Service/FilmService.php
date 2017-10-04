<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FilmService
 *
 * @author ib
 */
define('CHAINE_DE_CONNEXION', 'mysql:host=localhost;dbname=test');
define('DB_USER', 'root');

class FilmService {

    public function supprimerTables(){
        
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
        $pdo->exec("DROP TABLE film");
        $pdo->exec("DROP TABLE utilisateur");
    }
    
    public function creerTables(){
        
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
        $pdo->exec("CREATE TABLE film (id BIGINT PRIMARY KEY AUTO_INCREMENT, titre VARCHAR(32))");
        $pdo->exec("CREATE TABLE utilisateur (id BIGINT PRIMARY KEY AUTO_INCREMENT, login VARCHAR(32), mdp VARCHAR(32))");
    }
    
    public function rechercherParTitre($titre):array{
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
        $statement = $pdo->prepare("SELECT * FROM film WHERE titre LIKE :titre ORDER BY titre");
        $statement->bindValue("titre", "%$titre%");
        $statement->execute();
        $resultat = $statement->fetchAll();
        return $resultat;
    }
    
    public function lister(){
        
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
        $statement = $pdo->query("SELECT id, titre FROM film ORDER BY titre");
        $resultat = $statement->fetchAll();
        
        return $resultat;
    }
    
    public function ajouter($titre) {

        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
        $pdo->beginTransaction();
        
        $statement = $pdo->prepare("INSERT INTO film(titre) VALUES(:monTitre)");
        $statement->bindValue('monTitre', $titre);
        $statement->execute();
        
        $pdo->commit();
    }

}

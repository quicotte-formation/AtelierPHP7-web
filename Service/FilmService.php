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

    public function creerTable(){
        
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
        $pdo->exec("CREATE TABLE film (id BIGINT PRIMARY KEY AUTO_INCREMENT, titre VARCHAR(32));");
    }
    
    public function lister(){
        
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
        $statement = $pdo->query("SELECT * FROM film ORDER BY titre");
        $resultat = $statement->fetchAll();
        
        var_dump($resultat);
        
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

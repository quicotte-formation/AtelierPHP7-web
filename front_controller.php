<?php

    include_once './lib/lib_db.php';

    if( !isset($_COOKIE["theme"]) )
        setcookie ("theme", "defaut");
    echo $_COOKIE["theme"];

    session_start();
    if( ! isset($_SESSION["films"]) ){
        $_SESSION["films"] = ["dracula", "nosferatu"];
    }
    
    $action = $_REQUEST["action"];
    $pageContenu = "";
    switch ($action){
    case "logout":
        session_destroy();
        header("Location: front_controller.php?action=liste_films");
        exit;
        break;
    case "login_post":
        $login = $_REQUEST["login"];
        $mdp = $_REQUEST["mdp"];
        if( $login=="admin" && $mdp=="admin" ){
            
            $_SESSION["utilConnecte"]=$login;
            header("Location: front_controller.php?action=liste_films");
            exit;
        }else{
            $pageContenu="./login.php";
        }
        break;
    case "login":
        $pageContenu = "./login.php";
        break;
    case "liste_films":
        // Récupère films : $films
        $films = listerFilms();
        
        // Renvoie à la vue
        $pageContenu = './liste_films.php';
        break;
    case "liste_series":
        break;
    case "ajoute_film_post":
        ajouterFilm( $_REQUEST["titre"] );
        header("Location: front_controller.php?action=liste_films");
        break;
    case "ajoute_film":
        $pageContenu = "ajoute_film.php";
        break;
    case "ajoute_serie":
        break;
    case "supprime_film":
        
        supprimerFilm( $_REQUEST["id"] );
        
        header("Location: front_controller.php?action=liste_films");
        break;
    case "supprimer_serie":
        break;
    default:
        echo "ERREUR: action inconnue";
        exit();
    }
    
    // Affiche la page par composition    
    include './_HEADER.php';
    include './_MENU.php';
    include $pageContenu;
    include './_FOOTER.php';
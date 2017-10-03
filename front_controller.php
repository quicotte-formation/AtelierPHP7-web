<?php

    session_start();
    
    $action = $_REQUEST["action"];
    $pageContenu = "";
    switch ($action){
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
        static $films = ["dracula", "kung fu panda", "dora l'exploratrice"];
        
        // Renvoie à la vue
        $pageContenu = './liste_films.php';
        break;
    case "liste_series":
        break;
    case "ajoute_film":
        break;
    case "ajoute_serie":
        break;
    case "supprime_film":
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
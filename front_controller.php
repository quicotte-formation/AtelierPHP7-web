<?php

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
        $films = $_SESSION["films"];
        
        // Renvoie à la vue
        $pageContenu = './liste_films.php';
        break;
    case "liste_series":
        break;
    case "ajoute_film_post":
        $tab[] = "nouv val";
        $_SESSION["films"][] = $_REQUEST["titre"];
        header("Location: front_controller.php?action=liste_films");
        break;
    case "ajoute_film":
        $pageContenu = "ajoute_film.php";
        break;
    case "ajoute_serie":
        break;
    case "supprime_film":
        
        $indice = array_search($_REQUEST["titre"], $_SESSION["films"]);
        if( ! $indice && $indice!=0 )
            throw new Exception ("ERREUR FATATLE : indice non trouvé");
        array_splice($_SESSION["films"], $indice, 1);
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
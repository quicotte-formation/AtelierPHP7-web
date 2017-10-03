<?php

    static $films = ["dracula", "kung fu panda", "dora l'exploratrice"];

    @$action = $_REQUEST["action"];
    $pageContenu = "";
    switch ($action){
    case "liste_films":
        // Récupère films : $films
        
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
<?php

include_once './Service/FilmService.php';

$s = new FilmService();
$s->supprimerTables();
$s->creerTables();
$s->ajouter("Un prince à New-York");
$s->ajouter("Retour vers le futur");
$s->ajouter("Drôle d'embrouille");
$res = $s->rechercherParTitre("u");
foreach ($res as $film){

    printf("%s\n", $film["titre"]);
}
exit;

<?php

include_once './lib/lib_db.php';
require_once './vendor/autoload.php';
$loader = new Twig_Loader_Filesystem("TWIG");
$twig = new Twig_Environment($loader);
echo $twig->load("liste_films.html.twig")->render(["films" => listerFilms(), "taillePage" => 3]);
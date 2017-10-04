<?php

include_once './Service/FilmService.php';

$s = new FilmService();
//$s->creerTable();
$res = $s->lister();
foreach ($res as $film){

    printf("%s\n", $film["titre"]);
}
exit;

$strConnection = 'mysql:host=localhost;dbname=test';
$pdo = new PDO($strConnection, 'root');
$pdo->beginTransaction();
//$statement = $pdo->prepare("INSERT INTO utilisateur(login, mdp) VALUES(:login, :mdp)");
//$res = $statement->execute([':login'=>'tom', ':mdp'=>'coucou']);
$res = $pdo->exec("INSERT INTO utilisateur(login, mdp) VALUES('tom', 'tom')");
if( ! $res ){
    var_dump($pdo->errorInfo());
    exit;
}
$pdo->commit();

$strConnection = 'mysql:host=localhost;dbname=test';
$pdo = new PDO($strConnection, 'root');
$pdo->beginTransaction();
//$statement = $pdo->prepare("INSERT INTO utilisateur(login, mdp) VALUES(:login, :mdp)");
//$res = $statement->execute([':login'=>'tom', ':mdp'=>'coucou']);
$statement = $pdo->prepare("INSERT INTO utilisateur(login, mdp) VALUES('tom', 'tom')");
if( ! $res ){
    var_dump($pdo->errorInfo());
    exit;
}
$pdo->commit();
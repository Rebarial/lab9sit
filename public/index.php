<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Repository/repository.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Repository\repository;
use Repository\DataMapper;

$view = new Environment(new FilesystemLoader(dirname(__DIR__) . "/src/templates"));

$Rep = new repository();

$id_s = $_GET['id_s'];
$mark_s = $_GET['mark_s'];
$id_a = $_GET['id_a'];
$mark_a = $_GET['mark_a'];
$model_a = $_GET['model_a'];
$id_d = $_GET['id_d'];
if ($id_a != '' && $mark_a != '' && $model_a != ''){
    $Rep->addRow($id_a, $mark_a, $model_a);
}
if ($id_d != ''){
    $Rep->delete($id_d);
}

$db = array();
$b = $Rep->getAll();
foreach ($b as $b){

    $db[] = [$b->getId(), $b->getMark(), $b->getModel()];
}
if ($id_s != ''){
    $db = array();
    $b = $Rep->fById($id_s);
    foreach ($b as $b){
        $db[] = [$b->getId(), $b->getMark(), $b->getModel()];
    }
}

if ($mark_s != ''){
    $db = array();
    $b = $Rep->fByMark($mark_s);
    foreach ($b as $b){
        $db[] = [$b->getId(), $b->getMark(), $b->getModel()];
    }
}


echo $view->render('index.html.twig', ['data' => $db]);

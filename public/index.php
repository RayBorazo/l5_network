<?php
// public/index.php
include_once(__DIR__ . '/../app/controllers/FilmController.php');
include_once(__DIR__ . '/../app/controllers/LogController.php');
include_once(__DIR__ . '/../app/controllers/PeopleController.php');

$filmController = new FilmController();
$logController = new LogController();
$peopleController = new PeopleController(); 

$logController->logRequest('index.php');

$action = isset($_GET['action']) ? $_GET['action'] : 'getAllFilms'; 
if ($action == 'getFilmDetails' && isset($_GET['id'])) {
    $filmController->getFilmDetails($_GET['id']);
} elseif ($action == 'getPersonDetails' && isset($_GET['id'])) {
    $peopleController->getPersonDetails($_GET['id']);
} else {
    $filmController->getAllFilms();
}
?>

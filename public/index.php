<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\User;
use App\Controllers\Comment;
use App\Controllers\Tag;
use App\Controllers\Ticket;
use App\Core\Router;


$router = new App\Core\Router();


$router->get('/', function() {
    echo "Salut vous etes sur la page d'accueil !";
});

$router->get('/userall', [User::class, 'all']);

$router->get('/contact', function() {
    echo "Salut vous etes sur la page de contact !";
});


$router->resolve();
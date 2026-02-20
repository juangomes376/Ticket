<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\User;
use App\Controller\Comment;
use App\Controller\Tag;
use App\Controller\Ticket;
use App\Controller\InterfaceView;
use App\Core\Router;

$router = new App\Core\Router();


// API routes

$router->get('/userall', [User::class, 'all']);
$router->get('/ticket/{ticket_id}/', [Ticket::class, 'show']);

// interfaces 
$router->get('/contact', function() {
    echo (new InterfaceView())->view('contact', 'Page de contact');
});
// example POST handler for contact form (not connected to mail yet)
$router->post('/contact', function() {
    // normally you would process the form here
    echo (new InterfaceView())->view('contact', 'Page de contact');
});
$router->get('/about', function() {
    echo (new InterfaceView())->view('about', 'À propos');
});
$router->get('/features', function() {
    echo (new InterfaceView())->view('features', 'Fonctionnalités');
});
$router->get('/terms', function() {
    echo (new InterfaceView())->view('terms', 'Conditions générales');
});
$router->get('/', function() {
    echo (new InterfaceView())->view('home', 'Bienvenue sur le système de tickets');
});


$router->resolve();
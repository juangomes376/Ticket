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
// detailed view for a single ticket
$router->get('/ticket/{ticket_id}/', function($ticketId) {
    $ticket = Ticket::show($ticketId);
    echo (new InterfaceView())->view('ticket_show', 'Ticket #' . $ticketId, ['ticket' => $ticket]);
});

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
// nouveau routes pour tickets
$router->get('/tickets', function() {
    $tickets = Ticket::allByUser(1);
    echo (new InterfaceView())->view('tickets', 'Mes tickets', ['tickets' => $tickets]);
});
$router->get('/tickets/create', function() {
    echo (new InterfaceView())->view('ticket_create', 'Créer un ticket');
});
$router->post('/tickets/create', function() {
    Ticket::create(
        $_POST['title'] ?? null,
        $_POST['description'] ?? null,
        $_POST['status'] ?? null,
        null,
        $_POST['user_id'] ?? null
    );
    header('Location: /tickets');
});

// routes pour tags
$router->get('/tags/create', function() {
    echo (new InterfaceView())->view('tag_create', 'Ajouter un tag');
});
$router->post('/tags/create', function() {
    Tag::create($_POST['ticket_id'] ?? null, $_POST['label'] ?? null);
    header('Location: /tickets');
});

// page de connexion (en attente de logique d'authentification)
$router->get('/login', function() {
    echo (new InterfaceView())->view('login', 'Connexion');
});
$router->post('/login', function() {
    // TODO: vérifier données et démarrer session
    header('Location: /tickets');
});

$router->get('/', function() {
    echo (new InterfaceView())->view('home', 'Bienvenue sur le système de tickets');
});


$router->resolve();
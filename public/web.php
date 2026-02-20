<?php
// web.php defines page routes (GET endpoints rendering views)

use App\Controller\User;
use App\Controller\Comment;
use App\Controller\Tag;
use App\Controller\Ticket;
use App\Controller\InterfaceView;

// static pages
$router->get('/contact', function() {
    echo (new InterfaceView())->view('contact', 'Contact');
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

// tickets section
$router->get('/tickets', function() {
    $userId = $_SESSION['user_id'] ?? null;
    if (!$userId) {
        header('Location: /login');
        exit;
    }
    $tickets = Ticket::allByUser($userId);
    error_log('Tickets for user '.$userId.': '.print_r($_SESSION,true));
    echo (new InterfaceView())->view('tickets', 'Mes tickets', ['tickets' => $tickets]);
});
$router->get('/tickets/create', function() {
    echo (new InterfaceView())->view('ticket_create', 'Créer un ticket');
});
$router->get('/ticket/{ticket_id}/', function($ticketId) {
    $ticket = Ticket::show($ticketId);
    echo (new InterfaceView())->view('ticket_show', 'Ticket #' . $ticketId, ['ticket' => $ticket]);
});

// auth pages
$router->get('/login', function() {
    echo (new InterfaceView())->view('login', 'Connexion');
});
$router->get('/register', function() {
    echo (new InterfaceView())->view('register', 'Inscription');
});

// root
$router->get('/', function() {
    echo (new InterfaceView())->view('home', 'Accueil');
});

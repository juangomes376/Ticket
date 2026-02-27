<?php
// web.php defines page routes (GET endpoints rendering views)

use App\Controller\User;
use App\Controller\Comment;
use App\Controller\Tag;
use App\Controller\Ticket;
use App\Controller\InterfaceView;

$router->get('/contact', function () {
    echo (new InterfaceView())->view('contact', 'Contact');
});
$router->get('/about', function () {
    echo (new InterfaceView())->view('about', 'À propos');
});
$router->get('/features', function () {
    echo (new InterfaceView())->view('features', 'Fonctionnalités');
});
$router->get('/terms', function () {
    echo (new InterfaceView())->view('terms', 'Conditions générales');
});


$router->get('/tickets', function () {
    $userId = $_SESSION['user_id'] ?? null;
    if (!$userId) {
        header('Location: /login');
        exit;
    }
    $tickets = (new Ticket())->allByUser($userId);
    echo (new InterfaceView())->view('tickets', 'Mes tickets', ['tickets' => $tickets]);
});

$router->get('/tickets/create', function () {
    // $userId = $_SESSION['user_id'] ?? null;
    // if (!$userId) {
    //     header('Location: /login');
    //     exit;
    // }
    echo (new InterfaceView())->view('ticket_create', 'Créer un ticket');
});

$router->get('/ticket/{ticket_id}/', function ($ticketId) {
    $userId = $_SESSION['user_id'] ?? null;
    if (!$userId) {
        header('Location: /login');
        exit;
    }
    $ticket = (new Ticket())->show($ticketId);
    echo (new InterfaceView())->view('ticket_show', 'Ticket #' . $ticketId, ['ticket' => $ticket]);
});

$router->get('/login', function () {
    echo (new InterfaceView())->view('login', 'Connexion');
});

$router->get('/register', function () {
    echo (new InterfaceView())->view('register', 'Inscription');
});

$router->get('/', function () {
    echo (new InterfaceView())->view('home', 'Accueil');
});

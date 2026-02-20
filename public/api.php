<?php
// api.php contains endpoints for API or POST actions

use App\Controller\User;
use App\Controller\Comment;
use App\Controller\Tag;
use App\Controller\Ticket;
use App\Controller\InterfaceView;

$router->post('/contact', function () {

    echo (new InterfaceView())->view('contact', 'Contact');
});

$router->post('/tickets/create', function () {
    Ticket::create(
        $_POST['title'] ?? null,
        $_POST['description'] ?? null,
        $_POST['status'] ?? null,
        null,
        $_POST['user_id'] ?? null
    );
    header('Location: /tickets');
});

$router->post('/tags/create', function () {
    Tag::create($_POST['ticket_id'] ?? null, $_POST['label'] ?? null);
    header('Location: /tickets');
});

// authentication actions
$router->post('/login', function () {
    $result = (new User())->login(
        $_POST['email'] ?? null,
        $_POST['password'] ?? null
    );

    error_log('login result: '.print_r($result,true));
    error_log('session now: '.print_r($_SESSION,true));

    if ($result['ok'] == true) {
        header('Location: /tickets');
    } else {
        header('Location: /login');
    }
});

$router->post('/register', function () {
    User::create(
        $_POST['username'] ?? null,
        $_POST['email'] ?? null,
        $_POST['password'] ?? null
    );
    header('Location: /login');
});

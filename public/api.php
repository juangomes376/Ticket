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
    $result = Ticket::create(
        $_POST['title'] ?? null,
        $_POST['description'] ?? null,
        $_POST['status'] ?? null,
        $_POST['priority'] ?? null,
        $_SESSION['user_id'] ?? null
    );

    if ($result) {
        header('Location: /tickets');
    } else {
        header('Location: /tickets/create');
    }
});

$router->post('/tags/create', function () {
    $result = Tag::create($_POST['ticket_id'] ?? null, $_POST['label'] ?? null);
    if ($result) {
        header('Location: /tickets');
    } else {
        header('Location: /tickets/create');
    }
});

// authentication actions
$router->post('/login', function () {
    $result = (new User())->login(
        $_POST['email'] ?? null,
        $_POST['password'] ?? null
    );

    if ($result['ok'] == true) {
        header('Location: /tickets');
    } else {
        header('Location: /login');
    }
});

$router->post('/register', function () {
    $result = (new User())->create(
        $_POST['username'] ?? null,
        $_POST['email'] ?? null,
        $_POST['password'] ?? null
    );
    header('Location: /login');
});

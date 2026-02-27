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
        error_log("Ticket created successfully with ID: " . $result);
        header('Location: /tickets');
    } else {
        error_log("Failed to create ticket title: " . ($_POST['title'] ?? 'null') . ", description: " . ($_POST['description'] ?? 'null') . ", status: " . ($_POST['status'] ?? 'null') . ", priority: " . ($_POST['priority'] ?? 'null') . ", userId: " . ($_SESSION['user_id'] ?? 'null'));
        header('Location: /tickets/create');
    }
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

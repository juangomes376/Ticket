<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\TicketRepository;

class Ticket
{
    // get tous les tickets (admin)
    public static function all()
    {
        $pdo = Database::getInstance()->pdo;
        $allTickets = (new TicketRepository($pdo))->getAllTickets();

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>All Tickets</title>
        </head>
        <body>
            <h1>All tickets</h1>
            ' . var_dump($allTickets) . '
        </body>
        </html>
        ';

        return $html;
    }

    public static function allByUser($userId)
    {
        $pdo = Database::getInstance()->pdo;
        $tickets = (new TicketRepository($pdo))->getTicketsByUserId($userId);

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Tickets</title>
        </head>
        <body>
            <h1>Tickets for user: ' . htmlspecialchars((string)$userId) . '</h1>
            ' . var_dump($tickets) . '
        </body>
        </html>
        ';

        return $html;
    }

    public static function show($ticketId)
    {
        $pdo = Database::getInstance()->pdo;
        $ticket = (new TicketRepository($pdo))->getTicketById($ticketId);

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ticket</title>
        </head>
        <body>
            <h1>Ticket #' . htmlspecialchars((string)$ticketId) . '</h1>
            ' . var_dump($ticket) . '
        </body>
        </html>
        ';

        return $html;
    }

    public static function create($title, $description, $status, $userId)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TicketRepository($pdo))->createTicket($title, $description, $status, $userId);

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Create Ticket</title>
        </head>
        <body>
            <h1>Create ticket</h1>
            <p>Result:</p>
            ' . var_dump($ok) . '
        </body>
        </html>
        ';

        return $html;
    }

    public static function update($ticketId, $title, $description, $status)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TicketRepository($pdo))->updateTicket($ticketId, $title, $description, $status);

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Ticket</title>
        </head>
        <body>
            <h1>Update ticket #' . htmlspecialchars((string)$ticketId) . '</h1>
            <p>Result:</p>
            ' . var_dump($ok) . '
        </body>
        </html>
        ';

        return $html;
    }

    public static function delete($ticketId)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TicketRepository($pdo))->deleteTicket($ticketId);

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Delete Ticket</title>
        </head>
        <body>
            <h1>Delete ticket #' . htmlspecialchars((string)$ticketId) . '</h1>
            <p>Result:</p>
            ' . var_dump($ok) . '
        </body>
        </html>
        ';

        return $html;
    }
}

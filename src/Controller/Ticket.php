<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\TicketRepository;

class Ticket
{
    // get tous les tickets
    public static function all()
    {
        $pdo = Database::getInstance()->pdo;
        $AllTickets = (new TicketRepository($pdo))->getAllTickets();

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tickets</title>
        </head>
        <body>
            ' . var_dump($AllTickets) . '
        </body>
        </html>
        ';

        return $html;
    }
}

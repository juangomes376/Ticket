<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\CommentRepository;

class Comment
{
    public function __construct() {}

    // get tous les commentaires d'un ticket
    public static function allByTicket($ticketId)
    {
        $pdo = Database::getInstance()->pdo;
        $allComments = (new CommentRepository($pdo))->getCommentsByTicketId($ticketId);

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Comments</title>
        </head>
        <body>
            ' . var_dump($allComments) . '
        </body>
        </html>
        ';

        return $html;
    }
}

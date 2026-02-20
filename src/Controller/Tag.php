<?php

namespace App\Controllers;

use App\Core\Database;
use App\Repository\TagRepository;

class Tag
{
    public function __construct() {}

    public static function allByTicket($ticketId)
    {
        $pdo = Database::getInstance()->pdo;
        $allTags = (new TagRepository($pdo))->getTagsByTicketId($ticketId);

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tags</title>
        </head>
        <body>
            ' . var_dump($allTags) . '
        </body>
        </html>
        ';

        return $html;
    }
}

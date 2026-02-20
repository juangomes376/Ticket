<?php

namespace App\Controllers;

use App\Core\Repository;
use App\Core\Database;
use App\Repository\UserRepository;

class User
{
   
    public function __construct(public string $name, public string $email)
    {

    }

    // get tout les utilisateurs
    public static function all()
    {
            $pdo = Database::getInstance()->pdo;
            $AllUsers = (new UserRepository($pdo))->getAllUsers();

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            '.var_dump($AllUsers).'
        </body>
        </html>
        ';

        return $html;
    }

}

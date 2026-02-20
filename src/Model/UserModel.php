<?php

namespace App\Model;

use App\Core\Database;
use App\Repository\UserRepository;

class UserModel
{
    // get all users
    public function getAllUsers()
    {
        $pdo = Database::getInstance()->pdo;
        $AllUsers = (new UserRepository($pdo))->getAllUsers();
        return $AllUsers;
    }

    // get user by id
    public function getUserById($id)
    {
        $pdo = Database::getInstance()->pdo;
        $user = (new UserRepository($pdo))->getUserById($id);
        return $user;
    }

    // get user by email
    public function getUserByEmail($email)
    {
        $pdo = Database::getInstance()->pdo;
        $user = (new UserRepository($pdo))->getUserByEmail($email);
        return $user;
    }

    // add new user
    public function addUser($username, $email, $password)
    {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $role = 1;

        $pdo = Database::getInstance()->pdo;
        $ok = (new UserRepository($pdo))->createUser($username, $email, $password, $role);

        return $ok;
    }
}

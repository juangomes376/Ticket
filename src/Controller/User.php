<?php

namespace App\Controller;

use App\Model\UserModel;

class User
{
    public static function all()
    {
        $model = new UserModel();
        return $model->getAllUsers();
    }

    public static function show($id)
    {
        $model = new UserModel();
        return $model->getUserById($id);
    }

    public static function create()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        $model = new UserModel();
        $ok = $model->addUser(
            $_POST['username'] ?? null,
            $_POST['email'] ?? null,
            $_POST['password'] ?? null
        );

        return ['ok' => (bool) $ok];
    }
}

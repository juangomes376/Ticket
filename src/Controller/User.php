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

    public static function create($username, $email, $password)
    {
        if (!$username || !$email || !$password) {
            $username = $_POST['username'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
        }

        $model = new UserModel();
        $ok = $model->addUser(
            $username,
            $email,
            $password
        );

        return ['ok' => (bool) $ok];
    }

    public function login($email, $password)
    {
        if (!$email || !$password) {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
        }

        $user = (new UserModel())->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            // save identifier(s) in session for later requests
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            session_regenerate_id(true);
            return ['ok' => true, 'user' => $user];
        } else {
            return ['ok' => false, 'message' => 'Invalid email or password'];
        }
    }
}

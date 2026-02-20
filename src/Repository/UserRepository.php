<?php
namespace App\Repository;

use App\Core\Database;

class UserRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllUsers()
    {
        $stmt = $this->pdo->query("SELECT * FROM users");

        return $stmt->fetchAll();
    }

    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function createUser($username, $email, $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        return $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function verifyPassword($email, $password)
    {
        $user = $this->getUserByEmail($email);
        if ($user) {
            return password_verify($password, $user['password']);
        }
        return false;
    }
}
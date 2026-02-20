<?php

namespace App\Controllers;

use App\Models\CommentModel;

class Comment
{
    public static function allByTicket()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'GET') {
            return ['ok' => false, 'error' => 'GET required'];
        }

        $ticketId = $_GET['ticket_id'] ?? null;

        $model = new CommentModel();
        return $model->allByTicket($ticketId);
    }

    public static function create()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        $ticketId = $_POST['ticket_id'] ?? null;
        $userId   = $_POST['user_id'] ?? null;
        $content  = $_POST['content'] ?? null;

        $model = new CommentModel();
        return $model->create($ticketId, $userId, $content);
    }

    public static function update()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        $commentId = $_POST['comment_id'] ?? null;
        $content   = $_POST['content'] ?? null;

        $model = new CommentModel();
        return $model->update($commentId, $content);
    }

    public static function delete()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        $commentId = $_POST['comment_id'] ?? null;

        $model = new CommentModel();
        return $model->delete($commentId);
    }

    public static function assignToUser($ticketId)
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        if (!isset($_SESSION)) session_start();
        $currentUserId = $_SESSION['user']['id'] ?? null;

        if (!$currentUserId) {
            return ['ok' => false, 'error' => 'Unauthorized'];
        }

        $pdo = \App\Core\Database::getInstance()->pdo;
        $role = (new \App\Repository\UserRepository($pdo))->getUserRoleLabel($currentUserId);

        if ($role !== 'manager') {
            return ['ok' => false, 'error' => 'Forbidden'];
        }

        $devId = $_POST['user_id'] ?? null;

        $model = new \App\Models\TicketModel();
        return $model->assignToUser($ticketId, $devId);
    }
}

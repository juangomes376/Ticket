<?php

namespace App\Models;

use App\Core\Database;
use App\Repository\CommentRepository;

class CommentModel
{
    public function allByTicket($ticketId)
    {   
        $pdo = Database::getInstance()->pdo;
        $comments = (new CommentRepository($pdo))->getCommentsByTicketId($ticketId);
        return $comments;
    }

    public function create($ticketId, $userId, $content)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new CommentRepository($pdo))->addComment($ticketId, $userId, $content);
        return $ok;
    }

    public function update($commentId, $content)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new CommentRepository($pdo))->updateComment($commentId, $content);
        return $ok;
    }

    public function delete($commentId)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new CommentRepository($pdo))->deleteComment($commentId);
        return $ok;
    }

    

}
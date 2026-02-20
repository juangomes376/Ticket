<?php
namespace App\Repository;

use App\Core\Database;

class CommentRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Add new comment to a ticket
    public function addComment($ticketId, $userId, $content)
    {
        $stmt = $this->pdo->prepare("INSERT INTO comments (ticket_id, user_id, content) VALUES (:ticket_id, :user_id, :content)");
        
        $stmt->execute([
            'ticket_id' => $ticketId,
            'user_id' => $userId,
            'content' => $content
        ]);
        return $stmt;
    }

    // remove a comment
    public function deleteComment($commentId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = :id");
        return $stmt->execute(['id' => $commentId]);
    }

    // get all comments for a ticket
    public function getCommentsByTicketId($ticketId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE ticket_id = :ticket_id");
        $stmt->execute(['ticket_id' => $ticketId]);
        return $stmt->fetchAll();
    }

    // modify a comment
    public function updateComment($commentId, $content)
    {
        $stmt = $this->pdo->prepare("UPDATE comments SET content = :content WHERE id = :id");
        return $stmt->execute([
            'content' => $content,
            'id' => $commentId
        ]);
    }
}
<?php

namespace App\Controller;

use App\Model\CommentModel;

class Comment
{
    public static function allByTicket($ticketId)
    {
        if (!$ticketId ) {
            $ticketId = $_GET['ticket_id'] ?? null;
        }

        return (new CommentModel())->allByTicket($ticketId);
    }

    public static function create($ticketId, $userId, $content)
    {
        if (!$ticketId && !$userId && !$content) {
            $ticketId = $_GET['ticket_id'] ?? null;
            $userId = $_GET['user_id'] ?? null;
            $content = $_GET['content'] ?? null;
        }

        return (new CommentModel())->create($ticketId, $userId, $content);
    }

    public static function update($commentId, $content)
    {
        if (!$commentId && !$content) {
            $commentId = $_POST['comment_id'] ?? null;
            $content   = $_POST['content'] ?? null;
        }

        return (new CommentModel())->update($commentId, $content);
    }

    public static function delete($commentId)
    {
        if (!$commentId) {
            $commentId = $_POST['comment_id'] ?? null;
        }

        return (new CommentModel())->delete($commentId);
    }

}

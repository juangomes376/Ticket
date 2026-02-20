<?php
namespace App\Repository;

use App\Core\Database;

class TagRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // add new tag
    public function addTag($ticketId, $label)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tags (ticket_id, label) VALUES (:ticket_id, :label)");
        $stmt->execute([
            'ticket_id' => $ticketId,
            'label' => $label
        ]);
        return $stmt;
    }

    // remove a tag
    public function deleteTag($tagId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tags WHERE id = :id");
        return $stmt->execute(['id' => $tagId]);
    }

    // get all tags for a ticket
    public function getTagsByTicketId($ticketId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tags WHERE ticket_id = :ticket_id");
        $stmt->execute(['ticket_id' => $ticketId]);
        return $stmt->fetchAll();
    }

    // add tag on ticket
    public function addTagOnTicket($tagId, $ticketId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO ticket_tags (ticket_id, tag_id) VALUES (:ticket_id, :tag_id);");
        return $stmt->execute([
            'ticket_id' => $ticketId,
            'tag_id' => $tagId
        ]);
    }

}
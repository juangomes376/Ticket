<?php
namespace App\Repository;

use App\Core\Database;

class TicketRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Create a new ticket
    public function createTicket($title, $description, $status, $priority, $userId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tickets (title, description, status, priority, user_id) VALUES (:title, :description, :status, :priority, :user_id)");
        $stmt->execute([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'priority' => $priority,
            'user_id' => $userId
        ]);

        if ($stmt->rowCount() > 0) {
            error_log("Ticket created successfully with ID: " . $this->pdo->lastInsertId());
            return $this->pdo->lastInsertId();
        } else {
            error_log("Failed to create ticket: " . implode(", ", $stmt->errorInfo()));
            return false;
        }
    }

    // modify a ticket
    public function updateTicket($ticketId, $title, $description, $status)
    {
        $stmt = $this->pdo->prepare("UPDATE tickets SET title = :title, description = :description, status = :status WHERE id = :id");
        return $stmt->execute([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'id' => $ticketId
        ]);
    }

    // delete a ticket
    public function deleteTicket($ticketId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tickets WHERE id = :id");
        return $stmt->execute(['id' => $ticketId]);
    }

    // get all tickets by user id 
    public function getTicketsByUserId($userId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tickets WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }

    // get a ticket by id
    public function getTicketById($ticketId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tickets WHERE id = :id");
        $stmt->execute(['id' => $ticketId]);
        return $stmt->fetch();  
    }

    // get all tickets assigned to a user
    public function getTicketsAssignedToUser($userId)
    {
        $stmt = $this->pdo->prepare("SELECT t.* FROM tickets t JOIN ticket_user tu ON t.id = tu.ticket_id WHERE tu.user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }

    // assign a ticket to a user
    public function assignTicketToUser($ticketId, $userId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO ticket_user (ticket_id, user_id) VALUES (:ticket_id, :user_id)");
        return $stmt->execute([
            'ticket_id' => $ticketId,
            'user_id' => $userId
        ]);
    }

    public function addTagOnTicket($tagId, $ticketId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO ticket_tag (ticket_id, tag_id) VALUES (:ticket_id, :tag_id)");
        return $stmt->execute([
            'ticket_id' => $ticketId,
            'tag_id' => $tagId
        ]);
    }

    public function deleteTagOnTicket($tagId, $ticketId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM ticket_tag WHERE ticket_id = :ticket_id AND tag_id = :tag_id");
        return $stmt->execute([
            'ticket_id' => $ticketId,
            'tag_id' => $tagId
        ]);
    }
}
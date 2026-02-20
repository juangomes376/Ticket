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
    public function createTicket($title, $description, $status, $userId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tickets (title, description, status, user_id) VALUES (:title, :description, :status, :user_id)");
        return $stmt->execute([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'user_id' => $userId
        ]);
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

    // get all tickets avec 

}
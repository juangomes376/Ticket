<?php

namespace App\Model;

use App\Core\Database;
use App\Repository\TicketRepository;
class TicketModel
{
    public function AllbyUser($userId)
    {
        $pdo = Database::getInstance()->pdo;
        $tickets = (new TicketRepository($pdo))->getTicketsByUserId($userId);
        return $tickets;
    }

    public function show($ticketId)
    {
        $pdo = Database::getInstance()->pdo;
        $ticket = (new TicketRepository($pdo))->getTicketById($ticketId);

        if ($ticket) {
            $ticket['comments'] = (new \App\Repository\CommentRepository($pdo))->getCommentsByTicketId($ticketId);
        }

        return $ticket;
    }

    public function create($title, $description, $status, $priority, $userId)
    {
        $pdo = Database::getInstance()->pdo;
        // TicketRepository::createTicket expects 4 params: title, description, status, userId
        $ok = (new TicketRepository($pdo))->createTicket($title, $description, $status, $userId);
        return $ok;
    }

    public function update($ticketId, $title, $description, $status, $priority)
    {
        $pdo = Database::getInstance()->pdo;
        // TicketRepository::updateTicket expects 4 params: ticketId, title, description, status
        $ok = (new TicketRepository($pdo))->updateTicket($ticketId, $title, $description, $status);
        return $ok;
    }

    public function delete($ticketId)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TicketRepository($pdo))->deleteTicket($ticketId);
        return $ok;
    }

    public function assignToUser($ticketId, $userId)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TicketRepository($pdo))->assignTicketToUser($ticketId, $userId);
        return $ok;
    }


    public function addTag($ticketId, $tagId)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TicketRepository($pdo))->addTagOnTicket($tagId, $ticketId);
        return $ok;
    }

    public function deleteTag($ticketId, $tagId)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TicketRepository($pdo))->deleteTagOnTicket($tagId, $ticketId);
        return $ok;
    }

}
<?php

namespace App\Controller;

use App\Model\TicketModel;

class Ticket
{

    public static function show($ticketId)
    {
        if(!$ticketId){
            $ticketId = $_GET['ticket_id'] ?? null;
        }

        return (new TicketModel())->show($ticketId);
    }

    public static function allByUser($userId)
    {
        if(!$userId){
            $userId = $_GET['user_id'] ?? null;
        }


        return (new TicketModel())->allByUser($userId);
    }

    public static function create($title, $description, $status, $priority, $userId)
    {
        if(!$title && !$description && !$status && !$priority && !$userId){
            $title = $_GET['title'] ?? null;
            $description = $_GET['description'] ?? null;
            $status = $_GET['status'] ?? null;
            $priority = $_GET['priority'] ?? null;
            $userId = $_GET['user_id'] ?? null;
        }

        return (new TicketModel())->create($title, $description, $status, $priority, $userId);
    }

    public static function update( $title, $description, $status, $priority, $userId)
    {
        if(!$title && !$description && !$status && !$priority && !$userId){
            $title = $_GET['ticket_id'] ?? null;
            $description = $_GET['description'] ?? null;
            $status = $_GET['status'] ?? null;
            $priority = $_GET['priority'] ?? null;
            $userId = $_GET['user_id'] ?? null;
        }

        return (new TicketModel())->update($title, $description, $status, $priority, $userId);
    }

    public static function delete($ticketId)
    {
        if (!$ticketId) {
            $ticketId = $_GET['ticket_id'] ?? null;
        }

        return (new TicketModel())->delete($ticketId);
    }

    public static function assignToUser($ticketId, $userId)
    {
        if (!$ticketId && !$userId) {
            $ticketId = $_GET['ticket_id'] ?? null;
            $userId = $_GET['user_id'] ?? null;
        }

        return (new TicketModel())->assignToUser($ticketId, $userId);
    }

    public static function addTag($ticketId, $tagId)
    {
        if (!$ticketId && !$tagId) {
            $ticketId = $_GET['ticket_id'] ?? null;
            $tagId = $_GET['tag_id'] ?? null;
        }

        return (new TicketModel())->addTag($ticketId, $tagId);
    }

    public static function deleteTag($ticketId, $tagId)
    {
        if (!$ticketId && !$tagId) {
            $ticketId = $_GET['ticket_id'] ?? null;
            $tagId = $_GET['tag_id'] ?? null;
        }

        return (new TicketModel())->deleteTag($ticketId, $tagId);
    }
}

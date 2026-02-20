<?php

namespace App\Controllers;

use App\Models\TagModel;

class Tag
{
    public static function allByTicket($ticketId)
    {
        if (!$ticketId ) {
            $ticketId = $_GET['ticket_id'] ?? null;
        }
        return (new TagModel())->allByTicket($ticketId);
    }

    public static function create($ticketId, $label)
    {
        if (!$ticketId && !$label) {
            $ticketId = $_GET['ticket_id'] ?? null;
            $label = $_GET['label'] ?? null;
        }

        return (new TagModel())->create($ticketId, $label);
    }

    public static function update($tagId, $label)
    {
        if (!$tagId && !$label) {
            $tagId = $_GET['tag_id'] ?? null;
            $label = $_GET['label'] ?? null;
        }

        return (new TagModel())->update($tagId, $label);
    }

    public static function delete($tagId)
    {
        if (!$tagId) {
            $tagId = $_GET['tag_id'] ?? null;
        }

        return (new TagModel())->delete($tagId);
    }
}

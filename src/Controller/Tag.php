<?php

namespace App\Controllers;

use App\Models\TagModel;

class Tag
{
    public static function allByTicket()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        $ticketId = $_POST['ticket_id'] ?? null;

        $model = new TagModel();
        return $model->allByTicket($ticketId);
    }
}

<?php

namespace App\Controllers;

use App\Models\TagModel;

class Tag
{
    public static function allByTicket()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'GET') {
            return ['ok' => false, 'error' => 'GET required'];
        }

        $ticketId = $_GET['ticket_id'] ?? null;

        $model = new TagModel();
        return $model->allByTicket($ticketId);
    }

    public static function create()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        $ticketId = $_POST['ticket_id'] ?? null;
        $label    = $_POST['label'] ?? null;

        $model = new TagModel();
        return $model->create($ticketId, $label);
    }

    public static function update()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        $tagId = $_POST['tag_id'] ?? null;
        $label = $_POST['label'] ?? null;

        $model = new TagModel();
        return $model->update($tagId, $label);
    }

    public static function delete()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        $tagId = $_POST['tag_id'] ?? null;

        $model = new TagModel();
        return $model->delete($tagId);
    }
}

<?php

namespace App\Controllers;

use App\Models\TicketModel;

class Ticket
{
    private static function post(string $key, $default = null)
    {
        return $_POST[$key] ?? $default;
    }

    public static function show($ticketId)
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'GET') {
            return ['ok' => false, 'error' => 'GET required'];
        }

        return TicketModel::show($ticketId);
    }

    public static function allByUser()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        return TicketModel::allByUser(self::post('user_id'));
    }

    public static function create()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        return TicketModel::create(
            self::post('title'),
            self::post('description'),
            self::post('status'),
            self::post('priority'),
            self::post('user_id')
        );
    }

    public static function update($ticketId)
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        return TicketModel::update(
            $ticketId,
            self::post('title'),
            self::post('description'),
            self::post('status'),
            self::post('priority')
        );
    }

    public static function delete($ticketId)
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        return TicketModel::delete($ticketId);
    }

    public static function assignToUser($ticketId)
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        return TicketModel::assignToUser($ticketId, self::post('user_id'));
    }

    public static function addTag($ticketId)
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        return TicketModel::addTag($ticketId, self::post('label'));
    }

    public static function deleteTag($ticketId)
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            return ['ok' => false, 'error' => 'POST required'];
        }

        return TicketModel::deleteTag($ticketId, self::post('tag_id'));
    }
}

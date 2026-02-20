<?php

namespace App\Model;

use App\Core\Database;
use App\Repository\TagRepository;

class TagModel
{
    public function allByTicket($ticketId)
    {
        $pdo = Database::getInstance()->pdo;
        $tags = (new TagRepository($pdo))->getTagsByTicketId($ticketId);
        return $tags;
    }

    public function create($ticketId, $label)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TagRepository($pdo))->addTag($ticketId, $label);
        return $ok;
    }

    public function update($tagId, $label)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TagRepository($pdo))->updateTag($tagId, $label);
        return $ok;
    }

    public function delete($tagId)
    {
        $pdo = Database::getInstance()->pdo;
        $ok = (new TagRepository($pdo))->deleteTag($tagId);
        return $ok;
    }

}
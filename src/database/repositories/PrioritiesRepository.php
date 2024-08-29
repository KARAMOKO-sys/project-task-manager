<?php

namespace App\Repositories;

use App\Models\Priority;
use PDO;

class PriorityRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM priorities");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Priority::class);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM priorities WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(Priority::class);
    }

    public function save(Priority $priority)
    {
        $stmt = $this->db->prepare("INSERT INTO priorities (name, level, created_at) VALUES (:name, :level, NOW())");
        $stmt->bindParam(':name', $priority->getName());
        $stmt->bindParam(':level', $priority->getLevel());
        $stmt->execute();
    }

    public function update(Priority $priority)
    {
        $stmt = $this->db->prepare("UPDATE priorities SET name = :name, level = :level WHERE id = :id");
        $stmt->bindParam(':name', $priority->getName());
        $stmt->bindParam(':level', $priority->getLevel());
        $stmt->bindParam(':id', $priority->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM priorities WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
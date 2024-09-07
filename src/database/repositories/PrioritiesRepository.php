<?php

namespace App\Repositories;

use Priority;
use PDO;
use PDOException;

class PriorityRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        try{
            $stmt = $this->db->prepare("SELECT * FROM priorities");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, Priority::class);
        }catch(PDOException $e){
            error_log("Error fetching all priorities: " .$e->getMessage());
            return [];
        }   
    }

    public function findById($id)
    {
        try{
            $stmt = $this->db->prepare("SELECT * FROM priorities WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        return $stmt->fetchObject(Priority::class);
        }catch(PDOException $e){
            // Gestion des erreurs : journalisation
            error_log("Error fetching comments by ID: " . $e->getMessage());
            return null;
        }
    }

    public function save(Priority $priority)
    {
       try{
            $stmt = $this->db->prepare("INSERT INTO priorities (name = :name, level = :level)");
            $stmt->bindParam(':name', $priority->getName());
            $stmt->bindParam(':level', $priority->getLevel());
            $stmt->execute();
       }catch(PDOException $e){
          // Gestion des erreurs : journalisation
          error_log("Error saving notification: " . $e->getMessage());
          return false;
       }
    }

    public function update(Priority $priority)
    {
       try{
        $stmt = $this->db->prepare("UPDATE priorities SET name = :name, level = :level WHERE id = :id");
        $stmt->bindParam(':name', $priority->getName());
        $stmt->bindParam(':level', $priority->getLevel());
        $stmt->bindParam(':id', $priority->getId(), PDO::PARAM_INT);
        $stmt->execute();
       }catch (PDOException $e) {
        // Gestion des erreurs : journalisation
        error_log("Error updating priorities: " . $e->getMessage());
        return false;
    }
    }

    public function delete($id)
    {
        try{
            $stmt = $this->db->prepare("DELETE FROM priorities WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error deleting priorities: " . $e->getMessage());
            return false;
        }
    }
}
?>
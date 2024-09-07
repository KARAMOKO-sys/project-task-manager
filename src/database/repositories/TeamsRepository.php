<?php
namespace App\Repositories;

use Teams;
use PDO;
use PDOException;

class TeamsRepository {
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        try{
            $stmt = $this->db->prepare("SELECT * FROM teams");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, Teams::class);
        }catch(PDOException $e){
            error_log("Error fetching all teams: " .$e->getMessage());
            return [];
        }
    }

    public function findById($id)
    {
       try{
        $stmt = $this->db->prepare("SELECT * FROM teams WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(Teams::class);
       }catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error fetching teams by ID: " . $e->getMessage());
        return null;
        }
    }

    public function save(Teams $teams)
    {
       try {
            $stmt = $this->db->prepare("INSERT INTO teams (teamName, createdAt) VALUES (:teamName, NOW())");
            $stmt->bindParam(':teamName', $teams->getTeamName());
            $stmt->bindParam(':createdAt', $teams->getCreatedAt());
            $stmt->execute();
            return $this->db->lastInsertId(); // Retourne l'ID généré
       } catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error saving teams: " . $e->getMessage());
        return false;
        }
    }

    public function update(Teams $teams)
    {
        try{
            $stmt = $this->db->prepare("UPDATE tasks SET teamName = :teamName, createdAt = NOW() WHERE id = :id");
            $stmt->bindParam(':teamName', $teams->getTeamName());
            $stmt->bindParam(':createdAt', $teams->getCreatedAt());
            $stmt->bindParam(':id', $teams->getId(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount(); 
        }catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error updating teams: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
       try {
        $stmt = $this->db->prepare("DELETE FROM teams WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
       }catch (PDOException $e) {
        // Gestion des erreurs : journalisation
        error_log("Error deleting teams: " . $e->getMessage());
        return false;
    }
    }
}

?>
<?php

namespace App\Repositories;
use PDO;
use Project;
use PDOException;


class ProjectRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
       try{
        $stmt = $this->db->prepare("SELECT * FROM projects");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Project::class);  // Utilisez la classe Project ici.
       }catch(PDOException $e){
        error_log("Error fetching all projects: " .$e->getMessage());
        return [];
        }  
    }

    public function findById($id)
    {
       try{
            $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchObject(Project::class);  // Utilisez la classe Project ici.
       }catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error fetching projects by ID: " . $e->getMessage());
        return null;
        }
    }

    public function save(Project $project)
    {
       try{
        $stmt = $this->db->prepare("INSERT INTO projects (name, description, start_date, end_date, status_id, created_at, updated_at) VALUES (:name, :description, :start_date, :end_date, :status_id, NOW(), NOW())");
        $stmt->bindParam(':name', $project->getName());
        $stmt->bindParam(':description', $project->getDescription());
        $stmt->bindParam(':start_date', $project->getStartDate());
        $stmt->bindParam(':end_date', $project->getEndDate());
        $stmt->bindParam(':status_id', $project->getStatusId());
        $stmt->execute();
        return $this->db->lastInsertId(); // Retourne l'ID généré
       } catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error saving projects: " . $e->getMessage());
        return false;
  }
    }

    public function update(Project $project)
    {
       try{
        $stmt = $this->db->prepare("UPDATE projects SET name = :name, description = :description, start_date = :start_date, end_date = :end_date, status_id = :status_id, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':name', $project->getName());
        $stmt->bindParam(':description', $project->getDescription());
        $stmt->bindParam(':start_date', $project->getStartDate());
        $stmt->bindParam(':end_date', $project->getEndDate());
        $stmt->bindParam(':status_id', $project->getStatusId());
        $stmt->bindParam(':id', $project->getId(), PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount(); 
       }catch (PDOException $e) {
        // Gestion des erreurs : journalisation
        error_log("Error updating projects: " . $e->getMessage());
        return false;
    }
    }

    public function delete($id)
    {
       try{
            $stmt = $this->db->prepare("DELETE FROM projects WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
       }catch (PDOException $e) {
        // Gestion des erreurs : journalisation
        error_log("Error deleting projects: " . $e->getMessage());
        return false;
    }
    }
}
?>

<?php

namespace App\Repositories;

use TaskStastues;
use PDO;
use PDOException;

class TaskStastuesRepository {
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        try{
            $stmt = $this->db->prepare("SELECT * FROM task_statuses");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, TaskStastues::class);
        }catch(PDOException $e){
            error_log("Error fetching all task_statuses :" . $e->getMessage());
            return [];
        }
    }

    public function findById($id)
    {
       try{
        $stmt = $this->db->prepare("SELECT * FROM task_statuses WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(TaskStastues::class);
       }catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error fetching task_statuses by ID: " . $e->getMessage());
        return null;
        }
    }

    public function save(TaskStastues $taskStastues)
    {
       try {
            $stmt = $this->db->prepare("INSERT INTO task_statuses (taskId, filePath, uploadedAt) VALUES (:user_id, :category_id, :priority_id, :task_name, :task_description, :status_id, :due_date, NOW(), NOW())");
            $stmt->bindParam(':user_id', $taskStastues->getTaskId(), PDO::PARAM_INT);
            $stmt->bindParam(':category_id', $taskStastues->getfilePath());
            $stmt->bindParam(':priority_id', $taskStastues->getUploadedAt());
            $stmt->execute();
            return $this->db->lastInsertId(); // Retourne l'ID généré
       } catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error saving task_statuses: " . $e->getMessage());
        return false;
        }
    }

    public function update(TaskStastues $taskStastues)
    {
        try{
            $stmt = $this->db->prepare("UPDATE tasks SET taskId = :taskId, filePath = :filePath, uploadedAt = NOW() WHERE id = :id");
            $stmt->bindParam(':user_id', $taskStastues->getTaskId(), PDO::PARAM_INT);
            $stmt->bindParam(':category_id', $taskStastues->getfilePath());
            $stmt->bindParam(':priority_id', $taskStastues->getUploadedAt());
            $stmt->execute();
            return $stmt->rowCount(); 
        }catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error updating task_statuses: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
       try {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
       }catch (PDOException $e) {
        // Gestion des erreurs : journalisation
        error_log("Error deleting task_statuses: " . $e->getMessage());
        return false;
    }
    }
}

?>
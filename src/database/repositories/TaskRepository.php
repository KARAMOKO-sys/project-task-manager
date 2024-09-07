<?php

namespace App\Repositories;

use PDO;
use Task;
use PDOException;

class TaskRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        try{
            $stmt = $this->db->prepare("SELECT * FROM tasks");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, Task::class);
        }catch(PDOException $e){
            error_log("Error fetching all tasks: " .$e->getMessage());
            return [];
        }
    }

    public function findById($id)
    {
       try{
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(Task::class);
       }catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error fetching tasks by ID: " . $e->getMessage());
        return null;
        }
    }

    public function save(Task $task)
    {
       try {
            $stmt = $this->db->prepare("INSERT INTO tasks (user_id, category_id, priority_id, task_name, task_description, status_id, due_date, created_at, updated_at) VALUES (:user_id, :category_id, :priority_id, :task_name, :task_description, :status_id, :due_date, NOW(), NOW())");
            $stmt->bindParam(':user_id', $task->getUserId());
            $stmt->bindParam(':category_id', $task->getCategoryId());
            $stmt->bindParam(':priority_id', $task->getPriorityId());
            $stmt->bindParam(':title', $task->getTaskName());
            $stmt->bindParam(':description', $task->getTaskDescription());
            $stmt->bindParam(':status', $task->getStatus());
            $stmt->bindParam(':due_date', $task->getDueDate());
            $stmt->execute();
            return $this->db->lastInsertId(); // Retourne l'ID généré
       } catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error saving tasks: " . $e->getMessage());
        return false;
        }
    }

    public function update(Task $task)
    {
        try{
            $stmt = $this->db->prepare("UPDATE tasks SET user_id = :user_id, category_id = :category_id, priority_id = :priority_id, task_name = :task_name, task_description = :task_description, status_id = :status_id, due_date = :due_date, updated_at = NOW() WHERE id = :id");
            $stmt->bindParam(':user_id', $task->getUserId());
            $stmt->bindParam(':category_id', $task->getCategoryId());
            $stmt->bindParam(':priority_id', $task->getPriorityId());
            $stmt->bindParam(':tast_name', $task->getTaskName());
            $stmt->bindParam(':task_description', $task->getTaskDescription());
            $stmt->bindParam(':status', $task->getStatus());
            $stmt->bindParam(':due_date', $task->getDueDate());
            $stmt->bindParam(':id', $task->getId(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount(); 
        }catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error updating tasks: " . $e->getMessage());
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
        error_log("Error deleting tasks: " . $e->getMessage());
        return false;
    }
    }
}
?>
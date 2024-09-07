<?php
namespace App\Repositories;


/**
 use User;
use PDO;
use PDOException;
class UserRepository {
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        try{
            $stmt = $this->db->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, User::class);
        }catch(PDOException $e){
            error_log("Error fetching all users: " .$e->getMessage());
            return [];
        }
    }

    public function findById($id)
    {
       try{
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(User::class);
       }catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error fetching users by ID: " . $e->getMessage());
        return null;
        }
    }

    public function save(User $user)
    {
       try {
            $stmt = $this->db->prepare("INSERT INTO tasks (user_id, category_id, priority_id, task_name, task_description, status_id, due_date, created_at, updated_at) VALUES (:user_id, :category_id, :priority_id, :task_name, :task_description, :status_id, :due_date, NOW(), NOW())");
            $stmt->bindParam(':user_id', $user->getUserId());
            $stmt->bindParam(':category_id', $user->getCategoryId());
            $stmt->bindParam(':priority_id', $user->getPriorityId());
            $stmt->bindParam(':title', $user->getTaskName());
            $stmt->bindParam(':description', $user->getTaskDescription());
            $stmt->bindParam(':status', $user->getStatus());
            $stmt->bindParam(':due_date', $user->getDueDate());
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
 */

?>
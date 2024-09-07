<?php
namespace App\Repositories;
use PDO;
use TaskAttachment;
use PDOException;

class TaskAttachmentRepository{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
       try{
        $stmt = $this->db->prepare("SELECT * FROM task_attachments");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, TaskAttachment::class);  // Utilisez la classe Project ici.
       }catch(PDOException $e){
        error_log("Error fetching all task_attachments: " .$e->getMessage());
        return [];
        }  
    }

    public function findById($id)
    {
       try{
            $stmt = $this->db->prepare("SELECT * FROM task_attachments WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchObject(TaskAttachment::class);  // Utilisez la classe Project ici.
       }catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error fetching task_attachments by ID: " . $e->getMessage());
        return null;
        }
    }

    public function save(TaskAttachment $task_attachment)
    {
       try{
            $stmt = $this->db->prepare("INSERT INTO roles (roleName, description, createdAt) VALUES (:roleName, :description, NOW())");
            $stmt->bindParam(':taskId', $task_attachment->getTaskId());
            $stmt->bindParam(':filePath', $task_attachment->getFilePath());
            $stmt->bindParam(':uploadedAt', $task_attachment->getUploadedAt());
            $stmt->execute();
            return $this->db->lastInsertId(); // Retourne l'ID généré
       } catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error saving task_attachments: " . $e->getMessage());
        return false;
        }
    }

    public function update(TaskAttachment $task_attachment)
    {
       try{
            $stmt = $this->db->prepare("UPDATE roles SET roleName = :roleName, description = :description, createdAt = NOW() WHERE id = :id");
            $stmt->bindParam(':taskId', $task_attachment->getTaskId());
            $stmt->bindParam(':filePath', $task_attachment->getFilePath());
            $stmt->bindParam(':uploadedAt', $task_attachment->getUploadedAt());
            $stmt->bindParam(':id', $task_attachment->getId(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount(); 
       }catch (PDOException $e) {
        // Gestion des erreurs : journalisation
        error_log("Error updating task_attachments: " . $e->getMessage());
        return false;
    }
    }

    public function delete($id){
        try{
         $stmt = $this->db->prepare("DELETE FROM task_attachments WHERE id = :id");
         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
         $stmt->execute();
        } catch (PDOException $e) {
         // Gestion des erreurs : journalisation
         error_log("Error deleting task_attachments: " . $e->getMessage());
         return false;
     }
     }
}

?>
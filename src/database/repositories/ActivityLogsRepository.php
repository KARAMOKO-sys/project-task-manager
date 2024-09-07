<?php
namespace App\Repositories;

use ActivityLogs;
use PDO;
use PDOException;
class ActivityLogsRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll(){
        try{
            $stmt = $this->db->prepare("SELECT * FROM activity_logs");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, ActivityLogs::class);
        }catch(PDOException $e){
            error_log("Error fetching all activity_logs: " .$e->getMessage());
            return [];
        }  
    }

    public function findById($id){
        try{
            $stmt = $this->db->prepare("SELECT * FROM activity_logs WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchObject(ActivityLogs::class);
        }catch(PDOException $e){
            // Gestion des erreurs : journalisation
            error_log("Error fetching activity_logs by ID: " . $e->getMessage());
            return null;
        }
    }

    public function save(ActivityLogs $activityLogs){
       try{
        $stmt = $this->db->prepare("INSERT INTO activity_logs (userId, action, createdAt) VALUE (:userId, :action, NOW())");
        $stmt->bindParam(':userId', $activityLogs->getUserId());
        $stmt->bindParam(':action', $activityLogs->getAction());
        $stmt->execute();
       }catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error saving activity_logs: " . $e->getMessage());
        return false;
  }
    }

    public function update(ActivityLogs $activityLogs){
        try{
            $stmt = $this->db->prepare("UPDATE activity_logs SET userId = :userId, action = :action WHERE id = :id");
            $stmt->bindParam(':userId', $activityLogs->getUserId(), PDO::PARAM_INT);
            $stmt->bindParam(':action', $activityLogs->getAction());
            $stmt->bindParam(':id', $activityLogs->getId(), PDO::PARAM_INT);
            $stmt->execute();
        }catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error updating activity_logs: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id){
        try{
            $stmt = $this->db->prepare("DELETE FROM activity_logs WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error deleting activity_logs: " . $e->getMessage());
            return false;
        }
    }
}

?>
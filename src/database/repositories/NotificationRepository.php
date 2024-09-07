<?php

namespace App\Repositories;

use Notification;
use PDO;
use PDOException;


class NotificationRepository{

    private $db;

    public function __constructor(PDO $db){
        $this->db = $db;
    }

    public function findAll(){
        try{
            $stmt = $this->db->prepare("SELECT FROM * notifications");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, Notification::class);
        }catch(PDOException $e){
            error_log("Error fetching all comments: " .$e->getMessage());
            return [];
        }  
    }

    public function findById($id){
        try{
            $stmt = $this->db->prepare("SELECT FROM * notifications WHERE id = :id");
            $stmt->execute();
            return $stmt->fetchObject(Notification::class);
        }catch(PDOException $e){
            // Gestion des erreurs : journalisation
            error_log("Error fetching comments by ID: " . $e->getMessage());
            return null;
        }
    }

    public function save(Notification $notification){
        try{
            $stmt = $this->db->prepare("INSERT INTO notifications (userId, notificationText, isRead) VALUES (:userId, :notificationText, :isRead)");
            $stmt->bindParam(':userId', $notification->getUserId(),PDO::PARAM_INT);
            $stmt->bindParam(':notificationText', $notification->getNotificationText());
            $stmt->bindParam(':isRead', $notification->getIsRead());
            $stmt->execute();
            return $this->db->lastInsertId(); // Retourne l'ID généré
        }catch(PDOException $e){
            // Gestion des erreurs : journalisation
            error_log("Error saving notification: " . $e->getMessage());
            return false;
      }
    }

    public function update(Notification $notification){
        try{
            $stmt = $this->db->prepare("UPDATE SET userId = :userId, notificationText = :notificationText, isRead = :isRead WHERE id = :id");
            $stmt->bindParam(':userId', $notification->getUserId(), PDO::PARAM_INT);
            $stmt->bindParam(':notificationText', $notification->getNotificationText());
            $stmt->bindParam(':isRead', $notification->getIsRead());
            $stmt->bindParam(':id', $notification->getId(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount(); 
        }catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error updating comment: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id){
       try{
        $stmt = $this->db->prepare("DELETE FROM notifications WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
       } catch (PDOException $e) {
        // Gestion des erreurs : journalisation
        error_log("Error deleting comments: " . $e->getMessage());
        return false;
    }
    }

}
?>
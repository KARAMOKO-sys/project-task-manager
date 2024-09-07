<?php
namespace App\Repositories;

use Comments;
use PDO;
use PDOException;

class CommentsRepository {
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    public function findAll(){
        try{
            $stmt = $this->db->prepare("SELECT * FROM comments");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, Comments::class);
        } catch(PDOException $e){
            error_log("Error fetching all comments: " .$e->getMessage());
            return [];
        }       
    }

    public function findById($id){
        try{
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE id= :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchObject(Comments::class);
            return $this->db->lastInsertId();
        } catch(PDOException $e){
             // Gestion des erreurs : journalisation
             error_log("Error fetching comments by ID: " . $e->getMessage());
             return null;
        }
    }

    public function save(Comments $comments){
        try{
            $stmt = $this->db->prepare("INSERT INTO comments (userId, taskId, comment, createdAt) VALUE (:userId, :taskId, :comment, NOW()");
            $stmt->bindParam(':userId', $comments->getUserId(), PDO::PARAM_INT);
            $stmt->bindParam(':taskId', $comments->getTaskId(), PDO::PARAM_INT);
            $stmt->bindParam(':comment', $comments->getComment());
            $stmt->execute();
            return $this->db->lastInsertId(); // Retourne l'ID généré
        }catch(PDOException $e){
              // Gestion des erreurs : journalisation
              error_log("Error saving comment: " . $e->getMessage());
              return false;
        }

    }

    public function update(Comments $comments){
        try{
            $stmt = $this->db->prepare("UPDATE comments SET userId =:userId, taskId =:taskId, comment  =:comment WHERE id =:id");
            $stmt->bindParam(':userId', $comments->getUserId(), PDO::PARAM_INT);
            $stmt->bindParam(':taskId', $comments->getTaskId(), PDO::PARAM_INT);
            $stmt->bindParam(':comment', $comments->getComment());
            $stmt->bindParam(':id', $comments->getId(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount(); 
        }  catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error updating comment: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM comments WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute(); 
            return $stmt->rowCount(); // Retourne le nombre de lignes affectées
        } catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error deleting comments: " . $e->getMessage());
            return false;
        }
    } 
}

?>
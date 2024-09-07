<?php
namespace App\Repositories;

use UserRoles;
use PDO;
use PDOException;

class UserRolesRepository{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        try{
            $stmt = $this->db->prepare("SELECT * FROM user_roles");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, UserRoles::class);
        }catch(PDOException $e){
            error_log("Error fetching all user_roles: " .$e->getMessage());
            return [];
        }
    }

    public function findById($id)
    {
       try{
        $stmt = $this->db->prepare("SELECT * FROM user_roles WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(UserRoles::class);
       }catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error fetching user_roles by ID: " . $e->getMessage());
        return null;
        }
    }

    public function save(UserRoles $userRoles)
    {
       try {
            $stmt = $this->db->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (:user_id, :role_id))");
            $stmt->bindParam(':userId', $userRoles->getUserId(), PDO::PARAM_INT);
            $stmt->bindParam(':roleId', $userRoles->getRoleId(), PDO::PARAM_INT);
            $stmt->execute();
            return $this->db->lastInsertId(); // Retourne l'ID généré
       } catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error saving user_roles: " . $e->getMessage());
        return false;
        }
    }

    public function update(UserRoles $userRoles)
    {
        try{
            $stmt = $this->db->prepare("UPDATE user_roles SET user_id = :user_id, role_id = :role_id  WHERE id = :id");
            $stmt->bindParam(':userId', $userRoles->getUserId(), PDO::PARAM_INT);
            $stmt->bindParam(':roleId', $userRoles->getRoleId(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount(); 
        }catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error updating user_roles: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
       try {
        $stmt = $this->db->prepare("DELETE FROM user_roles WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
       }catch (PDOException $e) {
        // Gestion des erreurs : journalisation
        error_log("Error deleting user_roles: " . $e->getMessage());
        return false;
    }
    }
}

?>
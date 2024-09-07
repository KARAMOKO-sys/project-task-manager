<?php
namespace App\Repositories;
use PDO;
use Role;
use PDOException;

class RoleRepository {
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    
    public function findAll()
    {
       try{
        $stmt = $this->db->prepare("SELECT * FROM roles");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Role::class);  // Utilisez la classe Project ici.
       }catch(PDOException $e){
        error_log("Error fetching all roles: " .$e->getMessage());
        return [];
        }  
    }

    public function findById($id)
    {
       try{
            $stmt = $this->db->prepare("SELECT * FROM roles WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchObject(Role::class);  // Utilisez la classe Project ici.
       }catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error fetching roles by ID: " . $e->getMessage());
        return null;
        }
    }

    public function save(Role $project)
    {
       try{
            $stmt = $this->db->prepare("INSERT INTO roles (roleName, description, createdAt) VALUES (:roleName, :description, NOW())");
            $stmt->bindParam(':roleName', $project->getRoleName());
            $stmt->bindParam(':description', $project->getDescription());
            $stmt->bindParam(':createdAt', $project->getCreatedAt());
            $stmt->execute();
            return $this->db->lastInsertId(); // Retourne l'ID généré
       } catch(PDOException $e){
        // Gestion des erreurs : journalisation
        error_log("Error saving roles: " . $e->getMessage());
        return false;
        }
    }

    public function update(Role $project)
    {
       try{
        $stmt = $this->db->prepare("UPDATE roles SET roleName = :roleName, description = :description, createdAt = NOW() WHERE id = :id");
        $stmt->bindParam(':roleName', $project->getRoleName());
        $stmt->bindParam(':description', $project->getDescription());
        $stmt->bindParam(':createdAt', $project->getCreatedAt());
        $stmt->bindParam(':id', $project->getId(), PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount(); 
       }catch (PDOException $e) {
        // Gestion des erreurs : journalisation
        error_log("Error updating roles: " . $e->getMessage());
        return false;
    }
    }

    public function delete($id){
        try{
         $stmt = $this->db->prepare("DELETE FROM roles WHERE id = :id");
         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
         $stmt->execute();
        } catch (PDOException $e) {
         // Gestion des erreurs : journalisation
         error_log("Error deleting roles: " . $e->getMessage());
         return false;
     }
     }
    
}

?>
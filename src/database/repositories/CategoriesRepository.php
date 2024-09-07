<?php
namespace App\Repositories;

use Categories;
use PDO;
use PDOException;

class CategoriesRepository {

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Récupère toutes les catégories
    public function findAll() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categories");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, Categories::class);
        } catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error fetching all categories: " . $e->getMessage());
            return [];
        }
    }

    // Récupère une catégorie par son ID
    public function findById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchObject(Categories::class);
        } catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error fetching category by ID: " . $e->getMessage());
            return null;
        }
    }

    // Sauvegarde une nouvelle catégorie
    public function save(Categories $categories) {
        try {
            $stmt = $this->db->prepare("INSERT INTO categories (name, action, createdAt) VALUES (:name, :action, NOW())");
            $stmt->bindParam(':name', $categories->getName());
            $stmt->bindParam(':action', $categories->getAction());
            $stmt->execute();  
            return $this->db->lastInsertId(); // Retourne l'ID généré
        } catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error saving category: " . $e->getMessage());
            return false;
        }
    }

    // Met à jour une catégorie existante
    public function update(Categories $categories) {
        try {
            $stmt = $this->db->prepare("UPDATE categories SET name = :name, action = :action WHERE id = :id");
            $stmt->bindParam(':name', $categories->getName());
            $stmt->bindParam(':action', $categories->getAction());
            $stmt->bindParam(':id', $categories->getId(), PDO::PARAM_INT);
            $stmt->execute();  
            return $stmt->rowCount(); // Retourne le nombre de lignes affectées
        } catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error updating category: " . $e->getMessage());
            return false;
        }
    }

    // Supprime une catégorie par son ID
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM categories WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute(); 
            return $stmt->rowCount(); // Retourne le nombre de lignes affectées
        } catch (PDOException $e) {
            // Gestion des erreurs : journalisation
            error_log("Error deleting category: " . $e->getMessage());
            return false;
        }
    }    

}
?>

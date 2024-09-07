<?php
namespace App\Services;

use App\Repositories\CategoriesRepository;
use Categories;
use App\Exceptions\ServiceException;
use DateTime;

class CategoriesService{

    private $categoryRepository;

    public function __construct(CategoriesRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    // Récupère tous les journaux d'activité
    public function getAllCategories(): array {
        return $this->categoryRepository->findAll();
    }

    // Récupère un projet par son ID
    public function getProjectById(int $id): ?Categories {
        $categoryRepository = $this->categoryRepository->findById($id);

        if (!$categoryRepository) {
            throw new ServiceException("Category log with ID $id not found.");
        }

        return $categoryRepository;
    }

    // Crée un nouveau projet
    public function createProject(string $name, string $action, string $createdAt): bool {
        try {
            $categoryRepository = new Categories();
            $categoryRepository->setName($name);
            $categoryRepository->setAction($action);
            $categoryRepository->setCreatedAt(new DateTime($createdAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
            return $this->categoryRepository->save($categoryRepository);
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error creating category log: " . $e->getMessage());
            return false;
        }
    }

// Met à jour un projet existant
public function updateProject(int $id, string $name, string $action, string $createdAt): bool {
    try {
        $categoryRepository = $this->getProjectById($id);

        if ($categoryRepository) {
            $categoryRepository->setName($name);
            $categoryRepository->setAction($action);
            $categoryRepository->setCreatedAt(new DateTime($createdAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
            return $this->categoryRepository->update($categoryRepository);
        }
        return false;
    } catch (ServiceException $e) {
        // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
        error_log("Error updating category log: " . $e->getMessage());
        return false;
    }
}

// Supprime un projet par son ID
public function deleteProject(int $id): bool {
    try {
        $activityLog = $this->getProjectById($id);

        if ($activityLog) {
            return $this->categoryRepository->delete($id);
        }
        return false;
    } catch (ServiceException $e) {
        // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
        error_log("Error deleting category log: " . $e->getMessage());
        return false;
    }
}
}
?>

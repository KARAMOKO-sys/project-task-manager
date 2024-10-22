<?php

namespace App\Services;

use App\Repositories\UserRolesRepository;
use TaskStastues;
use App\Exceptions\ServiceException;
use DateTime;

class UserRolesService {

    private $userRolesRepository;

    public function __construct(UserRolesRepository $userRolesRepository) {
        $this->userRolesRepository = $userRolesRepository;
    }

    // Récupère tous les journaux d'activité
    public function getAllCategories(): array {
        return $this->userRolesRepository->findAll();
    }

    // Récupère un projet par son ID
    public function getProjectById(int $id): ?TaskStastues {
        $userRolesRepository = $this->userRolesRepository->findById($id);

        if (!$userRolesRepository) {
            throw new ServiceException("Task log with ID $id not found.");
        }

        return $userRolesRepository;
    }

    // Crée un nouveau projet
    public function createProject(int $taskId, string $filePath, int $uploadedAt): bool {
        try {
            $userRolesRepository = new TaskStastues();
            $userRolesRepository->setTaskId($taskId);
            $userRolesRepository->setFilePath($filePath);
            $userRolesRepository->setUploadedAt($uploadedAt);
            return $this->userRolesRepository->save($userRolesRepository);
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error creating Comments log: " . $e->getMessage());
            return false;
        }
    }

// Met à jour un projet existant
public function updateProject(int $id, int $taskId, string $filePath, int $uploadedAt): bool {
    try {
        $userRolesRepository = $this->getProjectById($id);

        if ($userRolesRepository) {
            $userRolesRepository->setTaskId($taskId);
            $userRolesRepository->setFilePath($filePath);
            $userRolesRepository->setUploadedAt($uploadedAt);
            return $this->userRolesRepository->update($userRolesRepository);
        }
        return false;
    } catch (ServiceException $e) {
        // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
        error_log("Error updating comments log: " . $e->getMessage());
        return false;
    }
}

// Supprime un projet par son ID
public function deleteProject(int $id): bool {
    try {
        $userRolesRepository = $this->getProjectById($id);

        if ($userRolesRepository) {
            return $this->userRolesRepository->delete($id);
        }
        return false;
    } catch (ServiceException $e) {
        // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
        error_log("Error deleting comments log: " . $e->getMessage());
        return false;
    }
}
}

?>
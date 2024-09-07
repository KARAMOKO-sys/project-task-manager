<?php

namespace App\Services;

use App\Repositories\TaskStastuesRepository;
use TaskStastues;
use App\Exceptions\ServiceException;
use DateTime;

class TeamsService {

    private $taskStastuesRepository;

    public function __construct(TaskStastuesRepository $taskStastuesRepository) {
        $this->taskStastuesRepository = $taskStastuesRepository;
    }

    // Récupère tous les journaux d'activité
    public function getAllCategories(): array {
        return $this->taskStastuesRepository->findAll();
    }

    // Récupère un projet par son ID
    public function getProjectById(int $id): ?TaskStastues {
        $taskStastuesRepository = $this->taskStastuesRepository->findById($id);

        if (!$taskStastuesRepository) {
            throw new ServiceException("Task log with ID $id not found.");
        }

        return $taskStastuesRepository;
    }

    // Crée un nouveau projet
    public function createProject(int $taskId, string $filePath, int $uploadedAt): bool {
        try {
            $taskStastuesRepository = new TaskStastues();
            $taskStastuesRepository->setTaskId($taskId);
            $taskStastuesRepository->setFilePath($filePath);
            $taskStastuesRepository->setUploadedAt($uploadedAt);
            return $this->taskStastuesRepository->save($taskStastuesRepository);
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error creating Comments log: " . $e->getMessage());
            return false;
        }
    }

// Met à jour un projet existant
public function updateProject(int $id, int $taskId, string $filePath, int $uploadedAt): bool {
    try {
        $taskStastuesRepository = $this->getProjectById($id);

        if ($taskStastuesRepository) {
            $taskStastuesRepository->setTaskId($taskId);
            $taskStastuesRepository->setFilePath($filePath);
            $taskStastuesRepository->setUploadedAt($uploadedAt);
            return $this->taskStastuesRepository->update($taskStastuesRepository);
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
        $taskStastuesRepository = $this->getProjectById($id);

        if ($taskStastuesRepository) {
            return $this->taskStastuesRepository->delete($id);
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
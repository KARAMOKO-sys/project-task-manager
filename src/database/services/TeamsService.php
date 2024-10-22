<?php

namespace App\Services;

use App\Repositories\TeamsRepository;
use TaskStastues;
use App\Exceptions\ServiceException;
use DateTime;

class TeamsService {

    private $teamsRepository;

    public function __construct(TeamsRepository $teamsRepository) {
        $this->teamsRepository = $teamsRepository;
    }

    // Récupère tous les journaux d'activité
    public function getAllCategories(): array {
        return $this->teamsRepository->findAll();
    }

    // Récupère un projet par son ID
    public function getProjectById(int $id): ?TaskStastues {
        $teamsRepository = $this->teamsRepository->findById($id);

        if (!$teamsRepository) {
            throw new ServiceException("Task log with ID $id not found.");
        }

        return $teamsRepository;
    }

    // Crée un nouveau projet
    public function createProject(int $taskId, string $filePath, int $uploadedAt): bool {
        try {
            $teamsRepository = new TaskStastues();
            $teamsRepository->setTaskId($taskId);
            $teamsRepository->setFilePath($filePath);
            $teamsRepository->setUploadedAt($uploadedAt);
            return $this->teamsRepository->save($teamsRepository);
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error creating Comments log: " . $e->getMessage());
            return false;
        }
    }

// Met à jour un projet existant
public function updateProject(int $id, int $taskId, string $filePath, int $uploadedAt): bool {
    try {
        $teamsRepository = $this->getProjectById($id);

        if ($teamsRepository) {
            $teamsRepository->setTaskId($taskId);
            $teamsRepository->setFilePath($filePath);
            $teamsRepository->setUploadedAt($uploadedAt);
            return $this->teamsRepository->update($teamsRepository);
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
        $teamsRepository = $this->getProjectById($id);

        if ($teamsRepository) {
            return $this->teamsRepository->delete($id);
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
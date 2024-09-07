<?php

namespace App\Services;

use App\Repositories\ActivityLogsRepository;
use ActivityLogs;
use App\Exceptions\ServiceException;

class ActivityLogsService {

    private $activityLogsRepository;

    public function __construct(ActivityLogsRepository $activityLogsRepository) {
        $this->activityLogsRepository = $activityLogsRepository;
    }

    // Récupère tous les journaux d'activité
    public function getAllActivityLogs(): array {
        return $this->activityLogsRepository->findAll();
    }

    // Récupère un projet par son ID
    public function getProjectById(int $id): ?ActivityLogs {
        $activityLog = $this->activityLogsRepository->findById($id);

        if (!$activityLog) {
            throw new ServiceException("Activity log with ID $id not found.");
        }

        return $activityLog;
    }

    // Crée un nouveau projet
    public function createProject(int $userId, string $action, string $createdAt): bool {
        try {
            $activityLog = new ActivityLogs();
            $activityLog->setUserId($userId);
            $activityLog->setAction($action);
            $activityLog->setCreatedAt(new \DateTime($createdAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
            return $this->activityLogsRepository->save($activityLog);
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error creating activity log: " . $e->getMessage());
            return false;
        }
    }

    // Met à jour un projet existant
    public function updateProject(int $id, int $userId, string $action, string $createdAt): bool {
        try {
            $activityLog = $this->getProjectById($id);

            if ($activityLog) {
                $activityLog->setUserId($userId);
                $activityLog->setAction($action);
                $activityLog->setCreatedAt(new \DateTime($createdAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
                return $this->activityLogsRepository->update($activityLog);
            }
            return false;
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error updating activity log: " . $e->getMessage());
            return false;
        }
    }

    // Supprime un projet par son ID
    public function deleteProject(int $id): bool {
        try {
            $activityLog = $this->getProjectById($id);

            if ($activityLog) {
                return $this->activityLogsRepository->delete($id);
            }
            return false;
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error deleting activity log: " . $e->getMessage());
            return false;
        }
    }
}
?>

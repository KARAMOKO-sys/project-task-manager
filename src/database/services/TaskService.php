<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Task;
use App\Exceptions\ServiceException;
use DateTime;

class TaskService {

    private $taskRepository;

    public function __construct(TaskRepository $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    // Récupère tous les journaux d'activité
    public function getAllCategories(): array {
        return $this->taskRepository->findAll();
    }

    // Récupère un projet par son ID
    public function getProjectById(int $id): ?Task {
        $taskRepository = $this->taskRepository->findById($id);

        if (!$taskRepository) {
            throw new ServiceException("Task log with ID $id not found.");
        }

        return $taskRepository;
    }

    // Crée un nouveau projet
    public function createProject(int $userId, int $categoryId, int $priorityId, string $taskName, string $taskDescription,
    bool $statusId, string $dueDate, string $createdAt, string $updatedAt, bool $status): bool {
        try {
            $taskRepository = new Task();
            $taskRepository->setUserId($userId);
            $taskRepository->setCategoryId($categoryId);
            $taskRepository->setPriorityId($priorityId);
            $taskRepository->setTaskName($taskName);
            $taskRepository->setTaskDescription($taskDescription);
            $taskRepository->setStatusId($statusId);
            $taskRepository->setDueDate($dueDate);
            $taskRepository->setCreatedAt($createdAt);
            $taskRepository->setUpdatedAt($updatedAt);
            $taskRepository->setStatus($status);
            return $this->taskRepository->save($taskRepository);
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error creating Comments log: " . $e->getMessage());
            return false;
        }
    }

// Met à jour un projet existant
public function updateProject(int $id, int $userId, int $categoryId, int $priorityId, string $taskName, string $taskDescription,
bool $statusId, string $dueDate, string $createdAt, string $updatedAt, bool $status): bool {
    try {
        $taskRepository = $this->getProjectById($id);

        if ($taskRepository) {
            $taskRepository->setUserId($userId);
            $taskRepository->setCategoryId($categoryId);
            $taskRepository->setPriorityId($priorityId);
            $taskRepository->setTaskName($taskName);
            $taskRepository->setTaskDescription($taskDescription);
            $taskRepository->setStatusId($statusId);
            $taskRepository->setDueDate($dueDate);
            $taskRepository->setCreatedAt($createdAt);
            $taskRepository->setUpdatedAt($updatedAt);
            $taskRepository->setStatus($status);
            return $this->taskRepository->update($taskRepository);
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
        $taskRepository = $this->getProjectById($id);

        if ($taskRepository) {
            return $this->taskRepository->delete($id);
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
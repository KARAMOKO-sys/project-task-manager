<?php

namespace App\Services;

use App\Repositories\TaskAttachmentRepository;
use TaskAttachment;
use App\Exceptions\ServiceException;
use DateTime;


class TaskAttachmentService{
    private $taskAttachmentRepository;

    public function __construct(TaskAttachmentRepository $taskAttachmentRepository) {
        $this->taskAttachmentRepository = $taskAttachmentRepository;
    }

    // Récupère tous les journaux d'activité
    public function getAllCategories(): array {
        return $this->taskAttachmentRepository->findAll();
    }

    // Récupère un projet par son ID
    public function getProjectById(int $id): ?TaskAttachment {
        $taskAttachmentRepository = $this->taskAttachmentRepository->findById($id);

        if (!$taskAttachmentRepository) {
            throw new ServiceException("TaskAttachment log with ID $id not found.");
        }

        return $taskAttachmentRepository;
    }

    // Crée un nouveau projet
    public function createProject(int $taskId, string $filePath, string $uploadedAt): bool {
        try {
            $taskAttachmentRepository = new TaskAttachment();
            $taskAttachmentRepository->setTaskId($taskId);
            $taskAttachmentRepository->setFilePath($filePath);
            $taskAttachmentRepository->setUploadedAt(new DateTime($uploadedAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
            return $this->taskAttachmentRepository->save($taskAttachmentRepository);
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error creating Comments log: " . $e->getMessage());
            return false;
        }
    }

// Met à jour un projet existant
public function updateProject(int $id, int $taskId, string $filePath, string $uploadedAt): bool {
    try {
        $taskAttachmentRepository = $this->getProjectById($id);

        if ($taskAttachmentRepository) {
            $taskAttachmentRepository->setTaskId($taskId);
            $taskAttachmentRepository->setFilePath($filePath);
            $taskAttachmentRepository->setUploadedAt(new DateTime($uploadedAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
            return $this->taskAttachmentRepository->update($taskAttachmentRepository);
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
        $taskAttachmentRepository = $this->getProjectById($id);

        if ($taskAttachmentRepository) {
            return $this->taskAttachmentRepository->delete($id);
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
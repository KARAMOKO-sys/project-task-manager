<?php
namespace App\Services;

use App\Repositories\CommentsRepository;
use Comments;
use App\Exceptions\ServiceException;
use DateTime;

class CommentsService{

    private $commentsRepository;

    public function __construct(CommentsRepository $commentsRepository) {
        $this->commentsRepository = $commentsRepository;
    }

    // Récupère tous les journaux d'activité
    public function getAllCategories(): array {
        return $this->commentsRepository->findAll();
    }

    // Récupère un projet par son ID
    public function getProjectById(int $id): ?Comments {
        $commentsRepository = $this->commentsRepository->findById($id);

        if (!$commentsRepository) {
            throw new ServiceException("Comments log with ID $id not found.");
        }

        return $commentsRepository;
    }

    // Crée un nouveau projet
    public function createProject(int $userId, int $taskId, string $comment, string $createdAt): bool {
        try {
            $commentsRepository = new Comments();
            $commentsRepository->setUserId($userId);
            $commentsRepository->setTaskId($taskId);
            $commentsRepository->setComment($comment);
            $commentsRepository->setCreatedAt(new DateTime($createdAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
            return $this->commentsRepository->save($commentsRepository);
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error creating Comments log: " . $e->getMessage());
            return false;
        }
    }

// Met à jour un projet existant
public function updateProject(int $id, int $userId, int $taskId, string $comment, string $createdAt): bool {
    try {
        $commentsRepository = $this->getProjectById($id);

        if ($commentsRepository) {
            $commentsRepository->setUserId($userId);
            $commentsRepository->setTaskId($taskId);
            $commentsRepository->setComment($comment);
            $commentsRepository->setCreatedAt(new DateTime($createdAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
            return $this->commentsRepository->update($commentsRepository);
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
        $commentsRepository = $this->getProjectById($id);

        if ($commentsRepository) {
            return $this->commentsRepository->delete($id);
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

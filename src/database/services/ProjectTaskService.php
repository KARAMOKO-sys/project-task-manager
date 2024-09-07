<?php
namespace App\Services;

use App\Repositories\NotificationRepository;
use ProjectTask;
use App\Exceptions\ServiceException;
use DateTime;
/**
 class ProjectTaskService{

    private $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository) {
        $this->notificationRepository = $notificationRepository;
    }

    // Récupère tous les journaux d'activité
    public function getAllCategories(): array {
        return $this->notificationRepository->findAll();
    }

    // Récupère un projet par son ID
    public function getProjectById(int $id): ?Notification {
        $notificationRepository = $this->notificationRepository->findById($id);

        if (!$notificationRepository) {
            throw new ServiceException("Notification log with ID $id not found.");
        }

        return $notificationRepository;
    }

    // Crée un nouveau projet
    public function createProject(int $userId, string $notificationText, bool $isRead, string $createdAt): bool {
        try {
            $notificationRepository = new Notification();
            $notificationRepository->setUserId($userId);
            $notificationRepository->setNotificationText($notificationText);
            $notificationRepository->setIsRead($isRead);
            $notificationRepository->setCreatedAt(new DateTime($createdAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
            return $this->notificationRepository->save($notificationRepository);
        } catch (ServiceException $e) {
            // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
            error_log("Error creating Notification: " . $e->getMessage());
            return false;
        }
    }

// Met à jour un projet existant
public function updateProject(int $id, int $userId, string $notificationText, bool $isRead, string $createdAt): bool {
    try {
        $notificationRepository = $this->getProjectById($id);

        if ($notificationRepository) {
            $notificationRepository->setUserId($userId);
            $notificationRepository->setNotificationText($notificationText);
            $notificationRepository->setIsRead($isRead);
            $notificationRepository->setCreatedAt(new DateTime($createdAt)); // Assurez-vous que `setCreatedAt` accepte `DateTime`
            return $this->notificationRepository->update($notificationRepository);
        }
        return false;
    } catch (ServiceException $e) {
        // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
        error_log("Error updating notification: " . $e->getMessage());
        return false;
    }
}

// Supprime un projet par son ID
public function deleteProject(int $id): bool {
    try {
        $notificationRepository = $this->getProjectById($id);

        if ($notificationRepository) {
            return $this->notificationRepository->delete($id);
        }
        return false;
    } catch (ServiceException $e) {
        // Gestion des erreurs: log l'erreur ou gérer selon la logique métier
        error_log("Error deleting notification: " . $e->getMessage());
        return false;
    }
}
}
 */

?>

<?php

/**
 namespace App\Controllers;

use App\Services\PriorityService;
use App\Exceptions\ServiceException;

class TeamMembersController
{
    private $priorityService;

    public function __construct(PriorityService $priorityService)
    {
        $this->priorityService = $priorityService;
    }

    public function listPriorities()
    {
        try {
            $priorities = $this->priorityService->getAllPriorities();
            include __DIR__ . '/../views/priorities/list.php';
        } catch (ServiceException $e) {
            // Gérer l'erreur et afficher un message à l'utilisateur
            echo "Error retrieving priorities: " . $e->getMessage();
        }
    }

    public function viewPriority($id)
    {
        try {
            $priority = $this->priorityService->getPriorityById((int) $id);
            include __DIR__ . '/../views/priorities/view.php';
        } catch (ServiceException $e) {
            echo "Error retrieving priority: " . $e->getMessage();
        }
    }

    public function createPriority()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $name = $this->sanitizeInput($_POST['name']);
                $level = (int) $_POST['level']; // Assurez-vous que le niveau est un entier
                $this->priorityService->createPriority($name, $level);
                $this->setFlashMessage('Priority created successfully!');
                header('Location: /priorities');
                exit;
            } catch (ServiceException $e) {
                $this->setFlashMessage("Error creating priority: " . $e->getMessage(), 'error');
            }
        }
        include __DIR__ . '/../views/priorities/create.php';
    }

    public function updatePriority($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $name = $this->sanitizeInput($_POST['name']);
                $level = (int) $_POST['level'];
                $this->priorityService->updatePriority((int) $id, $name, $level);
                $this->setFlashMessage('Priority updated successfully!');
                header('Location: /priorities');
                exit;
            } catch (ServiceException $e) {
                $this->setFlashMessage("Error updating priority: " . $e->getMessage(), 'error');
            }
        } else {
            try {
                $priority = $this->priorityService->getPriorityById((int) $id);
                include __DIR__ . '/../views/priorities/update.php';
            } catch (ServiceException $e) {
                echo "Error retrieving priority: " . $e->getMessage();
            }
        }
    }

    public function deletePriority($id)
    {
        try {
            $this->priorityService->deletePriority((int) $id);
            $this->setFlashMessage('Priority deleted successfully!');
            header('Location: /priorities');
            exit;
        } catch (ServiceException $e) {
            $this->setFlashMessage("Error deleting priority: " . $e->getMessage(), 'error');
            header('Location: /priorities');
            exit;
        }
    }

    private function sanitizeInput($input)
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    private function setFlashMessage($message, $type = 'success')
    {
        $_SESSION['flash_message'] = ['message' => $message, 'type' => $type];
    }
}

 */
?>

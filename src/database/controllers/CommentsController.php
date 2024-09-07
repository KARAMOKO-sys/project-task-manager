<?php
/**
 namespace App\Controllers;

use App\Services\PriorityService;

class CommentsController
{
    private $priorityService;

    public function __construct(PriorityService $priorityService)
    {
        $this->priorityService = $priorityService;
    }

    public function listPriorities()
    {
        $priorities = $this->priorityService->getAllPriorities();
        include __DIR__ . '/../views/priorities/list.php';
    }

    public function viewPriority($id)
    {
        $priority = $this->priorityService->getPriorityById($id);
        include __DIR__ . '/../views/priorities/view.php';
    }

    public function createPriority()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->priorityService->createPriority($_POST['name'], $_POST['level']);
            header('Location: /priorities');
        } else {
            include __DIR__ . '/../views/priorities/create.php';
        }
    }

    public function updatePriority($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->priorityService->updatePriority($id, $_POST['name'], $_POST['level']);
            header('Location: /priorities');
        } else {
            $priority = $this->priorityService->getPriorityById($id);
            include __DIR__ . '/../views/priorities/update.php';
        }
    }

    public function deletePriority($id)
    {
        $this->priorityService->deletePriority($id);
        header('Location: /priorities');
    }
}
 */

?>

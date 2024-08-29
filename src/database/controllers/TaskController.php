<?php

namespace App\Controllers;

use App\Services\TaskService;

class TaskController
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function listTasks()
    {
        //$tasks = $this->taskService->getAllTasks();
        include __DIR__ . '/../views/tasks/list.php';
    }

    public function viewTask($id)
    {
        //$task = $this->taskService->getTaskById($id);
        include __DIR__ . '/../views/tasks/view.php';
    }

    public function createTask()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /**
                $this->taskService->createTask(
                $_POST['user_id'],
                $_POST['category_id'],
                $_POST['priority_id'],
                $_POST['task_name'],
                $_POST['task_description'],
                $_POST['status_id'],
                $_POST['due_date']
            );
             */
            header('Location: /tasks');
            exit; // Ajout d'une sortie après la redirection pour éviter que le code continue à s'exécuter
        } else {
            include __DIR__ . '/../views/tasks/create.php';
        }
    }

    public function updateTask($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /**
              $this->taskService->updateTask(
                $id,
                $_POST['user_id'],
                $_POST['category_id'],
                $_POST['priority_id'],
                $_POST['task_name'],
                $_POST['task_description'],
                $_POST['status_id'],
                $_POST['due_date']
            );
             */
           
            header('Location: /tasks');
            exit; // Ajout d'une sortie après la redirection pour éviter que le code continue à s'exécuter
        } else {
            //$task = $this->taskService->getTaskById($id);
            include __DIR__ . '/../views/tasks/update.php';
        }
    }

    public function deleteTask($id)
    {
        //$this->taskService->deleteTask($id);
        header('Location: /tasks');
        exit; // Ajout d'une sortie après la redirection pour éviter que le code continue à s'exécuter
    }
}
?>

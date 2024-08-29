<?php

namespace App\Controllers;

use App\Services\ProjectService;

class ProjectController
{
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function listProjects()
    {
        $projects = $this->projectService->getAllProjects();
        include __DIR__ . '/../views/projects/list.php';
    }

    public function viewProject($id)
    {
        $project = $this->projectService->getProjectById($id);
        include __DIR__ . '/../views/projects/view.php';
    }

    public function createProject()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the POST request to create a project
            //$this->projectService->createProject($_POST['name'], $_POST['description']);
            header('Location: /projects');
            exit; // Ajout d'une sortie après la redirection pour éviter l'exécution continue
        } else {
            include __DIR__ . '/../views/projects/create.php';
        }
    }
}
?>

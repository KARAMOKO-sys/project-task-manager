<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Project;

class ProjectService
{
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getAllProjects()
    {
        return $this->projectRepository->findAll();
    }

    public function getProjectById($id)
    {
        return $this->projectRepository->findById($id);
    }

    public function createProject($name, $description, $startDate, $endDate, $statusId)
    {
        $project = new Project();
        $project->setName($name);
        $project->setDescription($description);
        $project->setStartDate($startDate);
        $project->setEndDate($endDate);
        $project->setStatusId($statusId);
        $this->projectRepository->save($project);
    }

    public function updateProject($id, $name, $description, $startDate, $endDate, $statusId)
    {
        $project = $this->projectRepository->findById($id);
        if ($project) {
            $project->setName($name);
            $project->setDescription($description);
            $project->setStartDate($startDate);
            $project->setEndDate($endDate);
            $project->setStatusId($statusId);
            $this->projectRepository->update($project);
        }
    }

    public function deleteProject($id)
    {
        $this->projectRepository->delete($id);
    }
}

?>

<?php

namespace App\Repositories;

use App\Models\Project;  // Assurez-vous que c'est la bonne classe Project que vous utilisez.
use PDO;
use Project as GlobalProject;

class ProjectRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM projects");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, GlobalProject::class);  // Utilisez la classe Project ici.
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(GlobalProject::class);  // Utilisez la classe Project ici.
    }

    public function save(GlobalProject $project)
    {
        $stmt = $this->db->prepare("INSERT INTO projects (name, description, start_date, end_date, status_id, created_at, updated_at) VALUES (:name, :description, :start_date, :end_date, :status_id, NOW(), NOW())");
        $stmt->bindParam(':name', $project->getName());
        $stmt->bindParam(':description', $project->getDescription());
        $stmt->bindParam(':start_date', $project->getStartDate());
        $stmt->bindParam(':end_date', $project->getEndDate());
        $stmt->bindParam(':status_id', $project->getStatusId());
        $stmt->execute();
    }

    public function update(GlobalProject $project)
    {
        $stmt = $this->db->prepare("UPDATE projects SET name = :name, description = :description, start_date = :start_date, end_date = :end_date, status_id = :status_id, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':name', $project->getName());
        $stmt->bindParam(':description', $project->getDescription());
        $stmt->bindParam(':start_date', $project->getStartDate());
        $stmt->bindParam(':end_date', $project->getEndDate());
        $stmt->bindParam(':status_id', $project->getStatusId());
        $stmt->bindParam(':id', $project->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM projects WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>

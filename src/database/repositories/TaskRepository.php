<?php

namespace App\Repositories;

use App\Models\Task;
use PDO;
use Task as GlobalTask;

class TaskRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, GlobalTask::class);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(GlobalTask::class);
    }

    public function save(GlobalTask $task)
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (user_id, category_id, priority_id, task_name, task_description, status_id, due_date, created_at, updated_at) VALUES (:user_id, :category_id, :priority_id, :task_name, :task_description, :status_id, :due_date, NOW(), NOW())");
        $stmt->bindParam(':user_id', $task->getUserId());
        $stmt->bindParam(':category_id', $task->getCategoryId());
        $stmt->bindParam(':priority_id', $task->getPriorityId());
        $stmt->bindParam(':title', $task->getTaskName());
        $stmt->bindParam(':description', $task->getTaskDescription());
        $stmt->bindParam(':status', $task->getStatus());
        $stmt->bindParam(':due_date', $task->getDueDate());
        $stmt->execute();
    }

    public function update(GlobalTask $task)
    {
        $stmt = $this->db->prepare("UPDATE tasks SET user_id = :user_id, category_id = :category_id, priority_id = :priority_id, task_name = :task_name, task_description = :task_description, status_id = :status_id, due_date = :due_date, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':user_id', $task->getUserId());
        $stmt->bindParam(':category_id', $task->getCategoryId());
        $stmt->bindParam(':priority_id', $task->getPriorityId());
        $stmt->bindParam(':tast_name', $task->getTaskName());
        $stmt->bindParam(':task_description', $task->getTaskDescription());
        $stmt->bindParam(':status', $task->getStatus());
        $stmt->bindParam(':due_date', $task->getDueDate());
        $stmt->bindParam(':id', $task->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
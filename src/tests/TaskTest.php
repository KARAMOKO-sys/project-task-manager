



<?php

use PHPUnit\Framework\TestCase;
use App\Services\TaskService;
use App\Repositories\TaskRepository;
use PDO;

class TaskServiceTest extends TestCase
{
    private $pdo;
    private $taskService;

    protected function setUp(): void
    {
        // Configurer la connexion à la base de données de test
        $this->pdo = new PDO('mysql:host=localhost;dbname=test_db', 'root', 'password');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Créer une instance de TaskRepository et TaskService
        $taskRepository = new TaskRepository($this->pdo);
        //$this->taskService = new TaskService($taskRepository);

        // Préparer les données de test
        $this->pdo->exec("TRUNCATE TABLE tasks");
    }

    public function testCreateTask()
    {
        $this->taskService->createTask(1, 1, 1, 'Test Task', 'Task description', 1, '2024-12-31');

        $stmt = $this->pdo->query("SELECT * FROM tasks WHERE task_name = 'Test Task'");
        $task = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotEmpty($task);
        $this->assertEquals('Test Task', $task['task_name']);
        $this->assertEquals('Task description', $task['task_description']);
    }

    public function testUpdateTask()
    {
        $this->taskService->createTask(1, 1, 1, 'Old Task', 'Old description', 1, '2024-12-31');
        $stmt = $this->pdo->query("SELECT id FROM tasks WHERE task_name = 'Old Task'");
        $taskId = $stmt->fetchColumn();

        $this->taskService->updateTask($taskId, 1, 1, 1, 'Updated Task', 'Updated description', 1, '2024-12-31');

        $stmt = $this->pdo->query("SELECT * FROM tasks WHERE id = $taskId");
        $task = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEquals('Updated Task', $task['task_name']);
        $this->assertEquals('Updated description', $task['task_description']);
    }

    public function testDeleteTask()
    {
        $this->taskService->createTask(1, 1, 1, 'Task to delete', 'Description', 1, '2024-12-31');
        $stmt = $this->pdo->query("SELECT id FROM tasks WHERE task_name = 'Task to delete'");
        $taskId = $stmt->fetchColumn();

        $this->taskService->deleteTask($taskId);

        $stmt = $this->pdo->query("SELECT * FROM tasks WHERE id = $taskId");
        $task = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEmpty($task);
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
}
?>

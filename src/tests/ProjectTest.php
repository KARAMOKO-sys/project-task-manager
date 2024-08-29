
<?php

use PHPUnit\Framework\TestCase;
use App\Services\ProjectService;
use App\Repositories\ProjectRepository;
use PDO;

class ProjectServiceTest extends TestCase
{
    private $pdo;
    private $projectService;

    protected function setUp(): void
    {
        // Configurer la connexion à la base de données de test
        $this->pdo = new PDO('mysql:host=localhost;dbname=test_db', 'root', 'password');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Créer une instance de ProjectRepository et ProjectService
        $projectRepository = new ProjectRepository($this->pdo);
        $this->projectService = new ProjectService($projectRepository);

        // Préparer les données de test
        $this->pdo->exec("TRUNCATE TABLE projects");
    }

    public function testCreateProject()
    {
        $this->projectService->createProject('Project Alpha', 'Description for Project Alpha', '2024-01-01', '2024-12-31', 1);

        $stmt = $this->pdo->query("SELECT * FROM projects WHERE name = 'Project Alpha'");
        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotEmpty($project);
        $this->assertEquals('Project Alpha', $project['name']);
        $this->assertEquals('Description for Project Alpha', $project['description']);
    }

    public function testUpdateProject()
    {
        $this->projectService->createProject('Project Beta', 'Description for Project Beta', '2024-01-01', '2024-12-31', 1);
        $stmt = $this->pdo->query("SELECT id FROM projects WHERE name = 'Project Beta'");
        $projectId = $stmt->fetchColumn();

        $this->projectService->updateProject($projectId, 'Updated Project Beta', 'Updated description', '2024-01-01', '2025-12-31', 2);

        $stmt = $this->pdo->query("SELECT * FROM projects WHERE id = $projectId");
        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEquals('Updated Project Beta', $project['name']);
        $this->assertEquals('Updated description', $project['description']);
    }

    public function testDeleteProject()
    {
        $this->projectService->createProject('Project Gamma', 'Description for Project Gamma', '2024-01-01', '2024-12-31', 1);
        $stmt = $this->pdo->query("SELECT id FROM projects WHERE name = 'Project Gamma'");
        $projectId = $stmt->fetchColumn();

        $this->projectService->deleteProject($projectId);

        $stmt = $this->pdo->query("SELECT * FROM projects WHERE id = $projectId");
        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEmpty($project);
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
}
?>

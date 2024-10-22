<?php

 use PHPUnit\Framework\TestCase;
use App\Services\PriorityService;
use App\Repositories\PriorityRepository;
use PDO;

class ActivityLogsTest extends TestCase
{
    /*
    private $pdo;
    private $priorityService;

    protected function setUp(): void
    {
        // Configurer la connexion à la base de données de test
        $this->pdo = new PDO('mysql:host=localhost;dbname=test_db', 'root', 'password');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Créer une instance de PriorityRepository et PriorityService
        $priorityRepository = new PriorityRepository($this->pdo);
        $this->priorityService = new PriorityService($priorityRepository);
        
        // Préparer les données de test
        $this->pdo->exec("TRUNCATE TABLE priorities");
    }

    public function testCreatePriority()
    {
        $this->priorityService->createPriority('High', 1);

        $stmt = $this->pdo->query("SELECT * FROM priorities WHERE name = 'High'");
        $priority = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotEmpty($priority);
        $this->assertEquals('High', $priority['name']);
        $this->assertEquals(1, $priority['level']);
    }

    public function testUpdatePriority()
    {
        $this->priorityService->createPriority('Medium', 2);
        $stmt = $this->pdo->query("SELECT id FROM priorities WHERE name = 'Medium'");
        $priorityId = $stmt->fetchColumn();

        $this->priorityService->updatePriority($priorityId, 'Updated Medium', 3);

        $stmt = $this->pdo->query("SELECT * FROM priorities WHERE id = $priorityId");
        $priority = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEquals('Updated Medium', $priority['name']);
        $this->assertEquals(3, $priority['level']);
    }

    public function testDeletePriority()
    {
        $this->priorityService->createPriority('Low', 4);
        $stmt = $this->pdo->query("SELECT id FROM priorities WHERE name = 'Low'");
        $priorityId = $stmt->fetchColumn();

        $this->priorityService->deletePriority($priorityId);

        $stmt = $this->pdo->query("SELECT * FROM priorities WHERE id = $priorityId");
        $priority = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEmpty($priority);
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
        */
}


?>
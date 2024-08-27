project-task-manager/
├── src/
│   ├── config.php                # Configuration générale de l'application
│   ├── controllers/              # Contrôleurs pour gérer la logique de l'application
│   │   ├── AuthController.php    # Contrôleur pour l'authentification
│   │   ├── DashboardController.php # Contrôleur pour le tableau de bord
│   │   └── TaskController.php    # Contrôleur pour les tâches
│   ├── models/                   # Modèles représentant les entités de la base de données
│   │   ├── User.php              # Modèle pour l'entité utilisateur
│   │   ├── Task.php              # Modèle pour l'entité tâche
│   │   └── (other models)
│   ├── repositories/             # Repositories pour accéder aux données et effectuer des opérations CRUD
│   │   ├── UserRepository.php    # Repository pour l'accès aux utilisateurs
│   │   ├── TaskRepository.php    # Repository pour l'accès aux tâches
│   │   └── (other repositories)
│   ├── services/                 # Services pour la logique métier
│   │   ├── AuthService.php       # Service pour la gestion de l'authentification
│   │   ├── TaskService.php       # Service pour la gestion des tâches
│   │   └── (other services)
│   ├── handlers/                 # Gestionnaires pour les exceptions et autres traitements globaux
│   │   └── ExceptionHandler.php  # Gestionnaire d'exceptions global
│   └── helpers/                  # Fonctions utilitaires ou aides
│       └── (utility functions)
├── database/
│   └── db-config.php             # Configuration de la base de données
├── vendor/                       # Dépendances Composer (comme PHPMailer)
├── views/
│   ├── partials/                 # Éléments de page réutilisables
│   │   ├── header.php
│   │   ├── footer.php
│   ├── auth/                     # Pages d'authentification (login, sign up, reset password)
│   │   ├── login.php
│   │   ├── sign.php
│   │   ├── forget-password.php
│   │   ├── reset-password.php
│   └── dashboard/                # Pages du tableau de bord après connexion
│       └── home-dashboard.php
├── js/                           # Scripts JavaScript
│   ├── sign.js                   # Script de gestion du formulaire d'inscription
│   └── (other scripts)
├── css/                          # Feuilles de style CSS (si nécessaire)
│   └── styles.css
└── public/                       # Répertoire public pour les assets accessibles par le client
    └── index.php                 # Point d'entrée principal de l'application



CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `action` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
)

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
)

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `user_id` (`user_id`)
)

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `notification_text` text COLLATE utf8mb4_general_ci NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) 

CREATE TABLE IF NOT EXISTS `priorities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `level` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
);

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `team_id` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_name` (`project_name`),
  KEY `team_id` (`team_id`)
)

CREATE TABLE IF NOT EXISTS `project_tasks` (
  `project_id` int NOT NULL,
  `task_id` int NOT NULL,
  PRIMARY KEY (`project_id`,`task_id`),
  KEY `task_id` (`task_id`)
) 

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_name` (`role_name`)
)

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `priority_id` int DEFAULT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `task_description` text COLLATE utf8mb4_general_ci,
  `status_id` int DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  KEY `priority_id` (`priority_id`),
  KEY `status_id` (`status_id`)
);

CREATE TABLE IF NOT EXISTS `task_attachments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_id` int DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`)
);

DROP TABLE IF EXISTS `task_statuses`;
CREATE TABLE IF NOT EXISTS `task_statuses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status_name` (`status_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_name` (`team_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `team_members` (
  `user_id` int NOT NULL,
  `team_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`team_id`),
  KEY `team_id` (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
)

CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id` (`role_id`)
) 


===========================================================================================================================
To create the CRUD (Create, Read, Update, Delete) operations for each table in your database, we'll organize the operations based on the relationships between the tables. Here's a high-level outline for each table:

1. Users
Create: Add a new user with email, password_hash, and full_name.
Read: Retrieve user details by user_id or email.
Update: Modify user details like email, full_name, and password_hash.
Delete: Remove a user by user_id.

2. Roles
Create: Add a new role with role_name and description.
Read: Retrieve roles by id or role_name.
Update: Modify role details.
Delete: Remove a role by id.


3. User Roles
Create: Assign a role to a user by user_id and role_id.
Read: Retrieve roles assigned to a user or users assigned to a role.
Update: Typically, updates involve changing the role assigned to a user.
Delete: Unassign a role from a user.


4. Teams
Create: Add a new team with team_name.
Read: Retrieve team details by id.
Update: Modify team details.
Delete: Remove a team by id.


5. Team Members
Create: Add a user to a team by user_id and team_id.
Read: Retrieve members of a team or teams a user belongs to.
Update: Update might involve changing a user’s team.
Delete: Remove a user from a team.


6. Projects
Create: Add a new project with project_name, team_id, start_date, and end_date.
Read: Retrieve project details by id or team_id.
Update: Modify project details.
Delete: Remove a project by id.


7. Categories
Create: Add a new category with name and description.
Read: Retrieve categories by id or name.
Update: Modify category details.
Delete: Remove a category by id.


8. Tasks
Create: Add a new task with task_name, task_description, user_id, category_id, priority_id, status_id, and due_date.
Read: Retrieve tasks by various filters like user_id, category_id, etc.
Update: Modify task details.
Delete: Remove a task by id.


9. Task Attachments
Create: Attach a file to a task by task_id and file_path.
Read: Retrieve attachments for a task.
Delete: Remove an attachment by id.


10. Task Statuses
Create: Add a new status with status_name and description.
Read: Retrieve statuses by id or status_name.
Update: Modify status details.
Delete: Remove a status by id.


11. Priorities
Create: Add a new priority with name and level.
Read: Retrieve priorities by id or name.
Update: Modify priority details.
Delete: Remove a priority by id.


12. Comments
Create: Add a new comment to a task with task_id, user_id, and comment.
Read: Retrieve comments by task_id or user_id.
Update: Modify comment content.
Delete: Remove a comment by id.


13. Notifications
Create: Add a new notification for a user with user_id and notification_text.
Read: Retrieve notifications by user_id.
Update: Mark notification as read (is_read).
Delete: Remove a notification by id.


14. Activity Logs
Create: Log an action performed by a user.
Read: Retrieve logs by user_id or date range.
Delete: Logs are typically retained for auditing, but you may have the option to remove old logs.


15. Project Tasks
Create: Assign a task to a project by project_id and task_id.
Read: Retrieve tasks assigned to a project or projects a task is associated with.
Delete: Unassign a task from a project.
To implement these operations in PHP, you can create a set of functions or classes that handle the CRUD operations for each table. This structure allows you to manage the relationships between tables, such as linking tasks to users or projects and assigning roles to users.

Would you like to start implementing these CRUD operations in PHP, or do you need a more detailed code example?
===========================================================================================================================

Authentification et Autorisation

Connexion et déconnexion des utilisateurs.
Gestion des sessions.
Gestion des rôles et des permissions.
Gestion du Profil Utilisateur

Mise à jour des informations du profil.
Réinitialisation de mot de passe.
Gestion des préférences utilisateur.
Services de Gestion des Tâches
Service de Création de Tâches

Création de nouvelles tâches.
Affectation des tâches à des utilisateurs spécifiques.
Service de Mise à Jour des Tâches

Modification des détails des tâches.
Changement de statut des tâches (en cours, terminée, en retard).
Service de Suppression des Tâches

Suppression des tâches.
Archivage des tâches terminées ou obsolètes.
Service de Filtrage et de Recherche de Tâches

Filtrage des tâches par utilisateur, statut, priorité, etc.
Recherche de tâches par mots-clés.
Services de Gestion des Projets
Service de Création de Projets

Création de nouveaux projets.
Affectation des projets à des équipes spécifiques.
Service de Mise à Jour des Projets

Modification des détails des projets.
Mise à jour des dates de début et de fin des projets.
Service de Suppression des Projets

Suppression des projets.
Archivage des projets terminés ou annulés.
Services de Gestion des Équipes
Service de Création d'Équipes

Création de nouvelles équipes.
Affectation des utilisateurs aux équipes.
Service de Mise à Jour des Équipes

Modification des détails des équipes.
Changement de membres d'équipe.
Service de Suppression des Équipes

Suppression des équipes.
Gestion des équipes inactives.
Services de Notifications
Service de Création de Notifications

Création de notifications pour les utilisateurs.
Gestion des événements déclenchant les notifications.
Service de Lecture et Suppression des Notifications

Marquage des notifications comme lues.
Suppression des notifications obsolètes.
Services de Gestion des Commentaires
Service de Création de Commentaires

Ajout de commentaires aux tâches.
Affectation des commentaires aux utilisateurs.
Service de Mise à Jour des Commentaires

Modification du contenu des commentaires.
Gestion des réponses aux commentaires.
Service de Suppression des Commentaires

Suppression des commentaires.
Services de Gestion des Fichiers Attachés
Service de Téléchargement de Fichiers

Téléchargement de fichiers attachés aux tâches.
Gestion des types de fichiers autorisés.
Service de Suppression de Fichiers

Suppression des fichiers attachés.
Services de Gestion des Statistiques et des Rapports
Service de Génération de Rapports

Génération de rapports sur les tâches, projets, etc.
Exportation des rapports en différents formats (PDF, Excel).
Service de Suivi et d'Analyse

Suivi de l'activité des utilisateurs.
Analyse des performances des projets et des équipes.
Services de Gestion des Logs
Service de Création de Logs

Enregistrement des actions des utilisateurs.
Suivi des erreurs et des événements importants.
Service de Consultation et de Suppression des Logs

Consultation des logs pour le debugging et l'audit.
Suppression des anciens logs.

===========================================================================================================================
<?php

namespace App\Models;

class Priority
{
    private $id;
    private $name;
    private $level;
    private $createdAt;

    // Getters and setters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getLevel() { return $this->level; }
    public function getCreatedAt() { return $this->createdAt; }

    public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setLevel($level) { $this->level = $level; }
    public function setCreatedAt($createdAt) { $this->createdAt = $createdAt; }
}
?>

<?php

namespace App\Repositories;

use App\Models\Priority;
use PDO;

class PriorityRepository
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM priorities");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Priority::class);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM priorities WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(Priority::class);
    }

    public function save(Priority $priority)
    {
        $stmt = $this->db->prepare("INSERT INTO priorities (name, level, created_at) VALUES (:name, :level, NOW())");
        $stmt->bindParam(':name', $priority->getName());
        $stmt->bindParam(':level', $priority->getLevel());
        $stmt->execute();
    }

    public function update(Priority $priority)
    {
        $stmt = $this->db->prepare("UPDATE priorities SET name = :name, level = :level WHERE id = :id");
        $stmt->bindParam(':name', $priority->getName());
        $stmt->bindParam(':level', $priority->getLevel());
        $stmt->bindParam(':id', $priority->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM priorities WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>

<?php

namespace App\Services;

use App\Repositories\PriorityRepository;
use App\Models\Priority;

class PriorityService
{
    private $priorityRepository;

    public function __construct(PriorityRepository $priorityRepository)
    {
        $this->priorityRepository = $priorityRepository;
    }

    public function getAllPriorities()
    {
        return $this->priorityRepository->findAll();
    }

    public function getPriorityById($id)
    {
        return $this->priorityRepository->findById($id);
    }

    public function createPriority($name, $level)
    {
        $priority = new Priority();
        $priority->setName($name);
        $priority->setLevel($level);
        $this->priorityRepository->save($priority);
    }

    public function updatePriority($id, $name, $level)
    {
        $priority = $this->priorityRepository->findById($id);
        if ($priority) {
            $priority->setName($name);
            $priority->setLevel($level);
            $this->priorityRepository->update($priority);
        }
    }

    public function deletePriority($id)
    {
        $this->priorityRepository->delete($id);
    }
}
?>



<?php

namespace App\Controllers;

use App\Services\PriorityService;

class PriorityController
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
?>


<?php

namespace App\Models;

class Task
{
    private $id;
    private $userId;
    private $categoryId;
    private $priorityId;
    private $taskName;
    private $taskDescription;
    private $statusId;
    private $dueDate;
    private $createdAt;
    private $updatedAt;

    // Getters and setters...
}
?>


<?php

namespace App\Repositories;

use App\Models\Task;
use PDO;

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
        return $stmt->fetchAll(PDO::FETCH_CLASS, Task::class);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(Task::class);
    }

    public function save(Task $task)
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (user_id, category_id, priority_id, task_name, task_description, status_id, due_date, created_at, updated_at) VALUES (:user_id, :category_id, :priority_id, :task_name, :task_description, :status_id, :due_date, NOW(), NOW())");
        $stmt->bindParam(':user_id', $task->getUserId());
        $stmt->bindParam(':category_id', $task->getCategoryId());
        $stmt->bindParam(':priority_id', $task->getPriorityId());
        $stmt->bindParam(':task_name', $task->getTaskName());
        $stmt->bindParam(':task_description', $task->getTaskDescription());
        $stmt->bindParam(':status_id', $task->getStatusId());
        $stmt->bindParam(':due_date', $task->getDueDate());
        $stmt->execute();
    }

    public function update(Task $task)
    {
        $stmt = $this->db->prepare("UPDATE tasks SET user_id = :user_id, category_id = :category_id, priority_id = :priority_id, task_name = :task_name, task_description = :task_description, status_id = :status_id, due_date = :due_date, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':user_id', $task->getUserId());
        $stmt->bindParam(':category_id', $task->getCategoryId());
        $stmt->bindParam(':priority_id', $task->getPriorityId());
        $stmt->bindParam(':task_name', $task->getTaskName());
        $stmt->bindParam(':task_description', $task->getTaskDescription());
        $stmt->bindParam(':status_id', $task->getStatusId());
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
        $tasks = $this->taskService->getAllTasks();
        include __DIR__ . '/../views/tasks/list.php';
    }

    public function viewTask($id)
    {
        $task = $this->taskService->getTaskById($id);
        include __DIR__ . '/../views/tasks/view.php';
    }

    public function createTask()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->taskService->createTask($_POST['user_id'], $_POST['category_id'], $_POST['priority_id'], $_POST['task_name'], $_POST['task_description'], $_POST['status_id'], $_POST['due_date']);
            header('Location: /tasks');
        } else {
            include __DIR__ . '/../views/tasks/create.php';
        }
    }

    public function updateTask($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->taskService->updateTask($id, $_POST['user_id'], $_POST['category_id'], $_POST['priority_id'], $_POST['task_name'], $_POST['task_description'], $_POST['status_id'], $_POST['due_date']);
            header('Location: /tasks');
        } else {
            $task = $this->taskService->getTaskById($id);
            include __DIR__ . '/../views/tasks/update.php';
        }
    }

    public function deleteTask($id)
    {
        $this->taskService->deleteTask($id);
        header('Location: /tasks');
    }
}
?>



<?php

namespace App\Models;

class Project
{
    private $id;
    private $name;
    private $description;
    private $startDate;
    private $endDate;
    private $statusId;
    private $createdAt;
    private $updatedAt;

    // Getters and setters...
}
?>


<?php

namespace App\Repositories;

use App\Models\Project;
use PDO;

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
        return $stmt->fetchAll(PDO::FETCH_CLASS, Project::class);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(Project::class);
    }

    public function save(Project $project)
    {
        $stmt = $this->db->prepare("INSERT INTO projects (name, description, start_date, end_date, status_id, created_at, updated_at) VALUES (:name, :description, :start_date, :end_date, :status_id, NOW(), NOW())");
        $stmt->bindParam(':name', $project->getName());
        $stmt->bindParam(':description', $project->getDescription());
        $stmt->bindParam(':start_date', $project->getStartDate());
        $stmt->bindParam(':end_date', $project->getEndDate());
        $stmt->bindParam(':status_id', $project->getStatusId());
        $stmt->execute();
    }

    public function update(Project $project)
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



<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use App\Models\Project;

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
            $this
?>
==========================================================================================================================

<?php

use PHPUnit\Framework\TestCase;
use App\Services\PriorityService;
use App\Repositories\PriorityRepository;
use PDO;

class PriorityServiceTest extends TestCase
{
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
}
?>


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
        $this->taskService = new TaskService($taskRepository);

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

https://chatgpt.com/c/bb36969e-8851-48b2-84c5-386145bb4b47
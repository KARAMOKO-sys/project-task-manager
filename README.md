project-task-manager/
├── src/
│   ├── config.php                # Configuration générale de l'application
│   ├── controllers/              # Contrôleurs pour gérer la logique de l'application
│   │   ├── AuthController.php    # Contrôleur pour l'authentification
│   │   ├── DashboardController.php # Contrôleur pour le tableau de bord
│   │   └── TaskController.php    # Contrôleur pour les tâches
|       |__ view-dashboard
            |__home-controller.php
|
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

│   ├── auth/                     # Pages d'authentification (login, sign up, reset password)
│   │   ├── login.php
│   │   ├── sign.php
│   │   ├── forget-password.php
│   │   ├── reset-password.php
│   │   └── dashboard/
│   │       ├── home-dashboard.php
│   │       └── partials-dashboard/
│   │       |    └── header-dashboard.php
│   │       |    ├── footer-dashboard.php
     
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

==========================================================================================================================

https://chatgpt.com/c/bb36969e-8851-48b2-84c5-386145bb4b47
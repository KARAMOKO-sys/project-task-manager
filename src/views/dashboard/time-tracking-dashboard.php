<!-- time-tracking-dashboard.php -->
<head>
    <!-- Header and style -->
    <?php
    $file = __DIR__ . '/partials-dashboard/header-dashboard.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Le fichier $file n'existe pas.";
    }
    ?>

    <!-- Navigation -->
    <?php
        $file = __DIR__ . '/partials-dashboard/nav-bar-dashboard.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            echo "Le fichier $file n'existe pas.";
        }
    ?>

    <?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <!-- Sidebar -->
    <?php renderSidebar(); ?>

    <!-- Fichier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/time-tracking.scss">
  
</head>

<div class="container">

    <!-- Main Content -->
    <div id="dashboard" class="content-section">
        <div class="row">
            <div class="title">
                <h1 class="h2 m-5">Time-Tracking Task Manager</h1>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addTaskModal">Ajouter une Tâche</button>
        </div>
        <table class="task-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="taskList">
                <tr>
                    <td>1</td>
                    <td>Développer l'API</td>
                    <td>Créer une API REST pour gérer les utilisateurs.</td>
                    <td>2024-09-01</td>
                    <td>2024-09-15</td>
                    <td>Terminé</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editTask(this)">Modifier</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteTask(this)">Supprimer</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Conception de la Base de Données</td>
                    <td>Modéliser la base de données pour le projet.</td>
                    <td>2024-09-10</td>
                    <td>2024-09-20</td>
                    <td>En cours</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editTask(this)">Modifier</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteTask(this)">Supprimer</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Test Unitaire</td>
                    <td>Écrire des tests unitaires pour les fonctionnalités principales.</td>
                    <td>2024-09-05</td>
                    <td>2024-09-10</td>
                    <td>À faire</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editTask(this)">Modifier</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteTask(this)">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Add Task Modal -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Ajouter une Tâche</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addTaskForm">
                        <div class="mb-3">
                            <label for="taskTitle" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="taskTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="taskDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="taskStartDate" class="form-label">Date de Début</label>
                            <input type="date" class="form-control" id="taskStartDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskEndDate" class="form-label">Date de Fin</label>
                            <input type="date" class="form-control" id="taskEndDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskStatus" class="form-label">Statut</label>
                            <select class="form-select" id="taskStatus" required>
                                <option value="" disabled selected>Choisir un statut</option>
                                <option value="À faire">À faire</option>
                                <option value="En cours">En cours</option>
                                <option value="Terminé">Terminé</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-custom" id="saveTask">Ajouter Tâche</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo BASE_URL; ?>js/time-tracking.js"></script>

    <footer>
        <?php
            $file = __DIR__ . '/partials-dashboard/footer-dashboard.php';
            if (file_exists($file)) {
                require_once $file;
            } else {
                echo "Le fichier $file n'existe pas.";
            }
        ?>
    </footer>
</div>

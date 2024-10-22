<!-- views/dashboard/task-dashboard.php -->

<head>
    <?php
    $file = __DIR__ . '/partials-dashboard/header-dashboard.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Le fichier $file n'existe pas.";
    }
    ?>

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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/task.scss">
</head>

<div class="container">
<div class="body-task">
  <body>
    <div class="container">
        <div class="title">
            <h1 class="mt-5">Gestion des Tâches</h1>
            <p class="lead mb-4 text-center">Suivez les tâches assignées et leur progression pour améliorer la gestion de vos projets.</p>
            <button class="btn btn-primary add-task-btn" data-toggle="modal" data-target="#addTaskModal">Ajouter une Tâche</button>
        </div>

        <div class="tableau">
            <table id="taskTable" class="table table-striped table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Tâche</th>
                        <th>Statut</th>
                        <th>Date Limite</th>
                        <th>Assigné à</th>
                        <th>Priorité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mettre à jour le site web</td>
                        <td><span class="badge bg-warning text-dark">En cours</span></td>
                        <td>30 Août 2024</td>
                        <td>Jean Dupont</td>
                        <td><span class="badge bg-danger">Élevée</span></td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick="editTask(this)">Modifier</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteTask(this)">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Préparer la réunion de projet</td>
                        <td><span class="badge bg-success">Terminé</span></td>
                        <td>25 Août 2024</td>
                        <td>Marie Lemoine</td>
                        <td><span class="badge bg-secondary">Moyenne</span></td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick="editTask(this)">Modifier</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteTask(this)">Supprimer</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal for Adding a Task -->
        <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTaskModalLabel">Ajouter une Tâche</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="taskName" placeholder="Nom de la tâche" required>
                        <textarea id="taskDescription" rows="3" placeholder="Description de la tâche"></textarea>
                        <input type="date" id="dueDate" placeholder="Date Limite" required>
                        <input type="text" id="assignedTo" placeholder="Assigné à" required>
                        <select id="taskPriority">
                            <option value="Élevée">Élevée</option>
                            <option value="Moyenne">Moyenne</option>
                            <option value="Faible">Faible</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" onclick="addTask()">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>


    <script src="<?php echo BASE_URL; ?>js/tasks.js"></script>

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

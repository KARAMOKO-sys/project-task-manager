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
</head>

<?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
?>
<!-- Sidebar -->
<?php renderSidebar(); ?>

<div class="container">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 1200px;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .title {
            margin-bottom: 20px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            border-radius: 4px;
            margin: 0 2px;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 0.5em;
        }

        .tableau {
            margin: 0 auto;
            width: 100%;
        }

        table {
            width: 100%;
            font-size: 1.1em;
        }

        th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        td {
            text-align: center;
        }

        .add-task-btn {
            margin-bottom: 20px;
        }

        .modal-body input,
        .modal-body textarea {
            width: 100%;
            margin-bottom: 10px;
        }

        .badge {
            font-size: 0.9em;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            h1 {
                font-size: 2em;
            }
        }
        .body-task {
            margin-left: 10rem;
        }
    </style>
</head>
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


    <script>
        $(document).ready(function() {
            $('#taskTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/French.json'
                }
            });
        });

        function addTask() {
            const taskName = $('#taskName').val();
            const taskDescription = $('#taskDescription').val();
            const dueDate = $('#dueDate').val();
            const assignedTo = $('#assignedTo').val();
            const taskPriority = $('#taskPriority').val();

            const newRow = `<tr>
                                <td>${taskName}</td>
                                <td><span class="badge bg-warning text-dark">En cours</span></td>
                                <td>${dueDate}</td>
                                <td>${assignedTo}</td>
                                <td><span class="badge bg-${getPriorityClass(taskPriority)}">${taskPriority}</span></td>
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="editTask(this)">Modifier</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteTask(this)">Supprimer</button>
                                </td>
                            </tr>`;
            $('#taskTable tbody').append(newRow);
            $('#addTaskModal').modal('hide');
            $('#taskName').val('');
            $('#taskDescription').val('');
            $('#dueDate').val('');
            $('#assignedTo').val('');
            $('#taskPriority').val('Élevée');
        }

        function getPriorityClass(priority) {
            switch (priority) {
                case 'Élevée':
                    return 'danger';
                case 'Moyenne':
                    return 'warning';
                case 'Faible':
                    return 'secondary';
            }
        }

        function editTask(btn) {
            alert('Modifier la tâche (fonctionnalité à implémenter)');
        }

        function deleteTask(btn) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette tâche?')) {
                $(btn).closest('tr').remove();
            }
        }
    </script>

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

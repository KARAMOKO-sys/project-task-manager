<!-- views/dashboard/task-dashboard.php -->

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
</head>

<?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
?>
<!-- Sidebar -->
<?php renderSidebar(); ?>

<div class="container">
      <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
        }

        .container {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            border-radius: 4px;
            margin: 0 2px;
            background-color: #007bff;
            color: white;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 0.5em;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Gestion des Tâches</h1>
        <p class="lead mb-4">Suivez les tâches assignées et leur progression pour améliorer la gestion de vos projets.</p>

        <table id="taskTable" class="table table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Tâche</th>
                    <th>Statut</th>
                    <th>Date Limite</th>
                    <th>Assigné à</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mettre à jour le site web</td>
                    <td><span class="badge bg-warning text-dark">En cours</span></td>
                    <td>30 Août 2024</td>
                    <td>Jean Dupont</td>
                </tr>
                <tr>
                    <td>Préparer la réunion de projet</td>
                    <td><span class="badge bg-success">Terminé</span></td>
                    <td>25 Août 2024</td>
                    <td>Marie Lemoine</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#taskTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/French.json'
                }
            });
        });
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


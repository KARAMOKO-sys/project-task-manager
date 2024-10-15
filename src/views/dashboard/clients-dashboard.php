<!-- clients-dashboard.php -->
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

    <!-- Main Content -->
     <style>
        body {
            background-color: #f4f6f9;
        }

        .container {
            margin-top: 20px;
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

        .btn-add-client {
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-add-client:hover {
            background-color: #0056b3;
        }

        .btn-edit {
            background-color: #17a2b8;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-edit:hover {
            background-color: #117a8b;
        }

        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        table.dataTable thead th {
            background-color: #007bff;
            color: white;
        }

        table.dataTable tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table.dataTable tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Clients</h1>
        <table id="clientsTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamically loaded clients here -->
            </tbody>
        </table>

        <button id="addClient" class="btn-add-client btn btn-lg mt-3">Ajouter un Client</button>
    </div>

    <script>
        $(document).ready(function() {
            var clientsTable = $('#clientsTable').DataTable({
                ajax: 'fetch-clients.php',
                columns: [
                    { data: 'nom' },
                    { data: 'email' },
                    { data: 'telephone' },
                    { data: null, render: function(data) {
                        return '<button class="btn-edit btn btn-sm me-2">Modifier</button>' +
                               '<button class="btn-delete btn btn-sm">Supprimer</button>';
                    }}
                ]
            });

            $('#addClient').click(function() {
                alert('Ajouter un nouveau client');
                // Ajouter un client logic here
            });

            $('#clientsTable').on('click', '.btn-delete', function() {
                var row = clientsTable.row($(this).parents('tr'));
                var data = row.data();
                if (confirm('Voulez-vous vraiment supprimer ce client?')) {
                    // Suppression logic here (ex. AJAX request)
                    row.remove().draw();
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

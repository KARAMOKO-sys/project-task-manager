<!-- reports-dashboard.php -->
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

        .btn-export {
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-export:hover {
            background-color: #218838;
        }

        .btn-view {
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-view:hover {
            background-color: #0056b3;
        }

        .btn-download {
            background-color: #ffc107;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-download:hover {
            background-color: #e0a800;
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
        <h1>Rapports</h1>
        <table id="reportsTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom du Rapport</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamically loaded reports here -->
            </tbody>
        </table>

        <button id="exportReports" class="btn-export btn btn-lg mt-3">Exporter les Rapports</button>
    </div>

    <script>
        $(document).ready(function() {
            var reportsTable = $('#reportsTable').DataTable({
                ajax: 'fetch-reports.php',
                columns: [
                    { data: 'nom' },
                    { data: 'date' },
                    { data: 'type' },
                    { data: null, render: function(data) {
                        return '<button class="btn-view btn btn-sm me-2">Voir</button>' +
                               '<button class="btn-download btn btn-sm">Télécharger</button>';
                    }}
                ]
            });

            $('#exportReports').click(function() {
                alert('Exporter les rapports');
                // Export logic here
            });

            $('#reportsTable').on('click', '.btn-download', function() {
                var data = reportsTable.row($(this).parents('tr')).data();
                window.location.href = 'download-report.php?id=' + data.id;
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

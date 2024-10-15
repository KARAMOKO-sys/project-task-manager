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

    <style>
        body {
            background-color: #f4f6f9;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
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

        .btn-details {
            background-color: #6f42c1;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-details:hover {
            background-color: #5a32a3;
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

        .title {
            margin-left: 2rem;
        }

        #reportsTable {
            margin-left: 2rem;
        }

        #exportReports {
            margin-left: 2rem;
        }

        .form-control {
            border-radius: 0.25rem;
        }

        .search-bar {
            margin-bottom: 20px;
            margin-left: 2rem;
            display: flex;
            gap: 10px;
        }

        .filter-bar {
            margin-bottom: 20px;
            margin-left: 2rem;
            display: flex;
            gap: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-modal-save {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-modal-cancel {
            background-color: #6c757d;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>Rapports</h1>
        </div>

        <div class="search-bar">
            <input type="text" id="searchReport" class="form-control" placeholder="Rechercher un rapport...">
        </div>

        <div class="filter-bar">
            <select id="filterType" class="form-control">
                <option value="">Filtrer par type</option>
                <option value="PDF">PDF</option>
                <option value="Excel">Excel</option>
                <option value="Word">Word</option>
            </select>
            <select id="filterDate" class="form-control">
                <option value="">Filtrer par date</option>
                <option value="last7days">7 derniers jours</option>
                <option value="last30days">30 derniers jours</option>
                <option value="lastYear">Année dernière</option>
            </select>
        </div>

        <table id="reportsTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom du Rapport</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamically loaded reports here -->
            </tbody>
        </table>

        <button id="exportReports" class="btn-export btn btn-lg mt-3">Exporter les Rapports</button>
    </div>

    <div id="viewReportModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Détails du Rapport</h2>
            <div class="form-group">
                <label for="reportName">Nom:</label>
                <input type="text" id="reportName" name="reportName" disabled>
            </div>
            <div class="form-group">
                <label for="reportDate">Date:</label>
                <input type="text" id="reportDate" name="reportDate" disabled>
            </div>
            <div class="form-group">
                <label for="reportType">Type:</label>
                <input type="text" id="reportType" name="reportType" disabled>
            </div>
            <div class="form-group">
                <label for="reportDescription">Description:</label>
                <textarea id="reportDescription" name="reportDescription" rows="4" disabled></textarea>
            </div>
            <div class="modal-buttons">
                <button class="btn-modal-cancel">Fermer</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var reportsTable = $('#reportsTable').DataTable({
                ajax: 'fetch-reports.php',
                columns: [
                    { data: 'nom' },
                    { data: 'date' },
                    { data: 'type' },
                    { data: 'description' },
                    {
                        data: null,
                        render: function (data) {
                            return '<button class="btn-view btn btn-sm me-2">Voir</button>' +
                                '<button class="btn-download btn btn-sm me-2">Télécharger</button>' +
                                '<button class="btn-details btn btn-sm">Détails</button>';
                        }
                    }
                ]
            });

            $('#exportReports').click(function () {
                alert('Exporter les rapports');
            });

            $('#reportsTable').on('click', '.btn-view', function () {
                var data = reportsTable.row($(this).parents('tr')).data();
                alert('Voir le rapport: ' + data.nom);
            });

            $('#reportsTable').on('click', '.btn-download', function () {
                var data = reportsTable.row($(this).parents('tr')).data();
                window.location.href = 'download-report.php?id=' + data.id;
            });

            $('#reportsTable').on('click', '.btn-details', function () {
                var data = reportsTable.row($(this).parents('tr')).data();
                $('#reportName').val(data.nom);
                $('#reportDate').val(data.date);
                $('#reportType').val(data.type);
                $('#reportDescription').val(data.description);
                $('#viewReportModal').show();
            });

            $('.close, .btn-modal-cancel').click(function () {
                $('#viewReportModal').hide();
            });

            $('#searchReport').on('keyup', function () {
                reportsTable.search(this.value).draw();
            });

            $('#filterType').change(function () {
                var filterType = $(this).val();
                reportsTable.column(2).search(filterType).draw();
            });

            $('#filterDate').change(function () {
                var filterDate = $(this).val();
                reportsTable.ajax.url('fetch-reports.php?date=' + filterDate).load();
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
</body>

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
    <?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <!-- Sidebar -->
    <?php renderSidebar(); ?>

    <!-- Fichier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/reports.scss">
</head>

<div class="container">

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
    <!-- Fichier JS -->
    <script src="<?php echo BASE_URL; ?>js/reports.js"></script>
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

<!-- archives-dashboard.php -->
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
          // Utilisez realpath pour assurer l'obtention d'un chemin correct
    require_once realpath($_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php');
    
    // Vérifiez si BASE_URL est bien définie et se termine par un slash.
    if (!defined('BASE_URL')) {
        define('BASE_URL', '/project-task-manager/src/');
    }
    
    ?>
    <!-- FIchier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/archives.scss">

    <?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <!-- Sidebar -->
    <?php renderSidebar(); ?>
</head>

<!-- Main Container -->
<div class="container">
<body>
    <div class="container">
        <div class="archive-header">
            <h2>Archives</h2>
            <div class="filter-date">
                <input type="date" id="filterDate" placeholder="Filtrer par date">
            </div>
        </div>

        <div class="archive-list" id="archiveList">
            <div class="archive-item">
                <div class="title">Projet A - Rapport final</div>
                <div class="date">12/01/2024</div>
            </div>
            <div class="archive-item">
                <div class="title">Réunion d'équipe - Notes</div>
                <div class="date">28/12/2023</div>
            </div>
            <div class="archive-item">
                <div class="title">Présentation des résultats Q3</div>
                <div class="date">05/11/2023</div>
            </div>
            <div class="archive-item">
                <div class="title">Mise à jour du manuel utilisateur</div>
                <div class="date">21/10/2023</div>
            </div>
        </div>

        <button id="loadMore" class="btn btn-primary mt-3">Charger plus</button>
    </div>

    <!-- Fichier JS -->
    <script src="<?php echo BASE_URL; ?>js/archives.js"></script>

    <!-- Footer -->
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

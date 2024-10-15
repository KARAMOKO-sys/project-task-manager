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
    ?>

    <?php
    // Utilisez realpath pour assurer l'obtention d'un chemin correct
    require_once realpath($_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php');
    
    // Vérifiez si BASE_URL est bien définie et se termine par un slash.
    if (!defined('BASE_URL')) {
        define('BASE_URL', '/project-task-manager/src/');
    }
    
    // Utilisez le chemin complet pour éviter toute ambiguïté
    $headerPath = $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/header.php';
    //echo "Chemin header.php = " . $headerPath . "<br>";
    
    // Inclure le fichier header.php avec le bon chemin
    require $headerPath;
    ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/archives.scss">
</head>

<?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
?>
<!-- Sidebar -->
<?php renderSidebar(); ?>
=<div class="container">

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

    <script>
        // Sample Data for additional archives
        var additionalArchives = [
            { title: 'Rapport d\'audit interne', date: '12/09/2023' },
            { title: 'Plan de projet - Phase 2', date: '01/08/2023' },
            { title: 'Résultats des ventes - Juin 2023', date: '30/06/2023' },
            { title: 'Compte-rendu de réunion de stratégie', date: '15/06/2023' }
        ];

        document.getElementById('loadMore').addEventListener('click', function() {
            var archiveList = document.getElementById('archiveList');
            additionalArchives.forEach(function(archive) {
                var newArchive = document.createElement('div');
                newArchive.className = 'archive-item';
                newArchive.innerHTML = `
                    <div class="title">${archive.title}</div>
                    <div class="date">${archive.date}</div>
                `;
                archiveList.appendChild(newArchive);
            });
            additionalArchives = []; // Clear additional archives once loaded
        });

        document.getElementById('filterDate').addEventListener('change', function() {
            var filterDate = this.value;
            // Implement date filtering logic here
            alert('Filtrage par date sélectionnée : ' + filterDate);
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

<!DOCTYPE html>
<html lang="en">
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
    
    <!-- Sidebar -->
    <?php
        require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <?php renderSidebar(); ?>
    <!-- Fichier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/home.scss">
</head> 

<body>
    <div class="container mt-5 ml-auto offset-5">
        <h1>Tableau de Bord</h1>
        <p>Suivez les performances de vos projets et tâches.</p>

        <div class="stats-overview ml-5">
            <div class="overview-box">
                <i class="fa fa-tasks"></i>
                <h2>50 Tâches</h2>
                <p>En cours</p>
            </div>
            <div class="overview-box">
                <i class="fa fa-folder-open"></i>
                <h2>10 Projets</h2>
                <p>Actifs</p>
            </div>
            <div class="overview-box">
                <i class="fa fa-users"></i>
                <h2>25 Membres</h2>
                <p>Dans l'équipe</p>
            </div>
            <div class="overview-box">
                <i class="fa fa-clock"></i>
                <h2>15 Jours</h2>
                <p>Avant échéance</p>
            </div>
            <div class="overview-box">
                <i class="fa fa-check-circle"></i>
                <h2>8 Projets</h2>
                <p>Terminés</p>
            </div>
        </div>

        <div class="recent-activities">
            <h2>Activités Récentes</h2>
            <div class="activity">
                <span>Tâche "Design UI" terminée</span>
                <span>1 heure ago</span>
            </div>
            <div class="activity">
                <span>Nouveau projet "Site Web" créé</span>
                <span>2 heures ago</span>
            </div>
            <div class="activity">
                <span>Membre "Alice" ajouté à l'équipe</span>
                <span>3 heures ago</span>
            </div>
            <div class="activity">
                <span>Tâche "Documentation" mise à jour</span>
                <span>4 heures ago</span>
            </div>
        </div>
    </div>

     
    <!-- Fichier JS -->
    <script src="<?php echo BASE_URL; ?>js/home-dashboard.js"></script>

    <footer class="footer">
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
</html>

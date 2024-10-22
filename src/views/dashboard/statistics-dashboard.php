<!-- statistics-dashboard.php -->
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
     <!-- Fichier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/statistics.scss">

    <?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <!-- Sidebar -->
    <?php renderSidebar(); ?>
</head>

<div class="container">
    <!-- Main Content -->
<body>
    <div class="container">
       <div class="title">
            <h1>Statistiques</h1>
            <p class="lead">Analysez les données et performances clés de l'application.</p>
        </div>

        <div class="body-container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center p-4">
                        <div class="stat-title">Utilisateurs Actifs</div>
                        <div class="stat-value">1,250</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center p-4">
                        <div class="stat-title">Projets Complétés</div>
                        <div class="stat-value">320</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center p-4">
                        <div class="stat-title">Tâches en Cours</div>
                        <div class="stat-value">45</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center p-4">
                        <div class="stat-title">Événements À Venir</div>
                        <div class="stat-value">8</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center p-4">
                        <div class="stat-title">Dépenses Totales</div>
                        <div class="stat-value">€45,230</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center p-4">
                        <div class="stat-title">Temps Passé</div>
                        <div class="stat-value">1,430 heures</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <canvas id="tasksChart" width="400" height="200"></canvas>
        </div>

        <div class="statistics-table">
            <h2>Rapport Détail</h2>
            <table>
                <thead>
                    <tr>
                        <th>Mois</th>
                        <th>Utilisateurs Inscrits</th>
                        <th>Tâches Complétées</th>
                        <th>Projets Lancés</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Janvier</td>
                        <td>120</td>
                        <td>45</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Février</td>
                        <td>150</td>
                        <td>50</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>Mars</td>
                        <td>180</td>
                        <td>65</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Avril</td>
                        <td>140</td>
                        <td>55</td>
                        <td>6</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="<?php echo BASE_URL; ?>js/statistics.js"></script>
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

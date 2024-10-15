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
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .stat-title {
            font-size: 1.2em;
            color: #666;
        }

        .stat-value {
            font-size: 2em;
            color: #007bff;
        }

        .chart-container {
            margin-top: 30px;
        }

        .section-title {
            margin-top: 40px;
            font-size: 1.8em;
            color: #007bff;
        }
    </style>
</head>

<body>

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tableau de Bord</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aide</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Statistiques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container">
        <h1>Statistiques</h1>
        <p class="lead">Analysez les données et performances clés de l'application.</p>

        <!-- Cartes de statistiques -->
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

        <!-- Graphique de statistiques -->
        <div class="chart-container">
            <h2 class="section-title">Évolution des Tâches Complétées</h2>
            <canvas id="tasksChart"></canvas>
        </div>
    </div>

    <script>
        // Initialisation du graphique avec Chart.js
        const ctx = document.getElementById('tasksChart').getContext('2d');
        const tasksChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Tâches Complétées',
                    data: [5, 10, 15, 12, 18, 25, 20, 22, 30, 40, 38, 45],
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
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


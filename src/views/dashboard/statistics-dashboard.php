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

        .title {
           margin-left: 2rem;
        }

        #section-title {
           margin-left: 5rem; 
        }

        .body-container {
           margin-left: 7rem;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
        }

        .card-header {
            font-weight: bold;
            font-size: 1.2em;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .progress {
            height: 20px;
        }

        .progress-bar {
            background-color: #28a745;
        }

        .progress-label {
            margin-top: 10px;
            font-size: 0.9em;
            color: #666;
        }

        .action-btns {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .statistics-table {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .statistics-table table {
            width: 100%;
            text-align: left;
            margin-top: 10px;
            color: #333;
            border-collapse: collapse;
        }

        .statistics-table th, .statistics-table td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .statistics-table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .statistics-table td {
            color: #666;
        }

    </style>
</head>

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

    <script>
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

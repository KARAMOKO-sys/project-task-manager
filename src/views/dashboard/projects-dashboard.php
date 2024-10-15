<!-- projects-dashboard.php -->

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
            color: #333;
            margin-bottom: 20px;
        }

        .chart-container {
            margin: 20px 0;
        }

        .overview-box {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .overview-box i {
            font-size: 2em;
        }

        .overview-box h2 {
            margin: 15px 0;
            font-size: 1.8em;
        }

        .overview-box p {
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Gestion des Projets</h1>
        <p class="lead">Visualisez l'état des projets en cours et terminés pour suivre la progression.</p>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="overview-box">
                    <i class="fa fa-check-circle"></i>
                    <h2>10 Projets Terminés</h2>
                    <p>Suivi des projets complétés avec succès.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="overview-box bg-success">
                    <i class="fa fa-spinner"></i>
                    <h2>5 Projets en Cours</h2>
                    <p>Projets actuellement en développement.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="overview-box bg-danger">
                    <i class="fa fa-exclamation-triangle"></i>
                    <h2>2 Projets en Retard</h2>
                    <p>Projets nécessitant une attention immédiate.</p>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <canvas id="projectStatusChart"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('projectStatusChart').getContext('2d');
        var projectStatusChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Projet 1', 'Projet 2', 'Projet 3', 'Projet 4'],
                datasets: [{
                    label: 'Projets terminés',
                    data: [2, 3, 1, 5],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }, {
                    label: 'Projets en cours',
                    data: [3, 2, 4, 1],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            borderDash: [5, 5]
                        }
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



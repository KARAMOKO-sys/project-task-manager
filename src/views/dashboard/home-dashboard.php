
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
<body>
    <!-- Sidebar -->
    <?php
        require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <?php renderSidebar(); ?>

    <!-- Main Content -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
        }

        .container {
            margin: 300px;
            padding: 50px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .chart-container {
            width: 100%;
            margin: 20px 0;
        }

        .stats-overview {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .overview-box {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 30%;
            text-align: center;
        }

        .overview-box i {
            font-size: 2em;
        }

        .overview-box h2 {
            margin: 15px 0;
            font-size: 1.8em;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tableau de Bord</h1>
        <p>Suivez les performances de vos projets et tâches.</p>

        <div class="stats-overview">
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
        </div>

        <div class="chart-container">
            <canvas id="performanceChart"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('performanceChart').getContext('2d');
        var performanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'],
                datasets: [{
                    label: 'Projets terminés',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }, {
                    label: 'Tâches terminées',
                    data: [10, 15, 13, 8, 10, 7, 9],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
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
</body>


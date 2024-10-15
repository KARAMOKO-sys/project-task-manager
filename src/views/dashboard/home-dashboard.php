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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            color: #555;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .stats-overview {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .overview-box {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 30%;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            margin: 10px;
        }

        .overview-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .overview-box i {
            font-size: 2em;
        }

        .overview-box h2 {
            margin: 15px 0;
            font-size: 1.8em;
        }

        .chart-container {
            margin-top: 50px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .recent-activities {
            margin-top: 50px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .activity {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #f1f1f1;
        }

        .activity:last-child {
            border-bottom: none;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
            margin-top: 30px;
        }
        .recent-activities {
            margin-left: 15rem;
        }
    </style>
</head> 

<body>
    <!-- Sidebar -->
    <?php
        require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <?php renderSidebar(); ?>
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
                    borderWidth: 2,
                    fill: false
                }, {
                    label: 'Tâches terminées',
                    data: [10, 15, 13, 8, 10, 7, 9],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>

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

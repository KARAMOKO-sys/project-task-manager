<!-- notifications-dashboard.php -->
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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .notification-list {
            margin-top: 20px;
        }

        .notification-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
        }

        .notification-item h5 {
            margin: 0;
            color: #333;
        }

        .notification-item p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Notifications</h1>
        <p>Gestion des notifications.</p>
        <button id="clearNotifications" class="btn btn-primary btn-lg">Effacer les Notifications</button>

        <div class="notification-list">
            <h2>Notifications Récentes</h2>
            <!-- Exemple de notification -->
            <div class="notification-item">
                <h5>Nouvelle Notification</h5>
                <p><strong>Date:</strong> 15 septembre 2024</p>
                <p><strong>Message:</strong> Vous avez reçu un nouveau message de l'équipe de support.</p>
                <button class="btn btn-secondary btn-sm">Voir</button>
                <button class="btn btn-danger btn-sm">Supprimer</button>
            </div>
            <!-- Autres notifications ici -->
        </div>
    </div>

    <script>
        document.getElementById('clearNotifications').addEventListener('click', function() {
            if (confirm('Voulez-vous vraiment effacer toutes les notifications ?')) {
                // Logique pour effacer toutes les notifications
                alert('Toutes les notifications ont été effacées');
            }
        });

        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Voulez-vous vraiment supprimer cette notification ?')) {
                    // Logique de suppression ici
                    alert('Notification supprimée');
                    // Pour une vraie application, vous auriez besoin de supprimer l'élément du DOM ou faire une requête AJAX pour supprimer la notification du serveur
                    this.closest('.notification-item').remove();
                }
            });
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

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

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .integration-list {
            margin-top: 20px;
        }

        .integration-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
        }

        .integration-item h5 {
            margin: 0;
            color: #333;
        }

        .integration-item p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Intégrations</h1>
        <p>Gestion des intégrations avec d'autres systèmes.</p>
        <button id="addIntegration" class="btn btn-primary btn-lg">Ajouter une Intégration</button>

        <div class="integration-list">
            <h2>Intégrations existantes</h2>
            <!-- Exemple d'intégration -->
            <div class="integration-item">
                <h5>Intégration XYZ</h5>
                <p><strong>Status:</strong> Actif</p>
                <p><strong>Description:</strong> Cette intégration permet de synchroniser les données avec le système XYZ.</p>
                <button class="btn btn-secondary btn-sm">Détails</button>
                <button class="btn btn-danger btn-sm">Supprimer</button>
            </div>
            <!-- Autres intégrations ici -->
        </div>
    </div>

    <script>
        document.getElementById('addIntegration').addEventListener('click', function() {
            alert('Ajouter une nouvelle intégration');
            // Ajouter une intégration logique ici
        });

        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Voulez-vous vraiment supprimer cette intégration ?')) {
                    // Logique de suppression ici
                    alert('Intégration supprimée');
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

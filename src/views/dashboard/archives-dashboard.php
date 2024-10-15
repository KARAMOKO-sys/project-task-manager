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

        .alert-info {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Archives</h1>
        <p class="lead">Gestion des éléments archivés.</p>
        <div class="alert alert-info" role="alert">
            <strong>Note :</strong> Vous pouvez restaurer des éléments archivés en cliquant sur le bouton ci-dessous. Assurez-vous de vérifier les détails avant de procéder.
        </div>
        <button id="restoreArchived" class="btn btn-primary">Restaurer</button>

        <!-- Example of archived items -->
        <div class="mt-4">
            <h2>Éléments Archivés</h2>
            <ul class="list-group">
                <li class="list-group-item">Élément 1 - Archivage le 01/01/2024</li>
                <li class="list-group-item">Élément 2 - Archivage le 02/01/2024</li>
                <li class="list-group-item">Élément 3 - Archivage le 03/01/2024</li>
            </ul>
        </div>
    </div>

    <script>
        document.getElementById('restoreArchived').addEventListener('click', function() {
            alert('Restaurer les éléments archivés');
            // Logic to restore archived items here
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

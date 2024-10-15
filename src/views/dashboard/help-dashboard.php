<!-- help-dashboard.php -->
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

        .section-title {
            margin-top: 30px;
            font-size: 1.8em;
            color: #007bff;
        }

        .faq-item {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aide & Support</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
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
        <h1>Aide</h1>
        <p class="lead">Consultez la documentation et obtenez de l'aide sur les fonctionnalités de l'application.</p>

        <div class="alert alert-info" role="alert">
            Si vous avez besoin d'aide immédiate, n'hésitez pas à consulter notre documentation ou contacter le support.
        </div>

        <!-- Bouton d'aide -->
        <button id="viewHelp" class="btn btn-primary">Voir l'Aide</button>

        <!-- Section FAQ -->
        <h2 class="section-title">FAQ</h2>
        <div class="faq-item">
            <h5>Comment puis-je réinitialiser mon mot de passe ?</h5>
            <p>Vous pouvez réinitialiser votre mot de passe en cliquant sur "Mot de passe oublié" sur la page de connexion.</p>
        </div>
        <div class="faq-item">
            <h5>Comment contacter le support ?</h5>
            <p>Vous pouvez contacter le support via l'email support@exemple.com ou en appelant le +33 1 23 45 67 89.</p>
        </div>
        <div class="faq-item">
            <h5>Où puis-je trouver la documentation complète ?</h5>
            <p>La documentation complète est disponible <a href="#">ici</a>.</p>
        </div>

        <!-- Section Contact -->
        <h2 class="section-title">Contactez-nous</h2>
        <p>Si vous ne trouvez pas de réponse à votre question, n'hésitez pas à nous contacter via notre formulaire de contact.</p>
        <button class="btn btn-outline-success">Formulaire de Contact</button>
    </div>

    <script>
        document.getElementById('viewHelp').addEventListener('click', function() {
            alert('Redirection vers la documentation d\'aide.');
            // Logique pour rediriger vers la documentation d'aide ici
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


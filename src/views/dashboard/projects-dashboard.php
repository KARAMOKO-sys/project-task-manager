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
    <!-- Fichier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/projects.scss">

    <?php
        require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <!-- Sidebar -->
    <?php renderSidebar(); ?>

</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Gestion des Projets</h1>
            <p class="lead">Visualisez l'état des projets en cours et terminés pour suivre la progression.</p> 
        </div>
        
        <div class="boby-project">
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
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom du Projet</th>
                        <th>Statut</th>
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Développement Web</td>
                        <td>Terminé</td>
                        <td>01/01/2023</td>
                        <td>30/04/2023</td>
                        <td>
                            <button class="btn btn-primary">Voir</button>
                            <button class="btn btn-secondary">Modifier</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Application Mobile</td>
                        <td>En Cours</td>
                        <td>15/05/2023</td>
                        <td>15/12/2023</td>
                        <td>
                            <button class="btn btn-primary">Voir</button>
                            <button class="btn btn-secondary">Modifier</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Refonte de Site</td>
                        <td>En Retard</td>
                        <td>01/06/2023</td>
                        <td>01/09/2023</td>
                        <td>
                            <button class="btn btn-primary">Voir</button>
                            <button class="btn btn-secondary">Modifier</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Fichier JS -->
    <script src="<?php echo BASE_URL; ?>js/projects.js"></script>

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

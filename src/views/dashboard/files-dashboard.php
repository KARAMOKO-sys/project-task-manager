<!-- files-dashboard.php -->
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
    <?php
        require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <!-- Sidebar -->
    <?php renderSidebar(); ?>
    <!-- FIchier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/files.scss">
</head>

<body>
    <div class="container">
        <div id="dashboard" class="content-section">
            <div class="row">
                <div class="col-md-8 offset-md-1 mt-4">
                    <h1 class="h2">File Task Manager</h1>
                    <div class="filter-container">
                        <input type="text" id="searchFile" placeholder="Rechercher un fichier..." class="form-control">
                        <button id="addFile" class="btn btn-primary">Ajouter un fichier</button>
                    </div>
                    <div id="message" class="alert alert-success" style="display: none;"></div>
                    <table class="file-table" id="fileTable">
                        <thead>
                            <tr>
                                <th>Nom du Fichier</th>
                                <th>Date de Création</th>
                                <th>Taille</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Document A</td>
                                <td>10/01/2024</td>
                                <td>15 KB</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Télécharger</button>
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Rapport B</td>
                                <td>15/02/2024</td>
                                <td>22 KB</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Télécharger</button>
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Fichier JS -->
    <script src="<?php echo BASE_URL; ?>js/client.js"></script>

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

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
    
    <!-- Sidebar -->
    <?php
        require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <?php renderSidebar(); ?>
    <!-- Fichier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/integration.scss">
</head> 

<div class="container">

    <!-- Main Content -->
<body>
    <div id="overlay">
        <div id="modal">
            <h2>Ajouter une nouvelle Intégration</h2>
            <form id="integrationForm">
                <div class="form-group">
                    <label for="integrationName" class="form-label">Nom de l'intégration</label>
                    <input type="text" id="integrationName" class="form-control" placeholder="Entrez le nom de l'intégration">
                </div>
                <div class="form-group">
                    <label for="integrationStatus" class="form-label">Statut</label>
                    <select id="integrationStatus" class="form-control">
                        <option value="actif">Actif</option>
                        <option value="inactif">Inactif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="integrationDescription" class="form-label">Description</label>
                    <textarea id="integrationDescription" class="form-control" rows="3" placeholder="Entrez une description"></textarea>
                </div>
                <div class="form-group">
                    <button type="button" id="saveIntegration" class="btn btn-primary">Enregistrer</button>
                    <button type="button" id="cancelIntegration" class="btn btn-secondary modal-close">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="title">
            <h1>Intégrations</h1>
            <p>Gestion des intégrations avec d'autres systèmes.</p>
            <button id="addIntegration" class="btn btn-primary btn-lg">Ajouter une Intégration</button>
        </div>

        <div class="integration-list">
            <h2>Intégrations existantes</h2>
            <div class="integration-item">
                <div class="integration-item-details">
                    <div>
                        <h5>Intégration XYZ</h5>
                        <p><strong>Status:</strong> Actif</p>
                        <p><strong>Description:</strong> Synchronisation des données avec le système XYZ.</p>
                    </div>
                    <div class="buttons">
                        <button class="btn btn-secondary btn-sm">Détails</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </div>
                </div>
            </div>

            <div class="integration-item">
                <div class="integration-item-details">
                    <div>
                        <h5>Intégration ABC</h5>
                        <p><strong>Status:</strong> Inactif</p>
                        <p><strong>Description:</strong> Intégration de test pour le système ABC.</p>
                    </div>
                    <div class="buttons">
                        <button class="btn btn-secondary btn-sm">Détails</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Fichier JS -->
    <script src="<?php echo BASE_URL; ?>js/integration.js"></script>

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

<!-- notifications-dashboard.php -->
<head>
    <?php
    $file = __DIR__ . '/partials-dashboard/header-dashboard.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Le fichier $file n'existe pas.";
    }
    ?>

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
    <?php renderSidebar(); ?>
    <!-- Fichier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/notifications.scss">
</head>

<div class="container">
<body>
    <div class="container">
        <div class="title">
            <h1>Notifications</h1>
            <p>Gestion des notifications.</p>
            <button id="clearNotifications" class="btn btn-primary btn-lg">Effacer les Notifications</button>
        </div>

        <div class="search-bar">
            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher une notification...">
            <button id="searchButton" class="btn btn-primary">Rechercher</button>
        </div>

        <form id="filterForm">
            <div class="form-group">
                <label for="statusFilter">Filtrer par statut :</label>
                <select id="statusFilter" class="form-control">
                    <option value="all">Tous</option>
                    <option value="read">Lues</option>
                    <option value="unread">Non lues</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dateFilter">Filtrer par date :</label>
                <input type="date" id="dateFilter" class="form-control">
            </div>

            <button type="button" id="applyFilter" class="btn btn-secondary">Appliquer les filtres</button>
        </form>

        <div class="notification-list">
            <h2>Notifications Récentes</h2>

            <div class="notification-item" data-status="unread">
                <div>
                    <h5>Nouvelle Notification</h5>
                    <p><strong>Date:</strong> 15 septembre 2024</p>
                    <p><strong>Message:</strong> Vous avez reçu un nouveau message de l'équipe de support.</p>
                </div>
                <div class="notification-actions">
                    <button class="btn btn-secondary btn-sm">Voir</button>
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </div>
            </div>

            <div class="notification-item" data-status="read">
                <div>
                    <h5>Notification Système</h5>
                    <p><strong>Date:</strong> 14 septembre 2024</p>
                    <p><strong>Message:</strong> Votre système a été mis à jour avec succès.</p>
                </div>
                <div class="notification-actions">
                    <button class="btn btn-secondary btn-sm">Voir</button>
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </div>
            </div>

            <div class="notification-item" data-status="unread">
                <div>
                    <h5>Alerte de Sécurité</h5>
                    <p><strong>Date:</strong> 13 septembre 2024</p>
                    <p><strong>Message:</strong> Une tentative de connexion suspecte a été détectée sur votre compte.</p>
                </div>
                <div class="notification-actions">
                    <button class="btn btn-secondary btn-sm">Voir</button>
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

      
    <!-- Fichier JS -->
    <script src="<?php echo BASE_URL; ?>js/notifications.js"></script>

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

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
</head>

<?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
?>
<?php renderSidebar(); ?>

<div class="container">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-item h5 {
            margin: 0;
            color: #333;
        }

        .notification-item p {
            margin: 5px 0;
        }

        .notification-actions {
            display: flex;
            gap: 10px;
        }

        .title {
            margin-left: 2rem;
        }

        .notification-list {
            margin-left: 2rem;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .search-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 60%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-bar button {
            padding: 10px 20px;
            border-radius: 5px;
        }
          .container {
            margin-left: 7rem;
        }
    </style>
</head>

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

    <script>
        document.getElementById('clearNotifications').addEventListener('click', function () {
            if (confirm('Voulez-vous vraiment effacer toutes les notifications ?')) {
                alert('Toutes les notifications ont été effacées');
                document.querySelectorAll('.notification-item').forEach(item => item.remove());
            }
        });

        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function () {
                if (confirm('Voulez-vous vraiment supprimer cette notification ?')) {
                    alert('Notification supprimée');
                    this.closest('.notification-item').remove();
                }
            });
        });

        document.getElementById('searchButton').addEventListener('click', function () {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            document.querySelectorAll('.notification-item').forEach(item => {
                const message = item.querySelector('p').textContent.toLowerCase();
                if (message.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        document.getElementById('applyFilter').addEventListener('click', function () {
            const statusFilter = document.getElementById('statusFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;

            document.querySelectorAll('.notification-item').forEach(item => {
                const itemStatus = item.getAttribute('data-status');
                const itemDate = item.querySelector('p').textContent.split(' ')[1];

                let statusMatch = statusFilter === 'all' || itemStatus === statusFilter;
                let dateMatch = !dateFilter || itemDate === dateFilter;

                if (statusMatch && dateMatch) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
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

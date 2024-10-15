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
            font-family: Arial, sans-serif;
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

        .integration-item-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .integration-item-details p {
            margin: 0;
            padding-right: 15px;
        }

        .integration-item .buttons {
            text-align: right;
        }

        .btn {
            margin-left: 10px;
        }

        .title {
            margin-left: 2rem;
        }

        .integration-list {
            margin-left: 2rem; 
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        #integrationForm {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 20px;
        }

        .hidden {
            display: none;
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        #modal {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            text-align: center;
        }

        #modal h2 {
            margin-bottom: 20px;
        }

        .modal-close {
            cursor: pointer;
            color: #007bff;
        }
    </style>
</head>

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

    <script>
        document.getElementById('addIntegration').addEventListener('click', function () {
            document.getElementById('overlay').style.display = 'flex';
        });

        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function () {
                if (confirm('Voulez-vous vraiment supprimer cette intégration ?')) {
                    alert('Intégration supprimée');
                }
            });
        });

        document.getElementById('saveIntegration').addEventListener('click', function () {
            const name = document.getElementById('integrationName').value;
            const status = document.getElementById('integrationStatus').value;
            const description = document.getElementById('integrationDescription').value;

            if (name && status && description) {
                alert('Nouvelle intégration ajoutée');
                document.getElementById('overlay').style.display = 'none';
            } else {
                alert('Veuillez remplir tous les champs');
            }
        });

        document.getElementById('cancelIntegration').addEventListener('click', function () {
            document.getElementById('overlay').style.display = 'none';
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

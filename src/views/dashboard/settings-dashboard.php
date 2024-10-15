<!-- settings-dashboard.php -->
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

        .form-label {
            font-weight: bold;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Paramètres</h1>
        <p class="lead">Configuration des paramètres de l'application.</p>

        <div class="alert alert-info" role="alert">
            Vous pouvez modifier vos paramètres personnels ci-dessous. N'oubliez pas de sauvegarder les modifications !
        </div>

        <!-- Formulaire de paramètres -->
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" placeholder="Entrez votre nom d'utilisateur">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre email">
            </div>

            <div class="mb-3">
                <label for="language" class="form-label">Langue</label>
                <select class="form-select" id="language">
                    <option value="fr" selected>Français</option>
                    <option value="en">Anglais</option>
                    <option value="es">Espagnol</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="theme" class="form-label">Thème</label>
                <select class="form-select" id="theme">
                    <option value="light" selected>Clair</option>
                    <option value="dark">Sombre</option>
                </select>
            </div>

            <button type="button" id="saveSettings" class="btn btn-primary">Sauvegarder les Paramètres</button>
        </form>
    </div>

    <script>
        document.getElementById('saveSettings').addEventListener('click', function () {
            let username = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let language = document.getElementById('language').value;
            let theme = document.getElementById('theme').value;

            // Logique pour sauvegarder les paramètres
            if (username && email) {
                alert('Paramètres sauvegardés avec succès!\n\n' +
                    'Nom d\'utilisateur: ' + username + '\n' +
                    'Email: ' + email + '\n' +
                    'Langue: ' + language + '\n' +
                    'Thème: ' + theme);
                // Sauvegarder la logique ici
            } else {
                alert('Veuillez remplir tous les champs.');
            }
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


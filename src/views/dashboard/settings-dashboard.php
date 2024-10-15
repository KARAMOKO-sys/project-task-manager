<!-- settings-dashboard.php -->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
?>
<?php renderSidebar(); ?>

<div class="container mt-5">
    <style>
       body {
            background-color: #f0f2f5;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.1); /* Ombre élargie */
            background: white;
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }

        .alert {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .loading {
            display: none;
        }

        .section-title {
            font-size: 1.5em;
            margin-top: 30px;
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .body-setting {
            margin-left: 10rem;
        }
    </style>

    <div class="body-setting">
        
    <h1>Paramètres</h1>
    <p class="lead">Configurez vos préférences ici.</p>

    <div class="alert alert-info" role="alert">
        Modifiez vos paramètres ci-dessous et n'oubliez pas de sauvegarder vos modifications !
    </div>

    <div class="card">
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

            <div class="mb-3">
                <label for="password" class="form-label">Changer le mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Nouveau mot de passe">
            </div>

            <div class="section-title">Notifications</div>
            <div class="mb-3">
                <label class="form-label">Préférences de notification</label>
                <div>
                    <input type="checkbox" id="emailNotifications" checked>
                    <label for="emailNotifications">Recevoir des notifications par email</label>
                </div>
                <div>
                    <input type="checkbox" id="smsNotifications">
                    <label for="smsNotifications">Recevoir des notifications par SMS</label>
                </div>
            </div>

            <div class="section-title">Confidentialité</div>
            <div class="mb-3">
                <label class="form-label">Préférences de confidentialité</label>
                <div>
                    <input type="checkbox" id="dataSharing" checked>
                    <label for="dataSharing">Partager mes données avec des partenaires</label>
                </div>
                <div>
                    <input type="checkbox" id="trackUsage">
                    <label for="trackUsage">Suivre mon utilisation de l'application</label>
                </div>
            </div>

            <div class="section-title">Sécurité</div>
            <div class="mb-3">
                <label class="form-label">Authentification à deux facteurs</label>
                <div>
                    <input type="checkbox" id="twoFactorAuth">
                    <label for="twoFactorAuth">Activer l'authentification à deux facteurs</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="customColor" class="form-label">Couleur personnalisée du thème</label>
                <input type="color" class="form-control" id="customColor" value="#007bff">
            </div>

            <div class="section-title">Autres options</div>
            <div class="mb-3">
                <label for="timezone" class="form-label">Fuseau horaire</label>
                <select class="form-select" id="timezone">
                    <option value="UTC+0" selected>UTC</option>
                    <option value="UTC+1">UTC+1</option>
                    <option value="UTC-5">UTC-5</option>
                    <option value="UTC+9">UTC+9</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="userBio" class="form-label">Biographie</label>
                <textarea class="form-control" id="userBio" rows="3" placeholder="Parlez-nous un peu de vous..."></textarea>
            </div>

            <button type="button" id="saveSettings" class="btn btn-primary">Sauvegarder les Paramètres</button>
            <button type="button" id="resetSettings" class="btn btn-secondary">Réinitialiser les Paramètres</button>
            <div class="loading spinner-border text-primary loading" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
        </form>
    </div>

    <div class="mt-3" id="notification" style="display: none;">
        <div class="alert alert-success" role="alert">
            Paramètres sauvegardés avec succès !
        </div>
    </div>
</div>
    </div>


<script>
    document.getElementById('saveSettings').addEventListener('click', function () {
        let username = document.getElementById('username').value;
        let email = document.getElementById('email').value;
        let language = document.getElementById('language').value;
        let theme = document.getElementById('theme').value;
        let password = document.getElementById('password').value;
        let emailNotifications = document.getElementById('emailNotifications').checked;
        let smsNotifications = document.getElementById('smsNotifications').checked;
        let dataSharing = document.getElementById('dataSharing').checked;
        let trackUsage = document.getElementById('trackUsage').checked;
        let twoFactorAuth = document.getElementById('twoFactorAuth').checked;
        let customColor = document.getElementById('customColor').value;
        let timezone = document.getElementById('timezone').value;
        let userBio = document.getElementById('userBio').value;

        if (username && email) {
            document.querySelector('.loading').style.display = 'inline-block';

            setTimeout(function () {
                document.querySelector('.loading').style.display = 'none';
                document.getElementById('notification').style.display = 'block';
                document.querySelector('form').reset();
            }, 2000);
        } else {
            alert('Veuillez remplir tous les champs.');
        }
    });

    document.getElementById('resetSettings').addEventListener('click', function () {
        document.querySelector('form').reset();
        alert('Les paramètres ont été réinitialisés aux valeurs par défaut.');
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

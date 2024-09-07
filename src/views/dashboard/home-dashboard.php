<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Gestion des Tâches</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
    if (!defined('BASE_URL')) {
        define('BASE_URL', '/project-task-manager/src/');
    }
    ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/home-dashboard.scss">
    <?php
    require_once '../../database/db-config.php';

    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    $userId = $_SESSION['user_id'];

    // Vérifier si $pdo est bien défini
    if (isset($db)) {
        // Récupérer le nom de l'utilisateur
        $sqlUser = "SELECT full_name FROM users WHERE user_id = ?";
        $stmtUser = $db->prepare($sqlUser);
        $stmtUser->execute([$userId]);
        $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $username = $user['full_name'];
        } else {
            $username = 'Nom d\'utilisateur'; // Valeur par défaut si aucun utilisateur n'est trouvé
        }

        // Récupérer les tâches
        $sqlTasks = "SELECT * FROM tasks WHERE user_id = ?";
        $stmtTasks = $db->prepare($sqlTasks);
        $stmtTasks->execute([$userId]);
        $tasks = $stmtTasks->fetchAll(PDO::FETCH_ASSOC);

        // Récupérer les statistiques
        $sqlStats = "
            SELECT
                SUM(CASE WHEN status = 'En cours' THEN 1 ELSE 0 END) AS tasks_in_progress,
                SUM(CASE WHEN status = 'Terminée' THEN 1 ELSE 0 END) AS tasks_completed,
                SUM(CASE WHEN status = 'En retard' THEN 1 ELSE 0 END) AS tasks_overdue
            FROM tasks WHERE user_id = ?";
        $stmtStats = $db->prepare($sqlStats);
        $stmtStats->execute([$userId]);
        $stats = $stmtStats->fetch(PDO::FETCH_ASSOC);
    } else {
        echo 'Connexion à la base de données non disponible.';
        $stats = null; // Initialiser $stats pour éviter les erreurs plus tard
        $username = 'Nom d\'utilisateur'; // Valeur par défaut si la connexion échoue
    }
    ?>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">
        <img src="https://via.placeholder.com/30" alt="Logo"> Gestion des Tâches
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fa fa-home"></i> Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-cog"></i> Paramètres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-user"></i> Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="https://via.placeholder.com/30" alt="Photo de profil"></a>
                <span class="text-white"><?php echo isset($username) ? htmlspecialchars($username, ENT_QUOTES, 'UTF-8') : 'Utilisateur'; ?></span>
                </li>
        </ul>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <button class="btn" onclick="showSection('dashboard')"><i class="fa fa-tachometer-alt"></i> Tableau de Bord</button>
        </li>
        <li class="nav-item">
            <button class="btn" onclick="showSection('tasks')"><i class="fa fa-tasks"></i> Tâches</button>
        </li>
        <li class="nav-item">
            <button class="btn" onclick="showSection('reports')"><i class="fa fa-file-alt"></i> Rapports</button>
        </li>
        <li class="nav-item">
            <button class="btn" onclick="showSection('clients')"><i class="fa fa-users"></i> Clients</button>
        </li>
        <li class="nav-item">
            <button class="btn" onclick="showSection('statistics')"><i class="fa fa-chart-bar"></i> Statistiques</button>
        </li>
        <li class="nav-item">
            <button class="btn" onclick="showSection('integrations')"><i class="fa fa-plug"></i> Intégrations</button>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="container-fluid">
    <div id="dashboard" class="content-section">
        <h1 class="h2">Bienvenue dans le Tableau de Bord</h1>
        <!-- Contenu du tableau de bord -->
    </div>

    <!-- Inclure les sections depuis les fichiers -->
    <?php
    include 'tache-dashboard.php';
    include 'rapport-dashboard.php';
    include 'client-dashboard.php';
    include 'statisque-dashboard.php';
    include 'integration-dashboard.php';
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/main.js"></script>

</body>
</html>

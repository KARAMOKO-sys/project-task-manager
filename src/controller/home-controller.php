<?php
// homeController.php
require_once '../../database/db-config.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];

// Initialisation des variables
$tasks = [];
$stats = null;
$username = 'Nom d\'utilisateur';

if (isset($db)) {
    // Récupérer le nom de l'utilisateur
    $sqlUser = "SELECT full_name FROM users WHERE user_id = ?";
    $stmtUser = $db->prepare($sqlUser);
    $stmtUser->execute([$userId]);
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $username = $user['full_name'];
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
}

// Inclure la vue
include '../../views/dashboard/home-dashboard.php';
?>
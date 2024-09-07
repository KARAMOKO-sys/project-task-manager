<?php
// src/controller/view-dashboard/home-controller.php

require_once __DIR__ . '/../../database/db-config.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /project-task-manager/src/views/login.php"); // Chemin ajusté pour le fichier login.php
    exit;
}

$userId = $_SESSION['user_id'];

// Initialisation des variables
$tasks = [];
$stats = null;
$username = 'Nom d\'utilisateur'; // Initialisation par défaut

if (isset($db)) {
    // Récupérer le nom de l'utilisateur
    $sqlUser = "SELECT full_name FROM users WHERE user_id = ?";
    $stmtUser = $db->prepare($sqlUser);
    $stmtUser->execute([$userId]);
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

      // Afficher le contenu de $user sur la page HTML
      echo '<pre>'; // Utilisé pour formater la sortie
      var_dump($user);
      echo '</pre>';
      
    if ($user) {
        $username = $user['full_name']; // Mise à jour de $username avec la valeur réelle
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

// Inclure la vue du tableau de bord
require __DIR__ . '/../../views/dashboard/home-dashboard.php';
?>

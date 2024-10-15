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
      
    if ($user) {
        $username = $user['full_name']; // Mise à jour de $username avec la valeur réelle
    }
  
}

// Inclure la vue du tableau de bord
require __DIR__ . '/../../views/dashboard/home-dashboard.php';
?>

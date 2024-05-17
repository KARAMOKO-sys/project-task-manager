<!-- home-dashboard.php -->
<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion
    header("Location: login.php");
    exit;
}

// Ici se trouve le code de votre page home-dashboard.php sécurisée
?>

<!-- Votre contenu HTML ici -->


<!-- forget-password.php -->
<?php
// Inclure le fichier de configuration de la base de données
require_once '../../database/db-config.php';

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion
    header("Location: login.php");
    exit;
}
?>

<div class="container">
    <h1>
        Dashboard
    </h1>
</div>

<!-- Mettez ici le contenu de votre page home-dashboard.php -->

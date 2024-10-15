<?php
require_once 'models/User.php';

try {
    // Connexion à la base de données MariaDB
     $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=bd_task_manager', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $userManager = new User($db);
   // echo "Connexion réussie à la base de données MariaDB !";
} catch (PDOException $e) {
    // Gérer les erreurs de connexion
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

<?php
require_once 'models/User.php';

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=bd_task_manager', 'root', '');

// Instancier la classe User avec la connexion à la base de données
$userManager = new User($db);
?>

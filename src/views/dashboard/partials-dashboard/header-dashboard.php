<!-- header-dashbaord.php  -->
<!DOCTYPE html>
<html lang="fr">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Gestion des Tâches</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
    if (!defined('BASE_URL')) {
        define('BASE_URL', '/project-task-manager/src/');
    }?>    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/home-dashboard.scss">
</header>
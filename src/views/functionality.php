<!DOCTYPE html>
<html lang="en">

<head>    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/header.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/functionality.scss">
</head>
<body>
<div class="container-fluid">
    <div class="container mt-5 pt-4">
        <h1 class="section-title">Nos Fonctionnalités</h1>

    <!-- Section des Alertes -->
    <div class="alert alert-custom alert-dismissible fade show bg-primary" role="alert">
            <strong>Découvrez Nos Fonctionnalités !</strong> Explorez les outils puissants que nous avons mis en place pour vous aider à gérer vos tâches et vos projets plus efficacement.
            <button type="button" class="btn-close" id="closeAlertButton" aria-label="Close"></button>
    </div>


    <!-- Section des Cartes de Fonctionnalités -->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5" id="features-container">
            <!-- Les cartes de fonctionnalités seront injectées ici -->
        </div>
    </div>

    <!-- Section des Onglets pour en savoir plus -->
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="featureIcons" role="tablist">
                <!-- Les onglets seront générés ici par JavaScript -->
            </ul>
            <div class="tab-content mt-3" id="featureDescription">
                <!-- Le contenu des onglets sera généré ici par JavaScript -->
            </div>
        </div>
    </div>
</div>

</div>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/footer.php'; ?>
        <script src="<?php echo BASE_URL; ?>js/functionality.js"></script>
    </footer>
    
</body>
</html>

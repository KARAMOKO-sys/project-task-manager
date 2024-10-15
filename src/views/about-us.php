<!-- about-us.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
    ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/header.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/about.scss">
    <title>À Propos de Nous - Task Manager</title>
</head>
<body>
    <div class="container mt-5 pt-4">
        <!-- Section Introduction -->
        <div class="alert alert-custom alert-dismissible bg-primary fade show mb-5" role="alert">
            <strong>Bienvenue chez Task Manager !</strong> Nous sommes dédiés à vous fournir 
            les meilleurs outils pour organiser et gérer vos tâches et projets.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="about-section text-center">
            <h1 class="section-title">À propos de nous</h1>
            <p id="divOne"></p>
            <img src="<?php echo BASE_URL; ?>/assets/images/image_20.jpg" alt="À propos de nous">
        </div>

        <!-- Section Mission et Vision -->
        <div class="about-section text-center">
            <h1 class="section-title">Notre Mission et Vision</h1>
            La gestion des tâches et d'améliorer la productivité de nos utilisateurs. 
            Nous croyons en un avenir où chaque individu peut gérer efficacement ses tâches avec des outils intuitifs et puissants.
            <p>Notre mission est de simplifier</p>
        </div>

        <!-- Section Équipe -->
        <div id="team-container"></div>


        <!-- Section Histoire -->
        <div class="about-section text-center position-relative">
            <h1 class="section-title">Notre Histoire</h1>
            <p>
                Task Manager a été fondé en 2022 avec l'objectif de révolutionner la gestion des tâches. 
                Depuis notre création, nous avons aidé des milliers d'utilisateurs à organiser leur travail et à atteindre leurs objectifs plus efficacement.
            </p>
        </div>
    </div>

    <footer>
        <script src="<?php echo BASE_URL; ?>js/about.js"></script>
        <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/footer.php'; ?>
    </footer>
</body>
</html>

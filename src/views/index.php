<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
    if (!defined('BASE_URL')) {
        define('BASE_URL', '/project-task-manager/src/');
    }?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/header.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/index.scss">
</head>
<body>

<div class="container-fluid p-0">
    
    <!-- Section "Carrousel" -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators"></div>
        <div class="carousel-inner"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

     <!-- Section "Titre" -->
    <div class="container text-center my-5">
        <h1 class="display-2">
        Organisez votre vie
        et votre travail
        </h1>
    </div>
    <!-- Section "Cartes" améliorée -->
    <div class="container">
            <h2 class="section-title">Nos services</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4" id="card-container">
                <!-- Cartes seront injectées ici par JavaScript -->
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#" id="prev-page">Précédent</a></li>
                    <li class="page-item"><a class="page-link" href="#" id="next-page">Suivant</a></li>
                </ul>
            </nav>
    </div>

    <!-- Section "À propos" -->
    <div class="container">
        <h2 class="section-title">À propos de notre application</h2>
        <p class="text-center">Task Manager est une application intuitive conçue pour vous aider à organiser vos tâches et projets de manière efficace et simple. Que vous soyez un professionnel ou un étudiant, notre application est adaptée à tous vos besoins de gestion de tâches.</p>
    </div>

    <!-- Section "Fonctionnalités" -->
    <div class="container features">
        <h2 class="section-title">Fonctionnalités principales</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-tasks"></i>
                </div>
                <h4>Gestion de Tâches</h4>
                <p>Créez, organisez et suivez vos tâches facilement.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h4>Gestion de Projets</h4>
                <p>Planifiez et gérez vos projets avec des outils intuitifs.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon mb-3">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Collaboration</h4>
                <p>Travaillez en équipe et suivez l’avancement de chacun.</p>
            </div>
        </div>
    </div>

<!-- Section "Témoignages" -->
<div class="container testimonials">
    <h2 class="section-title">Témoignages</h2>
    <div class="row" id="testimonialsContainer">
    </div>
</div>

</div>
<footer>
    <script src="<?php echo BASE_URL; ?>js/index.js"></script>
    <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/footer.php'; ?>
</footer>
</body>
</html>

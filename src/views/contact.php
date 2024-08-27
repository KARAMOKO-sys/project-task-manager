
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
    ?>
    <title>Contact - Task Manager</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/contact.scss">
    <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/header.php'; ?>
</head>
<body>

    <div class="container mt-5 pt-4">
        <!-- Section Contactez-nous -->
        <h1 class="section-title">Contactez-nous</h1>

        <!-- Formulaire de contact -->
        <div class="contact-form">
            <form action="process_contact.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>

        <!-- Informations de contact -->
        <div class="contact-info">
            <h3>Informations de contact</h3>
            <p><i class="fas fa-envelope icon"></i>Email : <a href="mailto:contact@taskmanager.com">contact@taskmanager.com</a></p>
            <p><i class="fas fa-phone icon"></i>Téléphone : <a href="tel:+33123456789">+33 1 23 45 67 89</a></p>
            <p><i class="fas fa-map-marker-alt icon"></i>Adresse : 123 Rue de la Productivité, 75000 Paris, France</p>
        </div>

        <!-- Google Maps -->
        <div class="map-container">
            <h3 class="section-title">Où nous trouver</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.935048435012!2d2.330036315674287!3d48.85884477928762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671d8d6970777%3A0xe1b7c6bcbfc62d9a!2s123%20Rue%20de%20la%20Productivit%C3%A9%2C%2075000%20Paris%2C%20France!5e0!3m2!1sfr!2sus!4v1677905567543!5m2!1sfr!2sus" 
                    width="100%" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/footer.php'; ?>
    </footer>
</body>
</html>

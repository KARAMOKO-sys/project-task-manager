<?php
require_once '../../database/db-config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirmPassword) {
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }

    // Créer l'utilisateur
    if ($userManager->createUser($email, $password)) {
        // Rediriger vers la page de connexion
        header("Location: login.php");
        exit;
    } else {
        echo "Erreur lors de l'enregistrement de l'utilisateur.";
    }
}
?>

<?php include '../../views/partials/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <!-- Formulaire d'inscription -->
                    <form action="sign.php" method="post"> <!-- Modifier l'action pour pointer vers sign.php -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../../views/partials/footer.php'; ?>

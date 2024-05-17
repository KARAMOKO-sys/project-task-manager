<!-- login.php -->
<?php
session_start();
require_once '../../database/db-config.php';

// Vérifier si le formulaire de connexion est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Récupérer l'utilisateur par email
    $user = $userManager->getUserByEmail($email);

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && $userManager->verifyPassword($password, $user['password_hash'])) {
        // Enregistrer l'utilisateur dans la session
        $_SESSION['user_id'] = $user['user_id'];
        
        // Rediriger vers la page forget-password.php
        header("Location: forget-password.php");
        exit;
    } else {
        // Afficher un message d'erreur si les informations de connexion sont incorrectes
        $error_message = "Email ou mot de passe incorrect.";
    }
}
?>

<?php include '../../views/partials/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Login</h2>
                    <!-- Formulaire de connexion -->
                    <form action="" method="post"> <!-- Supprimez l'attribut action pour que le formulaire soumette vers la même page -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Don't have an account? <a href="sign.php">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../views/partials/footer.php'; ?>


<?php include '../../views/partials/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Login</h2>
                    <!-- Formulaire de connexion -->
                    <form action="" method="post"> <!-- Supprimez l'attribut action pour que le formulaire soumette vers la même page -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Don't have an account? <a href="sign.php">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../views/partials/footer.php'; ?>
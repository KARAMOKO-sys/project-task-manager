<?php
session_start();
require_once '../../database/db-config.php';

// Vérifier si l'utilisateur soumet le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe
    $user = $userManager->getUserByEmail($email);
    if (!$user) {
        echo "Cet utilisateur n'existe pas.";
        exit;
    }

    // Vérifier si le mot de passe est correct
    if (!$userManager->verifyPassword($password, $user['password_hash'])) {
        echo "Mot de passe incorrect.";
        exit;
    }

    // Stocker les informations de session
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['email'] = $user['email'];

    // Rediriger vers la page home-dashboard.php après la connexion réussie
    header("Location: home-dashboard.php");
    exit;
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
                    <form action="login.php" method="post">
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


==================================================================================================================

<!--sign.php -->
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

    // Vérifier si l'utilisateur existe déjà
    $existingUser = $userManager->getUserByEmail($email);
    if ($existingUser) {
        echo "Cet utilisateur existe déjà.";
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
                    <form action="../controller/signup_process.php" method="post">
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
                        <button type="submit" class="btn btn-primary">Sign Up</button>
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


<!-- db-config.php -->
<?php
// Inclure la classe User
require_once 'models/User.php';

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=bd_task_manager', 'root', '');

// Instancier la classe User avec la connexion à la base de données
$userManager = new User($db);

$email = 'john.doe@example.com';
$password = 'password123';

// Créer l'utilisateur
if ($userManager->createUser($email, $password)) {
    echo "Utilisateur enregistré avec succès.";
} else {
    echo "Erreur lors de l'enregistrement de l'utilisateur.";
}
?>


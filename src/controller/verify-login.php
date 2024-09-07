<!-- verify-login.php -->
<?php
// Vérifier si le formulaire de connexion est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Récupérer l'utilisateur par email
        $user = $userManager->getUserByEmail($email);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && $userManager->verifyPassword($password, $user['password_hash'])) {
            // Enregistrer l'utilisateur dans la session
            $_SESSION['user_id'] = $user['user_id'];
            
            // Rediriger vers la page home-dashboard.php
            header("Location: ../../controller/view-dashboard/home-controller.php");
            exit;
        } else {
            // Afficher un message d'erreur si les informations de connexion sont incorrectes
            $error_message = "Email ou mot de passe incorrect.";
        }
    } else {
        // Gérer le cas où les clés 'email' et 'password' ne sont pas définies dans le tableau POST
        $error_message = "Missing email or password.";
    }
}
?>

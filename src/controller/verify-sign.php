<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name']; // Ajout de cette ligne pour définir $full_name
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirmPassword) {
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }

    // Créer l'utilisateur
    if ($userManager->createUser($full_name, $email, $password)) {
        // Rediriger vers la page de connexion
        header("Location: login.php");
        exit;
    } else {
        echo "Erreur lors de l'enregistrement de l'utilisateur.";
    }
}
?>
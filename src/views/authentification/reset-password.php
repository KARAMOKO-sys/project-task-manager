<!-- reset-password.php -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
session_start();
require_once '../../database/db-config.php';
require_once '../../handler/exception-global.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    $user = $userManager->getUserByResetToken($token);

    if ($user) {
        $userManager->updatePassword($user['user_id'], $newPassword);
        echo "Your password has been reset successfully.";
    } else {
        echo "Invalid token.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/header.php'; ?>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Reset Password</h2>
                    <form action="reset-password.php" method="post">
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/footer.php'; ?>
</footer>
</body>
</html>

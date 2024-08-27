<!-- login.php -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
session_start();
require_once '../../database/db-config.php';
require_once '../../handler/exception-global.php';
require_once '../../controller/verify-login.php';
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
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="" method="post" novalidate>
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
                    <?php
                    if (isset($error_message)) {
                        echo '<div class="alert alert-danger mt-3">' . $error_message . '</div>';
                    }
                    ?>
                </div>
                <div class="card-footer text-center">
                    <p>Don't have an account? <a href="sign.php">Sign up</a></p>
                    <a href="forget-password.php">Forgot your password?</a>

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
<script src="<?php echo BASE_URL; ?>js/login.js"></script>


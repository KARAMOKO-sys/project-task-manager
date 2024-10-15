<!-- forget-password.php -->
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
    session_start();
    require_once '../../database/db-config.php';
    require_once '../../handler/exception-global.php';
    require_once '../../controller/verify-login.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/vendor/autoload.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config/config-mail.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/header.php'; ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container mt-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Reset Password</h2>
                        <form action="forget-password.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-auto">
        <?php require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/footer.php'; ?>
    </footer>
</body>
</html>

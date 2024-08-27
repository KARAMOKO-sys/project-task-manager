<?php
require_once '../../database/db-config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
require_once '../../handler/exception-global.php';
require_once '../../controller/verify-sign.php';
require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'views/partials/header.php';
?>

<style>
    .mt-custom {
        margin-top: -1rem; /* Ajustez cette valeur selon vos besoins */
    }
</style>

<div class="container mt-custom">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center mb-1">Sign Up</h2>
                    <form action="sign.php" method="post" novalidate>
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full name</label>
                            <input type="text" class="form-control form-control-sm mb-2 w-100" id="full_name" name="full_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm mb-2" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-sm mb-2" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control form-control-sm mb-2" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
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
<script src="<?php echo BASE_URL; ?>js/sign.js"></script>

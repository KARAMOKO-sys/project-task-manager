<!-- footer-dashboard.php -->

 <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';
    if (!defined('BASE_URL')) {
        define('BASE_URL', '/project-task-manager/src/');
 }?>  


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="<?php echo BASE_URL; ?>/js/main.js"></script>
<script>
        // Fonction de navigation
        window.navigateTo = function(controller) {
            window.location.href = '/project-task-manager/src/controller/view-dashboard/' + controller + '.php';
            console.log(controller);
        };
</script>

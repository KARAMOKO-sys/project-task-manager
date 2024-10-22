  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <?php
            if (!defined('BASE_URL')) {
                define('BASE_URL', '/project-task-manager/src/');
            }
        ?>
        <a class="navbar-brand" href="#">
            <img src="<?php echo BASE_URL; ?>/assets/images/logos.png" alt="À propos de nous">Gestion des Tâches
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
             <?php
                require_once __DIR__ . '/../../../database/db-config.php';

                require_once $_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php';

                //var_dump($_SERVER['DOCUMENT_ROOT'] . '/project-task-manager/src/config.php'); 

                session_start();
                if (!isset($_SESSION['user_id'])) {
                    header("Location: /project-task-manager/src/views/login.php"); // Chemin ajusté pour le fichier login.php
                    exit;
                }

                $userId = $_SESSION['user_id'];

                $username = 'Nom d\'utilisateur'; // Initialisation par défaut

                if (isset($db)) {
                    // Récupérer le nom de l'utilisateur
                    $sqlUser = "SELECT full_name FROM users WHERE user_id = ?";
                    $stmtUser = $db->prepare($sqlUser);
                    $stmtUser->execute([$userId]);
                    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
                      
                    if ($user) {
                        $username = $user['full_name']; // Mise à jour de $username avec la valeur réelle
                    }
                }
                $profilePhoto = isset($_SESSION['profilePhoto']) ? $_SESSION['profilePhoto'] : 'https://via.placeholder.com/30';

            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>views/index.php"><i class="fa fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-cog"></i> Paramètres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-user"></i> Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
                </li>
                   <li class="nav-item">
                        <a class="nav-link" href="#"><img src="<?php echo BASE_URL; ?>/assets/images/image_29.jpg" width="40" height="30" style="margin-left: 60px;"></a>
                        <span class="text-white">
                            <?php echo isset($username) ? htmlspecialchars($username, ENT_QUOTES, 'UTF-8') : 'Utilisateur'; ?>
                        </span>
                    </li>
            </ul>
        </div>
    </nav>

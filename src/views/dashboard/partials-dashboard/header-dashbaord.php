<!-- header-dashbaord.php  -->
<!DOCTYPE html>
<html lang="fr">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Gestion des Tâches</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <?php
    require_once '../../database/db-config.php';

    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    $userId = $_SESSION['user_id'];

    // Vérifier si $pdo est bien défini
    if (isset($db)) {
        // Récupérer le nom de l'utilisateur
        $sqlUser = "SELECT full_name FROM users WHERE user_id = ?";
        $stmtUser = $db->prepare($sqlUser);
        $stmtUser->execute([$userId]);
        $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

        // Afficher le contenu de $user sur la page HTML
        echo '<pre>'; // Utilisé pour formater la sortie
        var_dump($user);
        echo '</pre>';

        if ($user) {
            $username = $user['full_name'];
        } else {
            $username = 'Nom d\'utilisateur'; // Valeur par défaut si aucun utilisateur n'est trouvé
        }

        // Récupérer les tâches
        $sqlTasks = "SELECT * FROM tasks WHERE user_id = ?";
        $stmtTasks = $db->prepare($sqlTasks);
        $stmtTasks->execute([$userId]);
        $tasks = $stmtTasks->fetchAll(PDO::FETCH_ASSOC);

        // Récupérer les statistiques
        $sqlStats = "
            SELECT
                SUM(CASE WHEN status = 'En cours' THEN 1 ELSE 0 END) AS tasks_in_progress,
                SUM(CASE WHEN status = 'Terminée' THEN 1 ELSE 0 END) AS tasks_completed,
                SUM(CASE WHEN status = 'En retard' THEN 1 ELSE 0 END) AS tasks_overdue
            FROM tasks WHERE user_id = ?";
        $stmtStats = $db->prepare($sqlStats);
        $stmtStats->execute([$userId]);
        $stats = $stmtStats->fetch(PDO::FETCH_ASSOC);
    } else {
        echo 'Connexion à la base de données non disponible.';
        $stats = null; // Initialiser $stats pour éviter les erreurs plus tard
        $username = 'Nom d\'utilisateur'; // Valeur par défaut si la connexion échoue
    }
    ?>
</header>
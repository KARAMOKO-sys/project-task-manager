<!-- chat-dashboard.php -->
<head>
    <!-- Header and style -->
    <?php
    $file = __DIR__ . '/partials-dashboard/header-dashboard.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Le fichier $file n'existe pas.";
    }
    ?>

    <!-- Navigation -->
    <?php
        $file = __DIR__ . '/partials-dashboard/nav-bar-dashboard.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            echo "Le fichier $file n'existe pas.";
        }
    ?>
    <?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <!-- Sidebar -->
    <?php renderSidebar(); ?>

    <!-- FIchier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/chat.scss">

</head>


<!-- Main Content -->
<div class="container">
<body>
    <div class="container">
        <div class="chat-header">
            <h2>Discussions</h2>
            <div class="filter-date">
                <input type="date" id="filterDate" placeholder="Filtrer par date">
            </div>
        </div>
        <div class="chat-box" id="chatBox">
            <!-- Chat messages will be displayed here -->
            <div class="message">
                <div class="sender">Alice:</div>
                <div class="text">Bonjour, comment ça va ?</div>
            </div>
            <div class="message">
                <div class="sender">Bob:</div>
                <div class="text">Ça va bien, merci ! Et toi ?</div>
            </div>
        </div>

        <div class="input-group">
            <textarea id="messageInput" class="form-control" rows="3" placeholder="Tapez votre message ici..."></textarea>
            <button id="sendMessage" class="btn btn-primary">Envoyer</button>
            <button id="attachFile" class="btn btn-attachment">Joindre un fichier</button>
        </div>
    </div>

 
    <!-- Fichier JS -->
    <script src="<?php echo BASE_URL; ?>js/chat.js"></script>

    <footer>
        <?php
            $file = __DIR__ . '/partials-dashboard/footer-dashboard.php';
            if (file_exists($file)) {
                require_once $file;
            } else {
                echo "Le fichier $file n'existe pas.";
            }
        ?>
    </footer>
</div>

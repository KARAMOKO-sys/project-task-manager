<!-- clients-dashboard.php -->
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
    
    <!-- FIchier Scss -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>styles/clients.scss">

    <!-- Sidebar -->
    <?php renderSidebar(); ?>
</head>

<!-- Main Content -->
<div class="container">   

<body>
    <div class="container">
        <div class="title">
            <h1>Clients</h1>
        </div>
        <table id="clientsTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jean Dupont</td>
                    <td>jean.dupont@example.com</td>
                    <td>0123456789</td>
                    <td>
                        <button class="btn-edit btn btn-sm me-2">Modifier</button>
                        <button class="btn-delete btn btn-sm">Supprimer</button>
                    </td>
                </tr>
                <tr>
                    <td>Marie Curie</td>
                    <td>marie.curie@example.com</td>
                    <td>0987654321</td>
                    <td>
                        <button class="btn-edit btn btn-sm me-2">Modifier</button>
                        <button class="btn-delete btn btn-sm">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <button id="addClient" class="btn-add-client btn btn-lg mt-3">Ajouter un Client</button>
    </div>

    <!-- Modal for Adding a Client -->
    <div id="addClientModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Ajouter un nouveau client</h2>
            <form id="addClientForm">
                <div class="form-group">
                    <label for="clientName">Nom:</label>
                    <input type="text" id="clientName" name="clientName" required>
                </div>
                <div class="form-group">
                    <label for="clientEmail">Email:</label>
                    <input type="email" id="clientEmail" name="clientEmail" required>
                </div>
                <div class="form-group">
                    <label for="clientPhone">Téléphone:</label>
                    <input type="text" id="clientPhone" name="clientPhone" required>
                </div>
                <button type="submit" class="btn-add-client btn btn-lg">Ajouter</button>
            </form>
        </div>
    </div>

    <!-- Fichier JS -->
    <script src="<?php echo BASE_URL; ?>js/client.js"></script>

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

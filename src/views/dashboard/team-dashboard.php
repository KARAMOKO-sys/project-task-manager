<!-- team-dashboard.php -->
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
</head>

<?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
?>
<!-- Sidebar -->
<?php renderSidebar(); ?>

<div class="container">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .table tbody td {
            text-align: center;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover,
        .btn-delete:hover {
            opacity: 0.9;
        }

        .title {
            margin-left: 3rem;
            margin-bottom: 1rem;
        }

        #addMember {
            margin-left: 3rem;
            margin-bottom: 1rem;
        }

        #teamTable {
           margin-left: 3rem;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1 class="mt-4">Équipe</h1>
        </div>
        <button id="addMember" class="btn btn-custom mb-3">Ajouter un Membre</button>
        <table id="teamTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Rôle</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jean Dupont</td>
                    <td>Développeur</td>
                    <td>jean.dupont@example.com</td>
                    <td>0123456789</td>
                    <td>123 Rue Exemple, Paris</td>
                    <td>
                        <button class="btn btn-custom btn-edit">Modifier</button>
                        <button class="btn btn-delete btn-delete">Supprimer</button>
                    </td>
                </tr>
                <tr>
                    <td>Marie Curie</td>
                    <td>Chef de Projet</td>
                    <td>marie.curie@example.com</td>
                    <td>0987654321</td>
                    <td>456 Avenue Exemple, Lyon</td>
                    <td>
                        <button class="btn btn-custom btn-edit">Modifier</button>
                        <button class="btn btn-delete btn-delete">Supprimer</button>
                    </td>
                </tr>
                <!-- More example members can be added here -->
            </tbody>
        </table>
    </div>

    <!-- Modal for Adding Member -->
    <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberModalLabel">Ajouter un Membre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addMemberForm">
                        <div class="mb-3">
                            <label for="memberName" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="memberName" required>
                        </div>
                        <div class="mb-3">
                            <label for="memberRole" class="form-label">Rôle</label>
                            <input type="text" class="form-control" id="memberRole" required>
                        </div>
                        <div class="mb-3">
                            <label for="memberEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="memberEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="memberPhone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="memberPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="memberAddress" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="memberAddress" required>
                        </div>
                        <button type="submit" class="btn btn-custom">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Confirmation Delete -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de Suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment supprimer ce membre ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" id="confirmDeleteBtn" class="btn btn-delete">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var teamTable = $('#teamTable').DataTable({
                ajax: {
                    url: 'fetch-team.php',
                    dataSrc: ''
                },
                columns: [
                    { data: 'nom' },
                    { data: 'role' },
                    { data: 'email' },
                    { data: 'telephone' },
                    { data: 'adresse' },
                    { data: null, render: function(data) {
                        return '<button class="btn btn-custom btn-edit">Modifier</button> ' +
                               '<button class="btn btn-delete btn-delete">Supprimer</button>';
                    }}
                ]
            });

            $('#addMember').click(function() {
                $('#addMemberModal').modal('show');
            });

            $('#addMemberForm').submit(function(e) {
                e.preventDefault();
                // Logic to add member (e.g., AJAX request)
                $('#addMemberModal').modal('hide');
                // Reload table data
                teamTable.ajax.reload();
            });

            $('#teamTable').on('click', '.btn-delete', function() {
                var row = teamTable.row($(this).parents('tr'));
                $('#confirmDeleteModal').modal('show');

                $('#confirmDeleteBtn').off('click').on('click', function() {
                    // Deletion logic here (e.g., AJAX request)
                    row.remove().draw();
                    $('#confirmDeleteModal').modal('hide');
                });
            });
        });
    </script>

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

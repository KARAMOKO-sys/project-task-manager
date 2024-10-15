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
        }

        .container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-custom:hover,
        .btn-delete:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Équipe</h1>
        <button id="addMember" class="btn btn-custom mb-3">Ajouter un Membre</button>
        <table id="teamTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Rôle</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamically loaded team members here -->
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
                ajax: 'fetch-team.php',
                columns: [
                    { data: 'nom' },
                    { data: 'role' },
                    { data: 'email' },
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


